<?php
session_start();
$_SESSION['page'] = "field-guide";
?>

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
  <script src="node_modules/body-scroll-lock/lib/bodyScrollLock.js" charset="utf-8"></script>
  <meta name="description" content="This site was created for Amador Valley High students to study the creek next to the high school, the Arroyo Del Valle. The home page has information about the study of the creek at Amador, the original creator of the website, as well as useful documents such as maps. The study sites page gives information about the various study sites that Amador students observe and collect data on. The data page gives students information about the various fields of data that can be collected from the creek. The field guide page gives information about the plant, animals, and other organisms that can be found in the creek. The gallery shows many interesting pictures of the creek taken by Amador students and teachers.">
  <style>
    /* :root {
  --grey: rgba(220,220,220, .6);
  } */
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

    #intro {
      margin-bottom: 10px;
      margin-top: 80px;
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

    #fgdisplay {
      text-align: center;
      border-radius: 3px;
      width: 90%;
      margin-left: 5%;
      margin-top: 1.5%;
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
      border-radius: 2px;
      box-shadow: 0px 3px 5px 4px #474747;
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
      text-align: center;
      font-family: 'Dosis', sans-serif;
      font-size: 18pt;
    }

    /* .arrow {
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
    } */

    .levels {
      font-weight: 600;
    }

    /* .mdi-arrow-left {
      margin-left: 30%;
    }

    .mdi-arrow-right {
      margin-right: 30%;
    } */

    #fginfo {
      text-align: center;
      margin: 0px;
      width: 95%;
      margin-left: 2.5%;
    }

    .button {
      cursor: pointer;
    }

    .button:hover {
      text-decoration: underline;
    }

    #general-header {
      margin-bottom: 5px;
    }

    @media (max-width: 768px) {
      #speciesInfo p {
        overflow-x: hidden;
      }

      h2 {
        font-size: 15pt;
      }

      .card-image {
        display: none;
      }

      .mdi-arrow-left {
        margin-left: 10%;
      }

      .mdi-arrow-right {
        margin-right: 10%;
      }

      /* .arrow {
        font-size: 20pt;
        margin-top: 10px;
      } */

      #fgtree {
        padding: 0px;
        display: block;
        padding-bottom: 10px
      }

      #fgtree h2 {
        display: block;
        padding-top: 10px;
      }

      .card-text {
        font-size: 15pt;
      }

      p {
        font-size: 13pt;
      }

      .displaych img {
        width: 100%;
        margin: 0%;
        float: left;
        margin-bottom: 10px;
      }

      #general-header {
        margin-top: 35px;
      }

      #fginfo {
        margin-bottom: 10px;
      }

      #speciesInfo p {
        margin-bottom: 0px;
      }

      .levels-margin-mobile {
        margin-bottom: 10px !important;
      }
    }
  </style>
</head>

