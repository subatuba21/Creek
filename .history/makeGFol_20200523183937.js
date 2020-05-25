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
  getFiles(dir, path);
});

function getFiles(dir) {
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
    else if (file.name.includes(".") == -1) {
      folderStr += `${folderFirst}${file.name}`;
      if (folderFirst == "") {
        folderFirst = ",";
      }
    }
    getFiles(dir);
  }).catch(function() {
    console.log("All done!");
    fs.writeFile(`${Path}/imgs.txt`, str, (err)=>{
      fs.writeFile(`${Path}/flds.txt`, folderStr, (nerr)=> {
        console.log("Files created");
        dir.close();
      });
    });
  });
}
