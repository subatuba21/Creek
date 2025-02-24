const fs = require('fs');
const readline = require('readline');
const getPath = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});
var first = "";
var folderFirst = "";

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

function getFiles(dir, str, folderStr) {

  if (str==null) {
    var str = "";
    var folderStr = "";
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
    getFiles(dir, str, folderStr);
  });

  function writeImageFolderFiles(stuff) {
    let str = stuff[0];
    let folderStr = stuff[1];
    let dir = stuff[2];
    console.log("All done!");
    fs.writeFile(`${dir.path}/imgs.txt`, str, (err) => {
      fs.writeFile(`${dir.path}/flds.txt`, folderStr.replace(/_/g, " "), (nerr) => {
        console.log("Files created");
        dir.close();
      });
    });
  }

}

function getFilesRecursively(dir) {
  getFiles(dir);
  var folders = fs.readFileSync(`${dir.path}/flds.txt`, "utf-8").split(",").replace(/ /g, "_");
  for (var folder of folders) {
    if (folders[0]=="") return;
    let dirChild = fs.opendirSync(`${dir.path}/${folder}`);
    getFilesRecursively(dirChild);
  }
}
