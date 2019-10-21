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
    #fielddropcont {

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
      margin-bottom: 0px;
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
  </style>
</head>
<body>
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
    <div class="dropdown">
      Organism Type <i class="mdi mdi-arrow-down-drop-circle"></i>
    </div>
    <div class="cont">
      <div class="dropdown-item">
        Animals
      </div>
    </div>
    <div class="cont">
      <div class="dropdown-item">
        Plants
      </div>
    </div>
  </div>
  <script>
  var viewporth = window.innerHeight;
  var height = document.getElementById('navbar').clientHeight;
  var dataheight = viewporth - height;
  dataheight = dataheight.toString();
  dataheight+='px';
  document.getElementById('fieldgrid').style.height=dataheight;
  </script>
</body>
</html>
