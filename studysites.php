<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- suitable for mobile devices-->
  <title>Study Sites</title>
  <link rel="stylesheet" href="creek.css">
  <script src="node_modules/@webcomponents/webcomponentsjs/webcomponents-bundle.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css">
  <script src="node_modules/body-scroll-lock/lib/bodyScrollLock.js" charset="utf-8"></script>
  <meta name="description" content="This site was created for Amador Valley High students to study the creek next to the high school, the Arroyo Del Valle. The home page has information about the study of the creek at Amador, the original creator of the website, as well as useful documents such as maps. The study sites page gives information about the various study sites that Amador students observe and collect data on. The data page gives students information about the various fields of data that can be collected from the creek. The field guide page gives information about the plant, animals, and other organisms that can be found in the creek. The gallery shows many interesting pictures of the creek taken by Amador students and teachers.">
  <style>
    #sitetext {
      display: block;
      margin: 0px;
      font-size: 20pt;
      margin-bottom: 2%;
      margin-left: 2%;
      margin-right: 2%;
      text-align: left;
    }

    #sitecont h2 {
      font-size: 25pt;
    }

    .siteims {
      width: 40%;
      margin: 2%;
    }


    #sitecont {
      text-align: center;
      font-family: 'Dosis', sans-serif;
      font-size: 25pt;
      width: 75%;
      display: inline-block;
      min-height: 95vh;
    }

    #siteheader {
      font-size: 30pt;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }

    input[type=number]:invalid {
      box-shadow: 0px 0px 0px 1px red inset;
    }

    input[type=number]::placeholder {
      color: black;
      opacity: .4;
    }



    @media (max-width: 768px) {
      #sitecont {
        width: 95%;
      }

      #sitetext {
        font-size: 13pt;
      }

      #sitecont h2 {
        font-size: 19pt
      }

      .siteims {
        display: inline-block;
        width: 85%;
      }
    }
  </style>

</head>

<body>
  <image-gallery></image-gallery>
  <?php
  session_start();
  $_SESSION['page'] = "study-sites";
  include 'navbar.php';
  ?>
  <!--
  <script src="js/navbar-mobile.js" charset="utf-8"></script> -->

  <div style="text-align:center">
    <div id='sitecont'>
      <?php
      print "
    <h2 id='siteheader'>Site 1</h2>
    <p id='sitetext'>
    Site One is located on the east side of the Main Street overpass. It consists of a large pool of water that is backed up as a consequence of the large concrete slab that supports the Main Street Bridge. Water moves over and spreads across the support slab at about a depth of 2-3 cm. The pool of water that preceeds the slab is approximately 1.5 meters at its deepest point. Site one has never been seen at a dangerously low level of water. Large carp have been observed at this location on many occasions. The water in site one has little to no flow and is fairly deep cpompared to the rest of the creek study area. DO tends to be lower, and nitrate and conductivity levels tend to be higher at this site compared to most other areas in the project study area

    </p>
    <div id='siteimages'>
    <img class='siteims' src='images/Study_Sites/Site_1/site1a.jpg'>
    <img class='siteims' src='images/Study_Sites/Site_1/site1b.jpg'>
    </div>
    ";

      ?>
    </div>

    <div class="bottom-left-sticky">Open Site Navigation</div>
    <script src="js/bottom-left-sticky.js" charset="utf-8"></script>


    <div id="navbar-bottom">
      <div class="navbar-item">
        <span>
          Enter site number:
          <input id='sitechanger' style="font-family: 'Dosis', sans-serif;" type="number" name="site" placeholder="1-14" min="1" max="14">
          <i class="mdi mdi-arrow-right-drop-circle-outline" id='arrow-go'></i>
          <i style="margin-left: 1%;" class="mdi mdi-arrow-left" id='arrow-left'></i>
          <i class="mdi mdi-arrow-right" id='arrow-right'></i>
          <i class="mdi mdi-eye-off-outline"></i>
          <script src="js/sitechanger.js" charset="utf-8"></script>
        </span>
      </div>
    </div>

  </div>
  <!-- <script src="js/sitecont.js" charset="utf-8"></script> -->
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

      <p>© Subha Das</p>
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


  <script>
    setUpStickyElements();
  </script>
  <script src="js/sitesAndDataRouting.js"></script>
</body>

</html>