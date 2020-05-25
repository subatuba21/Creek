const fs = require('fs');
const readline = require('readline');
const getPath = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});
var str = "";
var folderStr="";
var first="";
var Path=""
var folderFirst="";

getPath.question("Path: ", (path)=>{
  var dir = fs.opendirSync(path);
  var remaining = true;
  Path=path;
  getPath.question("Recursive? ", (yes)=> {
    if (yes!="") {
      getFilesRecursively(dir);
    }
    else getFiles(dir, Path);
  });
});

function getFiles(dir, path) {
  dir.read().then(file=> {
    if (file==null) {
      throw new Error();
    }
    console.log(file.name);
    if (file.name.search(/(.jpg|.png|.gif)/i)!=-1) {
      str+=`${first}${file.name}`;
      if (first=="") {
        first=",";
      }
    }
    else if (file.name.includes(".") == false) {
      folderStr += `${folderFirst}${file.name}`;
      if (folderFirst == "") {
        folderFirst = ",";
      }
    }
    getFiles(dir);
  }).catch(function() {
    console.log("All done!");
    fs.writeFile(`${Path}/imgs.txt`, str, (err)=>{
      fs.writeFile(`${Path}/flds.txt`, folderStr.replace(/_/g, " "), (nerr)=> {
        console.log("Files created");
        dir.close();
      });
    });
  });
}

function getFilesRecursively(dir) {
  getFiles(dir);
  for (var folder of fs.readFileSync(`${Path}/flds.txt`, "utf-8").replace(/ /g, "_").split(",")) {
    setTimeout(function(){
      let dir = fs.opendirSync(Path + `/${folder}`)
      getFilesRecursively(dir);
    }, 200);
  }
}
