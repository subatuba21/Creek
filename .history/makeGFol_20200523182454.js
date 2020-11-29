const fs = require('fs');
const readline = require('readline');
const getPath = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});
var str = "";
var first="";

getPath.question("Path: ", (path)=>{
  var dir = fs.opendirSync(path);
  var remaining = true;
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
    getFiles(dir);
  }).catch(function() {
    console.log("All done!");
    fs.writeFile("recentIml.txt", str, (err)=>{
      console.log("File created");
      dir.close();
    });
  });
}
