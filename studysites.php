<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- suitable for mobile devices-->
    <title>Study Sites</title>
    <link rel="stylesheet" href="creek.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
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

            </p>
            <div id='siteimages'>
            </div>






          ";

       ?>
     </div>
     <div id="navbar-bottom">
       <div class="navbar-item">
         Enter site number:
         <input id='sitechanger' style="font-family: 'Dosis', sans-serif;" type="text" name="site" placeholder="1-21">
         <script src="js/sitechanger.js" charset="utf-8"></script>
       </div>
     </div>
  </body>
</html>
