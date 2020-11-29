const fs = require('fs');
const readline = require('readline');
const getPath = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});
var str = "";
var folderStr = "";
var first = "";
var folderFirst = "";

getPath.question("Path: ", (path) => {
  var dir = fs.opendirSync(path);
  var remaining = true;
  Path = path;
  getPath.question("Recursive? ", (yes) => {
    if (yes != "") {
      getFilesRecursively(dir, path);
    }
    else getFiles(dir, path);
  });
});

function getFiles(dir, path) {
  dir.read().then(file => {
    if (file == null) {
      throw new Error();
    }
    console.log(file.name);
    if (file.name.search(/(.jpg|.png|.gif)/i) != -1) {
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
  }).catch(function () {
    console.log("All done!");
    fs.writeFile(`${path}/imgs.txt`, str, (err) => {
      fs.writeFile(`${path}/flds.txt`, folderStr.replace(/_/g, " "), (nerr) => {
        console.log("Files created");
        dir.close();
      });
    });
  });
}

async function getFilesRecursively(dir, path) {
  getFiles(dir, path);
  for (var folder of fs.readFileSync(`${path}/flds.txt`, "utf-8").replace(/ /g, "_").split(",")) {
    fs.opendir(`${path}/${folder}`, function (err, dir) {
      if (err) {
        console.log(err);
      }
      else {
        getFiles(dir, `${path}/${folder}`);
      }
    });
  }
}