<body>
  <image-gallery></image-gallery>
  <script>
    var currentFG = "";
  </script>
  <?php
  include 'navbar.php';
  ?>

  <h2 id="intro">Organisms at the Arroyo Del Valle!</h2>
  <p id="fginfo">Scroll down for more info about the current selection.</p>

  <div id="fgdisplay" class="cont">

    <div id="fgtree">
      <div class="displaych" style="text-align: center">
        <!-- <i class="mdi mdi-arrow-left arrow arrow-disabled" style="float: left; position: relative"></i>
        <i class="mdi mdi-arrow-right arrow arrow-disabled" style="float: right; position: relative"></i> -->
        <h2 style="margin-bottom: 10px">Phylogenetic Tree</h2>
      </div>
    </div>

    <div class="displaych" id="main-display-area">
      <h2 id="general-header"></h2>
      <p style="text-align: center; width: 95%; margin-left: 2.5%; margin-top: 0px; margin-bottom: 1.5em">Scroll up to view organisms and categories.</p>
      <img id="general-image" src="" alt="image">
      <div id='speciesInfo'>
        <p id="kingdom" class="levels"></p>
        <p id="phylum" class="levels"></p>
        <p id="class" class="levels"></p>
        <p id="order" class="levels"></p>
        <p id="family" class="levels"></p>
        <p id="genus" class="levels"></p>
        <p id="species" class="levels"></p>
        <p id='genInfo'></p>
      </div>
      <div style="clear: both"></div>
    </div>
  </div>


  <script src="js/pathmaker.js" charset="utf-8"></script>

  <script>
    var pathMaker = new pathmaker();

    function setCardProperty(path) {

      for (let card of document.getElementsByClassName("card")) {
        card.addEventListener("click", () => {
          let header;
          for (let child of card.children) {
            if (child.classList.contains("card-text")) {
              header = child.innerText.trim();
              path = path.replace(/ /g, "_");
              header = header.replace(/ /g, "_");
              break;
            }
          }
          changeContent(path, header, false, true);
        });
      }

    }

    function changeContent(path, header, back, setHistory, callback) {

      fetch(`field-guide${path}/${header}/main.json`).then(function(response) {
        return response.json();
      }).then((json) => {
        //url and history injection
        var urlPath = `${path}/${header}`;

        //document.querySelector("#fgtree h2").innerText = `Home${pathMaker.getCurrentConvertedPath()}`;
        if (json["organism"] != null) {
          if (setHistory) window.history.pushState(urlPath, urlPath, `?p=${path}&o=${header}`);

          //console.log("organism");
          newIms();
          var levels = document.querySelectorAll(".levels");
          for (var element of levels) {
            element.classList.add("levels-margin-mobile");
          }
          if (json.kingdom != null) {
            document.getElementById("kingdom").innerText = "Kingdom: " + json.kingdom;
          }
          if (json.phylum != null) {
            document.getElementById("phylum").innerText = "Phylum: " + json.phylum;
          }
          if (json.class != null) {
            document.getElementById("class").innerText = "Class: " + json.class;
          }
          if (json.order != null) {
            document.getElementById("order").innerText = "Order: " + json.order;
          }
          if (json.family != null) {
            document.getElementById("family").innerText = "Family: " + json.family;
          }
          if (json.genus != null) {
            document.getElementById("genus").innerText = "Genus: " + json.genus;
          }
          if (json.species != null) {
            document.getElementById("species").innerText = "Species: " + json.species;
          }
          document.getElementById("genInfo").innerText = json.text;
          document.getElementById("general-image").src = json.image;
          document.getElementById("general-header").innerText = json.name;
          var displayArea = document.getElementById("main-display-area");
          window.scrollTo(0, displayArea.offsetTop - parseInt(window.getComputedStyle(document.getElementById("navbar")).getPropertyValue("height")) - 20);
          var fgPath = `Home/${pathMaker.getCurrentPath()}/**${header}`

        } else {
          var levels = document.querySelectorAll(".levels");
          let name = json.name.replace(/ /g, "_");
          for (var element of levels) {
            element.classList.remove("levels-margin-mobile");
          }
          if (setHistory) window.history.pushState(urlPath, urlPath, `?p=${urlPath}`);
          if (back) {
            pathMaker.backCounter = 0;
          }
          pathMaker.changePath(json.level, name);
          displayCards(json);
          var fgPath = `Home/${pathMaker.getCurrentPath()}`
        }

        //path buttons
        var headerOfTree = document.querySelector("#fgtree h2");
        headerOfTree.innerHTML = "";

        fgPath = fgPath.split("/");
        console.log(fgPath);
        for (var i = 0; i < fgPath.length; i++) {
          let button = document.createElement("a");
          let separator = document.createElement("i");
          separator.style.marginLeft = "5px";
          separator.style.marginRight = "5px";
          separator.classList.add("mdi", "mdi-arrow-right-thick");
          button.classList.add("button");

          button.innerText = fgPath[i].replace(/_/g, " ").replace(/\*\*/, "");
          let pathOfButton = "";
          let optionalHeader = ""

          for (var e = 1; e <= i; e++) {
            if (fgPath[e].substring(0, 2) != "**") {
              pathOfButton += `${fgPath[e]}/`;
            } else {
              optionalHeader = fgPath[e].substring(2);
            }
          }

          button.onclick = function() {
            changeContent(pathOfButton, optionalHeader, false, true);
          }

          if (button.innerText.trim() != "" && i != 0) {
            headerOfTree.appendChild(separator);
          }

          if (button.innerText.trim() != "" && (i == fgPath.length - 1 || fgPath.length == 2)) {
            let currentSelecSpan = document.createElement("span");
            currentSelecSpan.style.fontWeight = "500";
            currentSelecSpan.innerText = "Current Selection: ";
            headerOfTree.appendChild(currentSelecSpan);
            button.style.fontWeight = "600";
            currentSelecSpan.appendChild(button);
          } else headerOfTree.appendChild(button);

        }

      }).finally(function() {
        if (callback) callback();
      })
    }

    function displayCards(json) { //display organisms/category cards

      //document.querySelector("#fgtree h2").innerText = `Home${pathMaker.getCurrentConvertedPath()}`;
      //alert(pathMaker.getCurrentPath());
      while (document.getElementsByClassName("card").length != 0) {
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
        //console.log(item[1]);
        image.src = item[1];
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
      }
      setCardProperty(pathMaker.getCurrentPath());
      newIms();

      //Handles categories - changeContent handles info for organisms
      document.getElementById("kingdom").innerText = "";
      document.getElementById("phylum").innerText = "";
      document.getElementById("class").innerText = "";
      document.getElementById("order").innerText = "";
      document.getElementById("family").innerText = "";
      document.getElementById("genus").innerText = "";
      document.getElementById("species").innerText = "";
      document.getElementById("genInfo").innerText = json.text;
      document.getElementById("general-image").src = json.image;
      document.getElementById("general-header").innerText = json.name;

    }


    // document.querySelector(".mdi-arrow-left").addEventListener("click", function() { //back button
    //   let path = pathMaker.getBackwardPath();
    //   if (path !== null) {
    //     changeContent(path, "", true, true);
    //   }
    // });
  </script>


  <script src="js/customurlFG.js" charset="utf-8"></script> <!-- This starts off the home page and handles custom urls -->
  <script src="js/gallery.js" charset="utf-8"></script>

  <footer>
    <div id="creekwatch-footer">
      <img class="gallery-exception" src="images/avweb.png" alt="hi">

      <script>
        var avlogo = document.querySelector("#creekwatch-footer img");
        avlogo.onclick = function() {
          window.open("https://amadorweb.org", '_blank');
        }
      </script>

      <p>© AV Web Development</p>
    </div>

    <div>
      <h4>Sections</h4>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="studysites.php">Study Sites</a></li>
        <li><a href="data.php">Data</a></li>
        <li><a href="fieldguide.php">Field Guide</a></li>
      </ul>
    </div>

    <div>
      <h4>Other Links</h4>
      <ul>
        <li><a href="index.php?files=t">File Downloads</a></li>
        <li><a href="fieldguide.php?p=/Endangered_Species">Endangered Species</a></li>
        <li><a href="fieldguide.php?p=/Indicator_Species">Indicator Species</a></li>
      </ul>
    </div>

    <!-- <div id="contact-footer">
        <p><a>Contact Teachers</a></p>
        <p><a>Contact Development Team</a></p>
        <p><a>Want to make a change to the website?</a></p>
      </div> -->
  </footer>
</body>

</html>