var fs = require("fs");
var readline = require("readline");
var r1 = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

r1.question("Type 0 for cards, 1 for organism: ", function(answer) {
  switch(parseInt(answer)) {



    case 1:
      console.log("organisms");
      break;



    case 0:

      console.log("cards");
      r1.question("Path: ",function(path) {
        var cards=[];
        var file = fs.readFileSync(path, "utf-8");
        var start;
        var end;
        file = file.split("\n");
        for (let ind in file) {
          if (file[ind].includes("___")) {
            start = ind+1;
          }
          if (file[ind].includes("If You see any Endangered Species")) {
            end = ind;
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
