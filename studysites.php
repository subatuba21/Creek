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


  input {
    background-color: var(--grey);
    padding: .3%;
    border-radius: 2px;
    border: none;
    font-size: .9vw;
  }

  #navbar-bottom .navbar-item {
    font-size: 1.3vw;
  }

  #navbar-bottom .navbar-item span {
    padding-top:.4%;
    padding-bottom: .7%;
    padding-left: .9%;
    padding-right: .7%;
    border-radius: 3px;
    background-color: var(--grey);
    box-shadow: 0px 2px 3px 2px #474747;
  }

  #navbar-bottom i {
    font-size: 1.6vw;
    position: relative;
    top: 3px;
    color: 	black;
    cursor: pointer;
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
  }

  #navbar-bottom {
    position: fixed;
    bottom: 15px;
    width: 100%;
    font-family: 'Dosis', sans-serif;
    font-size: 15pt;
    background-color: white;
    text-align: center;
    background-color: transparent;
    /* margin-bottom: .8%; */
    -webkit-touch-callout: none; /* iOS Safari */
  -webkit-user-select: none; /* Safari */
   -khtml-user-select: none; /* Konqueror HTML */
     -moz-user-select: none; /* Old versions of Firefox */
      -ms-user-select: none; /* Internet Explorer/Edge */
          user-select: none; /* Non-prefixed version, currently
                                supported by Chrome, Opera and Firefox */
  }

  #siteheader {
    font-size: 30pt;
  }


  @media (max-width: 768px) {
    #sitecont {
      margin-top: 80px;
      width: 95%;
    }
    #navbar-bottom .navbar-item {
      font-size: 16pt;
    }
    #navbar-bottom .navbar-item span {
      font-size: 13pt;
      padding: 2%;
    }
    #navbar-bottom i {
      font-size: 17pt;
    }
    input {
      font-size: 13pt;
      width: 60px;
    }
    #sitetext {
      font-size: 16pt;
    }

    #sitecont h2 {
      font-size: 19pt;
      padding: top: 50px;
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
  $_SESSION['page']="study-sites";
  include 'navbar.php';
  ?>
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
        <input id='sitechanger' style="font-family: 'Dosis', sans-serif;" type="text" name="site" placeholder="1-14">
        <i class="mdi mdi-arrow-right-drop-circle-outline" id='arrow-go'></i>
        <i style="margin-left: 1%;"class="mdi mdi-arrow-left" id='arrow-left'></i>
        <i class="mdi mdi-arrow-right" id='arrow-right'></i>
        <i class="mdi mdi-eye-off-outline"></i>
        <script src="js/sitechanger.js" charset="utf-8"></script>
      </span>
    </div>
  </div>

  <script>
    var sticky = document.querySelector(".bottom-left-sticky");
    var stickyHeight = window.getComputedStyle(sticky).getPropertyValue("height");
    sticky.style.opacity = "0";
    var navbarBottom = document.getElementById("navbar-bottom");
    var navHeight = window.getComputedStyle(navbarBottom).getPropertyValue("height");
    fixedUntilHeight(navbarBottom, 1000, navHeight);
    fixedUntilHeight(sticky, 1000, stickyHeight);
    navbarBottom.style.opacity = "1";

    document.querySelector(".mdi-eye-off-outline").addEventListener("click", function () {
      fadeIn(sticky);
      fadeOut(navbarBottom);
      window.scrollTo(window.scrollX, window.scrollY - 1);
      window.scrollTo(window.scrollX, window.scrollY + 1);

    });

    sticky.addEventListener("click", function () {
      fadeOut(sticky);
      fadeIn(navbarBottom);
      window.scrollTo(window.scrollX, window.scrollY - 1);
      window.scrollTo(window.scrollX, window.scrollY + 1);
    });

  </script>

</div>
  <!-- <script src="js/sitecont.js" charset="utf-8"></script> -->
    <script src="js/gallery.js" charset="utf-8"></script>
</body>
</html>
