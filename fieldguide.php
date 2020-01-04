<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- suitable for mobile devices-->
  <title>Field Guide</title>
  <link rel="stylesheet" href="creek.css">
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

  #fgbuttons {
    display: inline-block;
    width: 30%;
  }

  #fgbuttons button {
    width: 45%;
    margin: 0px;
    padding: 2%;
    background: rgba(220,220,220, .6);
    border: 0px;
    border-radius: 3px;
    font-size: 20pt;
    font-family: 'Dosis', sans-serif;
    cursor: pointer;
    margin: 1%;
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
  #genInfo {

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
  <div class="cont">
    <p>
      A multitude of organisms have been observed in the Arroyo Del Valle. We have been able to capture images of many using hand held cameras as well as a flex cam connected to a microscope back in the classroom. We plan on adding new creatures to our field guide as we are lucky enough to capture them on camera. Biology students are made aware of there levels of complexity and evolutionary relationships during the course of the year. A simple phylogenetic tree, as shown below, helps the students to organize what we find into it's appropriate taxonomic category and visualize their evolutionary origins.
    </p>
  </div>
  <div class="cont">
    <div id="fgbuttons">
      <button type="button" id="display">Display</button>
      <button type="button" id="tree">Tree</button>
    </div>
  </div>
  <script>
  document.getElementById("display").addEventListener("click", function() {

  });
  document.getElementById("tree").addEventListener("click", function() {
    document.getElementById("fgdisplay").innerHTML = "";
  });

  </script>

  <div id="fgdisplay" class="cont">

    <div id="fgtree">
      <div class="displaych" style="text-align: center">
        <i class="mdi mdi-arrow-left arrow arrow-disabled" style="float: left; margin-left: 30%"></i>
        <i class="mdi mdi-arrow-right arrow arrow-disabled" style="float: right; margin-right: 30%"></i>
        <h2 style="margin-bottom: 10px">Phylogenetic Tree</h2>

        <div class="card">
          <div class="card-image">
            <img src="http://placekitten.com/200/300" alt="hellokitty">
          </div>
          <div class="card-text">
            Animals
          </div>
        </div>

        <div class="card">
          <div class="card-image">
            <img src="http://placekitten.com/200/400" alt="hellokitty">
          </div>
          <div class="card-text">
            Plants
          </div>
        </div>

        <div class="card">
          <div class="card-image">
            <img src="http://placekitten.com/200/400" alt="hellokitty">
          </div>
          <div class="card-text">
            Fungi
          </div>
        </div>

      </div>
    </div>

    <div class="displaych">
      <h2>Animals</h2>
      <img src="images/4.jpg" alt="image">
      <div id='speciesInfo'>
        <p>Kingdom: Plantae</p>
        <p>Phylum: Spermatophyte</p>
        <p>Class: Monocotyledon</p>
        <p>Order: Poales</p>
        <p>Family: Sparganiaceae</p>
        <p>Genus: Sparganiaceae</p>
        <p>Species: Sparganiaceae</p>
        <p id='genInfo'> <br>

          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam efficitur a metus nec finibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris eu dictum nisl. Aenean non convallis lorem. Aenean nec commodo quam, non aliquam orci. Cras dapibus vulputate nibh et finibus. Sed mollis diam leo, in porttitor massa semper non. Quisque vel erat ut est fermentum condimentum sit amet sit amet dui.

          Nunc in commodo leo. Mauris sagittis varius mauris, suscipit elementum eros efficitur a. Morbi ornare, urna non molestie venenatis, neque neque aliquam tellus, in accumsan nisi quam vitae purus. Donec imperdiet pretium mi eget bibendum. Curabitur lectus diam, cursus non interdum eu, lacinia eget lectus. Suspendisse consequat erat nec diam varius ullamcorper. Proin at fermentum metus. Nunc consequat, turpis vitae suscipit semper, tortor lectus blandit justo, ut dapibus est tellus id est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla eu elit ultrices, tincidunt ligula pretium, porttitor justo. Vestibulum tellus ipsum, maximus ac risus vel, tempor scelerisque ante. Sed ac felis ac dui malesuada tincidunt. Proin hendrerit efficitur venenatis. Suspendisse efficitur suscipit orci, id pretium enim finibus non. Mauris ut enim sapien. Duis eleifend ex tortor. </p>

        </div>
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
          this.levels.set(4, null);
          this.levels.set(5, null);
          this.levels.set(6, null);
          this.levels.set(7, null);
        }

        function changePath(level, item) {

          this.levels.set(level, item);
        }

        function getBackwardLevel() {

        }

        function getForwardLevel() {

        }

        function getlevel () {
          this.level++;
          return this.level-1;
        }
      }

      var path = new pathmaker();

    </script>

    <script src="js/gallery.js" charset="utf-8"></script>
  </body>
  </html>
