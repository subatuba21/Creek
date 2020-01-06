<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- suitable for mobile devices-->
  <title>Field Guide</title>
  <link rel="stylesheet" href="creek.css">
  <script src="node_modules/@webcomponents/webcomponentsjs/webcomponents-bundle.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css">
  <style>
  :root {
    --grey: rgba(220,220,220, .6);
  }
  p {
    width: 75%;
    font-size: 24px;
    font-family: 'Dosis', sans-serif;
    display: inline-block;
  }

  .cont {
    width: 100%;
    text-align: center;
  }

  h2 {
    margin-bottom: 20px;
  }

  .dropdown {
    background-color: white;
    padding-left: 3%;
    padding-right: 3%;
    padding-top: .2%;
    padding-bottom: .4%;
    width: 10%;
    display: inline-block;
    font-family: 'Dosis', sans-serif;
    font-size: 20px;
    border-radius: 3px;
  }

  .dropdown i {
    position: relative;
    top: 2px;
    font-size: 18pt;
  }

  .dropdown-item {
    background-color: white;
    padding-left: 3%;
    padding-right: 3%;
    padding-top: .2%;
    padding-bottom: .4%;
    width: 10%;
    display: inline-block;
    font-family: 'Dosis', sans-serif;
    font-size: 20px;
    border-radius: 3px;
    margin-top: .5%;
  }

  #fgbuttons button:hover {
    opacity: .8;
  }

  #fgdisplay {
    text-align: center;
    border-radius: 3px;
    border: 2px solid black;
    width: 90%;
    margin-left: 5%;
    margin-top: 1.5%;
    background-color: #809c13;
    margin-bottom: 1.5%;
  }

  .displaych {
    margin: 1%;
    text-align: left;
  }

  .displaych img {
    float: left;
    width: 35%;
    margin-right: 2%;

  }

  #speciesInfo p {
    display: block;
    width: 100%;
    margin-top: 0px;
    margin-bottom: 10px;
  }

  #fgtree {
    text-align: center;
    margin-bottom: 1.5%;
    background-color: var(--grey);
    display: inline-block;
    width: 100%;
  }

  .card {
    display: inline-block;
    width: 200px;
    padding: 1%;
    background-color: var(--grey);
    border-radius: 3px;
    margin: 1%;
    cursor: pointer;
  }
  .card-image {
    display: inline-block;
    width: 100%;
    height: 200px;
  }
  .card-image img {
    display: inline-block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 3px;
  }
  .card-text {
    width: 100%;
    display: inline-block;
    font-size: 15pt;
    text-align: center;
    font-family: 'Dosis', sans-serif;
    font-size: 20pt;
  }
  .arrow {
    display: inline-block;
    font-size: 25pt;
    z-index: 0;
  }
  .arrow:hover {
    opacity: .4;
    cursor: pointer;
  }
  .arrow-disabled {
    opacity: .4;
  }
  </style>
