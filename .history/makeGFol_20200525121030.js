const fs = require('fs');
const readline = require('readline');
const getPath = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

getPath.question("Path: ", (path) => {
  var dir = fs.opendirSync(path);
  var remaining = true;
  getPath.question("Recursive? ", (yes) => {
    if (yes != "") {
      getFilesRecursively(dir, path);
    }
    else getFiles(dir);
  });
});

function getFiles(dir, str, folderStr, first, folderFirst) {

  if (str==null) {
    var str = "";
    var folderStr = "";
    var first = "";
    var folderFirst = "";
  }

  dir.read().then(file => {
    if (file == null) {
      console.log(str, folderStr);
      
      writeImageFolderFiles([str, folderStr, dir]);
      return;
    }
    else if (file.name=="imgs.txt" || file.name=="flds.txt") {
      fs.unlinkSync(`${dir.path}/${file.name}`);
    }
    else if (file.name.search(/(.jpg|.png|.gif)/i) != -1) {
      str += `${first}${file.name}`;
      if (first == "") {
        first = ",";
      }
    }
    else if (file.name.includes(".") == false) {
      folderStr += `${folderFirst}${file.name}`;
      if (folderFirst == "") {
        folderFirst = ",";
      }
    }
    console.log(file.name);
    getFiles(dir, str, folderStr, first, folderFirst);
  });

  function writeImageFolderFiles(stuff) {
    let str = stuff[0];
    let folderStr = stuff[1];
    let dir = stuff[2];
    console.log("All done!");
    fs.writeFileSync(`${dir.path}/imgs.txt`, str);
    fs.writeFileSync(`${dir.path}/flds.txt`, folderStr.replace(/_/g, " "));
  }

}

function getFilesRecursively(dir) {
  getFiles(dir);

  try {
    var folders = fs.readFileSync(`${dir.path}/flds.txt`, "utf-8").replace(/ /g, "_").split(",");
    for (var folder of folders) {
      let dirChild = fs.opendirSync(`${dir.path}/${folder}`);
      getFilesRecursively(dirChild);
    }
  }
  catch (err) {
    console.log("No folders in this dir");
  }
}
