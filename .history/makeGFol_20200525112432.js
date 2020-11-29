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
    else getFiles(dir, path);
  });
});

function getFiles(dir, path) {
  var str = "";
  var folderStr = "";
  dir.read().then(file => {
    if (file == null) {
      return [str, folderStr];
    }
    console.log(file.name);
    if (file.name=="imgs.txt" || file.name=="flds.txt") {
      fs.unlinkSync(`${path}/${file.name}`);
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
    getFiles(dir, path);
  }).then(function (stuff) {
    let str = stuff[0];
    let folderStr = stuff[1];
    console.log("All done!");
    fs.writeFile(`${path}/imgs.txt`, str, (err) => {
      fs.writeFile(`${path}/flds.txt`, folderStr.replace(/_/g, " "), (nerr) => {
        console.log("Files created");
        dir.close();
      });
    });
  });
}

function getFilesRecursively(dir, path) {
  
}