</head>
<body>
  <image-gallery></image-gallery>
  <script>
  var currentFG = "";
  </script>
  <?php
  session_start();
  $_SESSION['page']="field-guide";
  include 'navbar.php';
  ?>
  <h2>Organisms at the Arroyo Del Valle!</h2>
  <script>
  document.getElementById("tree").addEventListener("click", function() {
    document.getElementById("fgdisplay").innerHTML = "";
  });

  </script>

  <div id="fgdisplay" class="cont">

    <div id="fgtree">
      <div class="displaych" style="text-align: center">
        <i class="mdi mdi-arrow-left arrow arrow-disabled" style="float: left; margin-left: 30%; position: relative"></i>
        <i class="mdi mdi-arrow-right arrow arrow-disabled" style="float: right; margin-right: 30%; position: relative"></i>
        <h2 style="margin-bottom: 10px">Phylogenetic Tree</h2>
      </div>
    </div>

    <div class="displaych">
      <h2 id="general-header"></h2>
      <img id="general-image" src="" alt="image">
      <div id='speciesInfo'>
        <p id="kingdom"></p>
        <p id="phylum"></p>
        <p id="class"></p>
        <p id="order"></p>
        <p id="family"></p>
        <p id="genus"></p>
        <p id="species"></p>
        <p id='genInfo'></p>
      </div>
      <div style="clear: both"></div>
    </div>
  </div>

  <script>

  class pathmaker {
    constructor() {
      this.level=1;
      this.levels = new Map();
      this.levels.set(1, null);
      this.levels.set(2, null);
      this.levels.set(3, null);
      this.topLevel = 4;
      this.backCounter=0;
    }

    changePath(level, item) {
      this.levels.set(level, item);
      for (let i = level+1; i<=this.topLevel; i++) {
        this.levels.set(i, null);
      }
    }

    setPath(level, item) {
      this.levels.set(level, item);
    }

    getBackwardPath() {
      this.backCounter++;
      let i = 1;
      this.pathStr="";
      if (this.levels.get(i)==null) {
        this.backCounter--;
        return null;
      }

      for (i; i<=this.getTopLevel()-this.backCounter; i++) {
        this.pathStr += "/";
        this.pathStr += this.levels.get(i);
      }
      return this.pathStr;
    }

    getForwardPath() {

    }

    getCurrentPath () {
      let i = 1;
      this.pathStr="";
      if (this.levels.get(i)==null) {
        return "";
      }

      for (i; i<=this.getTopLevel()-this.backCounter; i++) {
        this.pathStr += "/";
        this.pathStr += this.levels.get(i);
      }
      return this.pathStr;
    }

    getPath () {
      this.levels.i = 1;
      this.pathStr="";
      while(this.levels.get(this.levels.i)!=null) {
        this.pathStr += "/";
        this.pathStr += this.levels.get(this.levels.i);
        this.levels.i++;
      }
      return this.pathStr;
    }

    getTopLevel () {
      let topLevel = 0;
      while(this.levels.get(topLevel+1)!=null) {
        topLevel++;
      }
      console.log(topLevel);
      return topLevel;
    }

  }

  var pathMaker = new pathmaker();

  function setCardProperty (path) {

    for (let card of document.getElementsByClassName("card")) {
      card.addEventListener("click", () => {
        let header;
        for (let child of card.children) {
          if (child.classList.contains("card-text")) {
            header=child.innerText.trim();
            header = header.replace(/ /g, "_")
            break;
          }
        }
        changeContent(path, header)
      });
    }
  }

  function changeContent (path, header) {
    fetch(`field-guide${path}/${header}/main.json`).then(function(response) {
      return response.json();
    }).then( (json) => {

      if (json["organism"]!=null) {
        console.log("organism");
      }
      else {
        pathMaker.changePath(json.level, json.name);
        backCount=1;
        while(document.getElementsByClassName("card").length!=0) {
          for (let olditem of document.getElementsByClassName("card")) {
            olditem.remove();
          }
        }
        for (let item of json["folders"]) {
          let card = document.createElement("div");
          card.classList.add("card");
          let imageDiv = document.createElement("div");
          imageDiv.classList.add("card-image");
          let image = document.createElement("img");
          console.log(item[1]);
          image.src=item[1];
          image.classList.add("gallery-exception");
          let textDiv = document.createElement("div");
          textDiv.classList.add("card-text");
          let itemInstance = item[0];
          itemInstance = itemInstance.replace(/_/g, " ");
          textDiv.innerText = itemInstance;
          imageDiv.appendChild(image);
          card.appendChild(imageDiv);
          card.appendChild(textDiv);
          document.getElementsByClassName("displaych")[0].appendChild(card);
          console.log(pathMaker.getCurrentPath());
          setCardProperty(pathMaker.getCurrentPath());
        }
        newIms();
        document.getElementById("kingdom").innerText="";
        document.getElementById("phylum").innerText="";
        document.getElementById("class").innerText="";
        document.getElementById("order").innerText="";
        document.getElementById("family").innerText="";
        document.getElementById("genus").innerText="";
        document.getElementById("species").innerText="";
        document.getElementById("genInfo").innerText=json.text;
        document.getElementById("general-image").src = json.image;
        document.getElementById("general-header").innerText = json.name;
        pathMaker.backCounter=0;
      }

    });
  }

  function changeContentBack (path, header) {
    fetch(`field-guide${path}/${header}/main.json`).then(function(response) {
      return response.json();
    }).then( (json) => {

      if (json["organism"]!=null) {
        console.log("organism");
      }
      else {
        pathMaker.setPath(json.level, json.name);
        while(document.getElementsByClassName("card").length!=0) {
          for (let olditem of document.getElementsByClassName("card")) {
            olditem.remove();
          }
        }
        for (let item of json["folders"]) {
          let card = document.createElement("div");
          card.classList.add("card");
          let imageDiv = document.createElement("div");
          imageDiv.classList.add("card-image");
          let image = document.createElement("img");
          console.log(item[1]);
          image.src=item[1];
          image.classList.add("gallery-exception");
          let textDiv = document.createElement("div");
          textDiv.classList.add("card-text");
          let itemInstance = item[0];
          itemInstance = itemInstance.replace(/_/g, " ");
          textDiv.innerText = itemInstance;
          imageDiv.appendChild(image);
          card.appendChild(imageDiv);
          card.appendChild(textDiv);
          document.getElementsByClassName("displaych")[0].appendChild(card);
          setCardProperty(pathMaker.getCurrentPath());
        }
        newIms();
        document.getElementById("kingdom").innerText="";
        document.getElementById("phylum").innerText="";
        document.getElementById("class").innerText="";
        document.getElementById("order").innerText="";
        document.getElementById("family").innerText="";
        document.getElementById("genus").innerText="";
        document.getElementById("species").innerText="";
        document.getElementById("genInfo").innerText=json.text;
        document.getElementById("general-image").src = json.image;
        document.getElementById("general-header").innerText = json.name;
      }

    });
  }

  changeContent("", "");

  document.querySelector(".mdi-arrow-left").addEventListener("click", function() {
    let path = pathMaker.getBackwardPath();
    console.log(path);
    if (path!==null) {
      changeContentBack(path, "");
    }
  });

  setCardProperty("");

  </script>

  <script src="js/gallery.js" charset="utf-8"></script>
</body>
</html>
