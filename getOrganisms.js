var fs = require("fs");
var readline = require("readline");
var textract = require("/home/subatuba21/node_modules/textract");
var jsonParent;


var r1 = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

function getText(path, folderjson) {
  textract.fromFileWithPath(path, function( error, text ) {
    if (text!=null && text.substring(0, text.search("Kingdom")).trim()!="") {
      analyze(text, folderjson);
      //console.log(text + "\n\n New File \n");
    }
  });
}

function getIndicesOf (text, str) {
  start=0;
  let indices = [];
  while(text.indexOf(str, start)!=-1) {
    indices.push(text.indexOf(str, start));
    start=text.indexOf(str, start)+str.length+1;
  }
  return indices;
}

function analyze(text, folderjson) {
  let speciesStop=text.search("General");
  let generalStop=text.search("Copyright");
  let imageLocation=getIndicesOf(text, "Image");
  if (imageLocation.length!=0) {
    speciesStop=imageLocation[0];
    generalStop=imageLocation[1];
  }
  let json = {
    organism: "yes",
    name: text.substring(0, text.search("Kingdom")).trim(),
    kingdom: text.substring(text.search("Kingdom:")+8, text.search("Phylum")).trim(),
    phylum: text.substring(text.search("Phylum:")+7, text.search("Class")).trim(),
    class: text.substring(text.search("Class:")+6, text.search("Order")).trim(),
    order: text.substring(text.search("Order:")+6, text.search("Family")).trim(),
    family: text.substring(text.search("Family:")+7, text.search("Genus")).trim(),
    genus: text.substring(text.search("Genus:")+6, text.search("Species")).trim(),
    species: text.substring(text.search("Species:")+8, speciesStop).trim(),
    text: text.substring(text.search("General Information:")+20, generalStop).trim(),
    convertedName: text.substring(0, text.search("Kingdom")).trim().replace(/ /g, "_")
  }
  console.log(json.convertedName);
  connect(json, folderjson);
}

var usedIns = [];
function connect(organism, folderjson) {
  var allOrgs = folderjson.folders;
  for (let folderin=0; folderin<allOrgs.length; folderin++) {
    let orgname = allOrgs[folderin][0];
    let regexp = new RegExp(orgname, "i");
    if (organism.convertedName.search(regexp)!=-1) {
      if (usedIns.includes(folderin)) {
        continue;
      }
      usedIns.push(folderin);
      organism.link = folderin;
      organism.image = allOrgs[folderin][1];
      console.log(`I found ${organism.name}, ${organism.link}`);
      save(organism, folderjson);
      break;
    }
  }
}

function save(organism, folderjson) {
  let name = folderjson.folders[organism.link][0];
  organism=JSON.stringify(organism);
  fs.writeFileSync(jsonParent+"/" + name + "/main.json", organism);
}

r1.question("Type 0 for cards, 1 for organism: ", function(answer) {
  switch(parseInt(answer)) {



    case 1:

    console.log("organisms");
    r1.question("Path: ", function(path) {
      r1.question("JSON Path: ", function(jsonp) {
        // path = "/home/subatuba21/Downloads/arthro";
        // jsonp="/opt/lampp/htdocs/Websites/Creek/field-guide/Animals/Arthropods/Aquatic_Adult/main.json";
        var json = fs.readFileSync(jsonp, "utf-8");
        jsonParent = jsonp.substring(0, jsonp.lastIndexOf("/")+1);
        json=JSON.parse(json);
        console.log(json.image);
        console.log(jsonParent);
        var folders=json.folders;
        var dir = fs.readdirSync(path);
        for (var organism of folders) {
          if (fs.existsSync(jsonParent+organism[0])) {
            continue;
          }
          fs.mkdirSync(jsonParent+organism[0]);
        }
        for (var file of dir) {
          if (file.search(".docx")!=-1) {
            getText(`${path}/${file}`, json);
          }
        }
      });
    });
    break;

    case 0:

    console.log("cards");
    r1.question("Path: ",function(path) {
      var cards=[];
      var file = fs.readFileSync(path, "utf-8");
      var start;
      var end;
      file = file.split("\n");
      for (let ind=0; ind<file.length; ind++) {
        if (file[ind].includes("___")) {
          start = parseInt(ind)+1;
        }
        if (file[ind].includes("If You see any Endangered Species")) {
          end = ind;
          break;
        }
      }
      for (let i=start; i<end; i++) {
        if (file[i].trim()!="" && file[i].search(/\s/)==0) {
          cards.push(file[i].trim().replace(/ /g, "_"));
        }
        console.log(file[i]);
      }
      console.log(cards.toString());

      r1.question("image path:", function(imgpath) {
        var imgs = cards.map(function (card) {
          return imgpath+"/"+card.toLowerCase().replace(/_/g, "")+".jpg";
        });
        var pairs = [];
        for (var ind in cards) {
          pairs.push([cards[ind], imgs[ind]]);
        }
        console.log(JSON.stringify(pairs));
      });

    });
    break;



  }
});
