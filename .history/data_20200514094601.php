<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- suitable for mobile devices-->
  <title>Data</title>
  <link rel="stylesheet" href="creek.css">
  <script src="node_modules/@webcomponents/webcomponentsjs/webcomponents-bundle.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css">
  <script src="js/bottom-left-sticky.js" charset="utf-8"></script>
  <script src="node_modules/body-scroll-lock/lib/bodyScrollLock.js" charset="utf-8"></script>
  <style>
    #displayarea {
      font-size: 20pt;
      font-family: 'Dosis', sans-serif;
      min-height: 0;
      width: 71%;
      display: inline-block;
      text-align: left;
    }

    #displayarea h2 {
      font-size: 25pt;
    }

    #displayarea p {
      margin-left: 15px;
      margin-right: 15px;
    }

    #displayarea table,
    th,
    td {
      border: 2px solid black;
    }

    #displayarea table {
      margin: 15px;
      padding: 0px;
    }

    #displayarea td,
    th {
      padding: 5px;
    }

    #datagrid {
      display: inline-block;
      text-align: center;
    }

    #displayword {
      margin: 30px;
      margin-top: 0px;
    }

    #displaymedia {
      max-width: 100%;
      background-color: white;
      margin-top: 0px;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      grid-template-rows: auto;
      grid-auto-flow: row dense;
      grid-auto-columns: 1fr;
      margin-bottom: 10px;
      overflow-x: hidden;

    }

    .displayitem {
      text-align: center;
      margin: 10px;
      max-width: 100%;
    }

    .displayitem iframe {
      width: 100%;
    }

    .displayitem img {
      width: 100%;
    }

    #dropup-content {
      display: none;
      position: absolute;
      bottom: 50px;
      background-color: #f1f1f1;
      width: 130px;
      background-color: var(--solid-grey);
      cursor: pointer;
      font-size: 14.5pt;
      height: 350px;
      overflow-y: scroll;
    }

    #dropup-content div {
      padding-top: 1px;
    }

    #dropup-content div:hover {
      opacity: .6;
    }

    #navbar-bottom {
      display: inline-block;
    }

    .bottom-left-sticky {
      display: block;
    }

    #sitechanger {
      padding: .1%;
      padding-bottom: .3%;
      font-size: 16pt;
      cursor: pointer;
    }

    @media (max-width:768px) {
      #sitechanger {
        padding: 1px;
        padding-bottom: 1px;
        font-size: 14.5pt;
      }

      #displayarea {
        display: inline-block;
        width: auto;
        background-color: transparent;
        box-shadow: 0px 0px 0px;
        font-size: 13pt;
        margin: 10px;
        margin-bottom: 55px;

      }

      #displayarea p {
        margin-left: 0px;
        margin-right: 0px;
      }

      #displayarea h2 {
        font-size: 19pt;
        margin-top: 6px;
      }

      #datagrid {
        display: block;
      }

      #buttonarea {
        display: none;
      }

      #navbar-bottom {
        display: inline-block;
      }

      .bottom-left-sticky {
        display: block;
      }

      #dropup-content {
        bottom: 40px;
      }
    }
  </style>
</head>

<body>
  <?php
  session_start();
  $_SESSION['page'] = "data";
  include 'navbar.php';
  ?>
  <image-gallery></image-gallery>
  <div id="datagrid">

    <div id="displayarea"></div>
  </div>
  <div id="navbar-bottom">
    <div class="navbar-item">
      <span>
        <div id='sitechanger' style="font-family: 'Dosis', sans-serif; width: 130px;">
          Select Page
          <div id="dropup-content">
            <div>
              Conductivity
            </div>
            <div>
              Turbidity
            </div>
            <div>
              Temperature
            </div>
            <div>
              Productivity
            </div>
            <div>
              Depth
            </div>
            <div>
              Phosphate Levels
            </div>
            <div>
              pH
            </div>
            <div>
              Nitrate
            </div>
            <div>
              Humidity
            </div>
            <div>
              Flow Rate
            </div>
            <div>
              DO
            </div>
            <div>
              Plankton Net
            </div>
            <div>
              Kick Net
            </div>
            <div>
              Seine Net
            </div>
            <div>
              Dip Net
            </div>
            <div>
              Succession
            </div>
            <div>
              Sediments
            </div>
            <div>
              Clean Up
            </div>
          </div>


        </div>
        <i class="mdi mdi-eye-off-outline"></i>
        <!-- <script src="js/sitechanger.js" charset="utf-8"></script> -->
      </span>
    </div>
  </div>
  <div class="bottom-left-sticky">Open Page Select</div>
  <script src="js/data.js" charset="utf-8"></script>
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

    <ul>
      <h4>Sections</h4>
      <li><a href="index.php">Home</a></li>
      <li><a href="studysites.php">Study Sites</a></li>
      <li><a href="data.php">Data</a></li>
      <li><a href="fieldguide.php">Field Guide</a></li>
    </ul>

    <ul>
      <h4>Other Links</h4>
      <li><a href="index.php#im2">File Downloads</a></li>
      <li><a href="fieldguide.php?p=/Endangered_Species">Endangered Species</a></li>
      <li><a href="fieldguide.php?p=/Indicator_Species">Indicator Species</a></li>
    </ul>

    <!-- <div id="contact-footer">
        <p><a>Contact Teachers</a></p>
        <p><a>Contact Development Team</a></p>
        <p><a>Want to make a change to the website?</a></p>
      </div> -->

    <ul>
      <h4>Contact</h4>
      <li><a href="">Contact Teachers</a></li>
      <li><a href="">Contact Development Team</a></li>
      <li><a href="">Want to make a change to the website?</a></li>
    </ul>
  </footer>

  <script>
    if (window.innerWidth <= 768) {
      window.addEventListener("load", stopAtFooter);
    }
  </script>
</body>

</html>