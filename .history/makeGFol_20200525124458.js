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

  dir.readSync().then(file => {
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
      try {
        fs.opendirSync(`${dir.path}/${file.name}`)
        folderStr += `${folderFirst}${file.name}`;
        if (folderFirst == "") {
          folderFirst = ",";
        }
      }
      catch(err) {

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
    if (str.trim()!="") fs.writeFileSync(`${dir.path}/imgs.txt`, str);
    if (folderStr.trim() != "") fs.writeFileSync(`${dir.path}/flds.txt`, folderStr.replace(/_/g, " "));
  }

}


var dirs=[];
var functionNum = 0;

function getFilesRecursively(dir) {
  var done = false;
  if (functionNum==0) {
    done=true;
  }
  var itemsOfDir = fs.readdirSync(dir.path);
  for (var item of itemsOfDir) {
    if (!item.includes(".")) {
      try {
        var newDir = fs.opendirSync(dir.path + "/" + item);
      }
      catch(err) {
        continue;
      }
      dirs.push(newDir);
      functionNum++;
      getFilesRecursively(newDir);
    }
  }
  if (done) {
    for (var directory of dirs) {
      getFiles(directory);
    }
  };
  
}
