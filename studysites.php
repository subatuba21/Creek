<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- suitable for mobile devices-->
    <title>Study Sites</title>
    <link rel="stylesheet" href="creek.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css">
    <style>

      #sitetext {
        display: block;
        margin: 0px;
        font-size: 1.5vw;
        margin-bottom: 2%;
      }

      #sitecont h2 {
        font-size: 2vw;
      }

      #sitecont {
        margin: 0px;
        margin-left: 2%;
        margin-right: 2%;
        padding: none;
      }

      #navbar-bottom {
        border: none;
        background-color: #6B8E23;
      }
      body {
        overflow-y: hidden;
      }

      input {
        background-color: #607F1F;
        padding: .3%;
        border-radius: 2px;
        border: none;
        font-size: .9vw;
      }
      #navbar-bottom .navbar-item {
        font-size: 1.3vw;
      }

      i {
        font-size: 1.6vw;
        position: relative;
        top: 2px;
        color: 	#809c13;
      }
    </style>

  </head>
  <body>
    <?php
      session_start();
      $_SESSION['page']="study-sites";
      include 'navbar.php';
     ?>
     <div id='sitecont'>
       <?php
          print "
            <h2 id='siteheader'>Site 1</h2>
            <p id='sitetext'>
            Site One is located on the east side of the Main Street overpass. It consists of a large pool of water that is backed up as a consequence of the large concrete slab that supports the Main Street Bridge. Water moves over and spreads across the support slab at about a depth of 2-3 cm. The pool of water that preceeds the slab is approximately 1.5 meters at its deepest point. Site one has never been seen at a dangerously low level of water. Large carp have been observed at this location on many occasions. The water in site one has little to no flow and is fairly deep cpompared to the rest of the creek study area. DO tends to be lower, and nitrate and conductivity levels tend to be higher at this site compared to most other areas in the project study area

            </p>
            <div id='siteimages'>
              <img class='siteims' src='study-sites/site1/images/site1a.jpg'>
              <img class='siteims' src='study-sites/site1/images/site1b.jpg'>
            </div>
          ";

       ?>
       <div id="navbar-bottom">
         <div class="navbar-item">
           Enter site number:
           <input id='sitechanger' style="font-family: 'Dosis', sans-serif;" type="text" name="site" placeholder="1-14">
           <i class="mdi mdi-arrow-right-bold-circle"></i>


           <i style="margin-left: 2%;"class="mdi mdi-arrow-left"></i>
           <i class="mdi mdi-arrow-right"></i>
           <script src="js/sitechanger.js" charset="utf-8"></script>
         </div>
       </div>
       <script src="" charset="utf-8"></script>
     </div>
     <script src="js/sitecont.js" charset="utf-8"></script>

  </body>
</html>
