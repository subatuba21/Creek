<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- suitable for mobile devices-->
  <title>Home</title>
  <link rel="stylesheet" href="creek.css">
  <script src="node_modules/@webcomponents/webcomponentsjs/webcomponents-bundle.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css">
  <script src="js/gallery.js" charset="utf-8"></script>
  <script src="node_modules/body-scroll-lock/lib/bodyScrollLock.js" charset="utf-8"></script>
  <style>
    .nav-transition-one {
      animation-name: nav-one;
      animation-duration: 0.4s;
      animation-fill-mode: forwards;
    }

    .nav-transition-two {
      animation-name: nav-two;
      animation-duration: 0.4s;
      animation-fill-mode: forwards;
    }

    #banner {
      width: 70%;
    }

    #hero {
      background-image: url('images/5.jpg');
      width: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: 120%;
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
      margin-bottom: 0px;
    }

    #heropic {
      object-fit: cover;
      width: 100%;
    }

    #herotext {
      background: rgba(220, 220, 220, 0.6);
      padding: 30px;
      border: 2px solid black;
      max-width: 50%;
    }

    #herotext p {
      font-family: 'Dosis', sans-serif;
      font-size: 18pt;
      color: black;
      text-align: center;
    }

    #maintext {
      margin: 0px;
      text-align: center;
      font-family: 'Dosis', sans-serif;
      font-size: 17.5pt;
      background-color: var(--body-color);
      width: 100%;
      padding-bottom: 20px;
      display: inline-block;
    }

    .mtgrid {
      display: grid;
      grid-template-columns: 15% 35% 35% 15%;
      grid-template-rows: 1fr 1fr;
      justify-content: center;
      align-content: center;
      grid-column-gap: 20px;
      grid-row-gap: 10px;
      padding-bottom: 20px;
    }

    #im1 {
      grid-area: 1/2/2/3;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #im2 {
      grid-area: 2/2/3/3;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .mtgrid img {
      width: 80%;
      object-fit: cover;
      border-radius: 3px;

    }

    #visit {
      text-align: center;
      margin-bottom: 2%;
    }

    #visit p {
      margin-left: 15%;
      margin-right: 15%;
      text-align: left;
    }

    #use {
      grid-area: 1/3/2/4;
      text-align: left;
    }

    #goal {
      grid-area: 2/3/3/4;
      text-align: left;
    }

    #panel {
      grid-area: 1/3/3/4;
      background: url(pics/rivpic.png);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }

    #about {
      width: 100%;
    }

    #about p {
      display: inline-block;
      width: 70%;
      margin-top: 2%;
      margin-bottom: 0px;
      text-align: left;
    }

    #filebar {
      display: inline-block;
      width: 73%;
      margin-top: 2%;
      margin-bottom: 2%;
      background-color: rgba(220, 220, 220, 0.6);
      border-radius: 4px;
      padding: .5%;
    }

    #filebar i {
      margin-left: 2%;
      margin-right: 2%;
      float: left;
      font-size: 30pt;
      clear: right;
      border-right: 2px solid black;
      padding-right: .9%;
    }

    #filebar li {
      list-style-type: none;
      margin-right: 2%;
      float: left;

    }

    #filebar li:hover {
      opacity: .6;
    }

    #filebar a {
      text-decoration: none;
      color: black;
    }

    #filebar ul {
      position: relative;
      top: -12px;
    }

    .not-hidden::after {
      content: "...";
    }

    #filebar span {
      display: none;
    }


    @media (max-width: 768px) {
      #banner {
        width: 95%;
      }

      #maintext {
        font-size: 14pt;
      }

      #herotext {
        max-width: 80%;
        background: rgba(220, 220, 220, 0.75);
      }

      #herotext p {
        font-size: 14pt;
      }

      #about p {
        width: 90%;
        margin-top: 2%;
      }

      #visit {
        text-align: center;
        margin-bottom: 2%;
        margin-left: 5%;
      }

      #visit p {
        margin-left: 0%;
        margin-right: 0%;
        text-align: left;
      }

      .mtgrid {
        display: block;
        width: 100%;
        text-align: center;
      }

      .mtgrid div {
        width: 90%;
      }

      #goal,
      #use {
        display: inline-block;
      }

      #im1,
      #im2 {
        margin-top: 20px;
      }

      #filebar i {
        border-right: 0px;
      }

      #filebar ul {
        display: none;
      }

      #filebar span {
        display: block;
        position: relative;
        top: 13px;
        float: right;
        margin-right: 10px;
        cursor: pointer;
      }

      .mobile-hidden {
        display: none;
      }
    }

    @media (min-width:768px) {
      #navbar:hover {
        animation-name: nav-one;
        animation-duration: 0.4s;
        animation-fill-mode: forwards;
      }

      #expandb-mobile {
        display: none;
      }
    }


    @keyframes nav-one {
      from {
        background-color: transparent;
        box-shadow: 0px 0px 0px;
      }

      to {
        background-color: var(--body-color);
        box-shadow: 0px 1px 10px;
      }
    }

    @keyframes nav-two {
      from {
        background-color: var(--body-color);
        box-shadow: 0px 1px 10px;
      }

      to {
        background-color: transparent;
        box-shadow: 0px 0px 0px;
      }
    }
  </style>
</head>

<body>
  <?php
  $_SESSION['page'] = "home";
  include 'navbar.php';
  ?>
  <script>
    var navbar = document.getElementById("navbar");

    var hover = 0;

    function firstHover() {
      console.log("hi");
      if (hover === 0 && navbar.classList.contains("nav-transition-one") == false && navbar.classList.contains("nav-transition-two") == false) {
        navbar.classList.add("nav-transition-two");
        navbar.removeEventListener("mouseover", firstHover);
      }
      hover++;
    }

    if (window.innerWidth > 768) {
      var hoverListen = navbar.addEventListener("mouseover", firstHover);
    }

    function changeColor(transparent) {
      if (transparent == false) {
        navbar.classList.add("nav-transition-one");
        navbar.classList.remove("nav-transition-two");
      } else if (transparent == true) {
        navbar.classList.add("nav-transition-two");
        navbar.classList.remove("nav-transition-one");
      }
    }

    var below = false;
    window.addEventListener('scroll', function() {
      var scrollpos = window.scrollY;
      if (scrollpos > (window.innerHeight * 1 / 12)) {
        below = true
        changeColor(false);
      } else if (scrollpos < (window.innerHeight * 1 / 12) && below == true) {
        changeColor(true);
        below = false;
      }
    })
  </script>
  <div id="hero">
    <!--<img id='heropic' src="pics/arroyo-del-valle.jpg" alt="">-->
    <script src="js/hero.js"></script>
    <script type="text/javascript">
      window.addEventListener("resize", resizeHero);
      window.addEventListener("load", resizeHero);
    </script>
    <image-gallery></image-gallery>
    <div id='herotext'>
      <h1>Arroyo Del Valle</h1>
      <p>Project Creek Watch, started in the Fall of 1994, is a long term scientific study of the Arroyo Del Valle "Creek" located in the city of Pleasanton, California. This project is sponsored & cooridinated by the Amador Valley High School Science Department which is part of the Pleasanton Unified School District. It was awarded the prestigious California Golden Bell Award for excellence in education in 1999.</p>
    </div>
  </div>
  <div id="maintext">
    <div id="about">
      <p class="not-hidden">The Arroyo Del Valle is a tributary branching from the Lake del Valle watershed. It winds its way through the town of Pleasanton. Pleasanton's Main Street passes over it and the historic Pleasanton Hotel sits along side the creek bank.
        What is now a creek used to be a significant tributary supporting a healthy steelhead population. Winter storms would create significant runoff and fill the Arroyo with enough water to allow fish to migrate inland to numerous spawning sites.
        As <span class="mobile-hidden">the city of Pleasanton continued to grow and housing sprang up along the banks of the Arroyo, erosion became a major concern. Concrete pilings and rip rock was deposited at vulnerable bends in the Arroyo to curb erosion. Formation of local reservoirs needed to recharge the valleys underground aquifer, and water diversion for industry and recreational use led to a significant reduction of water flow and a channel that would end up being dry throughout most of the summer. Due to Kaiser
          Industries quarry operations, located by the Shadow Cliffs reservoir, there is currently water flow throughout the entire year. Their mining operations involves pumping water from the quarry site into the Del Valle channel creating what the Arroyo has become today. Duing our research there have been three occasions where diversion of water into the channel was stopped to accomodate maintenance operations. This led to the creek completely drying up below the
          <span class="computer-hidden">
            Main Street Bridge and killing thousands of fish, amphibians, and countless numbers of aquatic insects. We have made efforts to insure that the company continues a supply of water so as to maintain the ecosystem that they have created. California Fish and Game have assisted us with this effort. For more about what we have observed, visit the Arroyo Field Guide, Arroyo Data Collection, or Arroyo Study Sites.
            The steelhead may be gone but the Arroyo still creates a wonderfull wetland habitat. Stoic trees, blue herons, belted kingfishers, large mouth black bass, blugill, racoons, and other interesting wildlife are still common in the Arroyo Del Valle.
            Many residents and local industry aren't aware of what the Arroyo once was and what is has the potential to become. It is for this reason that the Amador Valley High School Science Department has begun the Arroyo Del Valle Creek Watch Project. Our mission is to use the creek as an outdoor laboratory. While learning basic concepts in both life and physical sciences students will hopefully develop an appreciation for one of Pleasanton's remaining natural resources and perhaps help to establish a more stable ecosystem.</span>
        </span>
      </p>
    </div>
    <div class="expandb">
      <i class="mdi mdi-arrow-down-drop-circle"></i>
    </div>

    <script>
      var expandButton = document.querySelector(".expandb i");
      expandButton.onclick = function() {
        document.querySelector(".computer-hidden").style.display = "inline";
        document.querySelector("#about p").classList.remove("not-hidden")
        document.querySelector("#about p").style.marginBottom = "20px";
        if (window.innerWidth < 768) {
          document.querySelector(".mobile-hidden").style.display = "inline";
        }
        document.querySelector(".expandb").style.display = "none";
      }
    </script>

    <img src="images/banner2.jpg" alt="" id="banner">
    <div id="visit">
      <h2>Visiting the Creek</h2>
      <p>
        Visiting the creek site requires a short walk from Amador. We typically will get there and back in a single class period. While at the study site, Amador students assess water quality by collecting chemical measurements, capturing indicator species, and making qualitative observations regarding the abundance and distribution of flora and fauna. Grant money provided by the Amador Parent Teacher Student Association, Pleasanton Partners In Education and the Tri Valley Community Fund have enabled us to purchase the necessary tools to collect, store, and
        <span class="mobile-hidden">
          display what we have found. Significant changes have been observed over the years and fortunately most have been positive. Recently the city has followed our lead and began introducing native plant species accompanied by wire to protect the plants from deer and irrigation to sustain the young plants during the summer. We envision that one day the Arroyo Del Valle "creek" will be a place where members of the Pleasanton community will enjoy bringing their children to observe and appreciate an abundance of wildlife. We hope this web site will encourage you to visit the study area and become an active participant in the revitalization and beautification of this wonderful Pleasanton ecosystem. While there, if you see any Endangered Species or acquire information that may assist us in our research please e-mail ethiel@pleasanton.k12.ca.us.
        </span>
      </p>
    </div>
    <div class="expandb" id="expandb-mobile">
      <i class="mdi mdi-arrow-down-drop-circle"></i>
    </div>

    <script>
      function expandbMobile() {
        if (window.innerWidth < 768) {
          document.querySelector("#visit p").classList.add("not-hidden");
        }
      }

      expandbMobile();

      var expandButton = document.querySelector("#expandb-mobile");
      expandButton.onclick = function() {
        document.querySelector("#visit p").classList.remove("not-hidden");
        document.querySelector("#visit p").classList.remove("not-hidden");
        // document.querySelector("#visit p").style.marginBottom = "20px";
        document.querySelector("#visit .mobile-hidden").style.display = "inline";
        expandButton.style.display = "none";
      }
    </script>

    <div class="mtgrid">
      <div id="use">
        <h2>Using This Website</h2>
        Use the links in the navigation bar shown above to learn more about the Arroyo Del Valle, the Data that Amador students collect while at the study site, view images of some of the many organisms that can be found there, view images or take a virtual tour of the main study areas, enjoy some of the more beautiful images captured on camera, or marvel at some of the many research endeavors initiated by my students. The navigation bar is present on every page in the web site and should enable you to move in and around the site with ease.
      </div>
      <div id="im2">
        <img src="images/11.JPG" alt="">
      </div>
      <div id="goal">
        <h2>The Goal</h2>
        The goal of the project is to provide field experience opportunities for Amador science students while at the same time support efforts in transforming the "creek" channel into an environment that is respected, enjoyed, and maintained by the Pleasanton Community. The web site will hopefully act as inspiration to other organizations to initiate similar habitat reclamation projects and promote a heightened level of concern about the "Land Sea" connection. We all need to work together to reclaim all that has been overlooked or forgotten and stop the flow of toxics into our oceans. We must recognize that habitat protection and stable biologically diverse ecosystems must be a priority.
      </div>
      <div id="im1">
        <img src="images/4.jpg" alt="">
      </div>
    </div>
    <div id="filebar">
      <i class="mdi mdi-file-download-outline"></i>
      <ul>
        <li>
          <a href="">Map</a>
        </li>
        <li>
          <a href="">Satelite View</a>
        </li>
      </ul>

      <span>Display Files</span>

      <script>
        var displayFiles = document.querySelector("#filebar span");
        var fileDiv = document.createElement("div");
        var shadow = document.createElement("div");
        shadow.style.position = "fixed";
        shadow.style.top = "0px";
        shadow.style.left = "0px";
        window.addEventListener("resize", function() {
          shadow.style.height = window.innerHeight + "px";
          shadow.style.width = window.innerWidth + "px";
        });
        shadow.style.height = window.innerHeight + "px";
        shadow.style.width = window.innerWidth + "px";
        shadow.style.backgroundColor = "rgba(0,0,0,.7)";
        shadow.style.display = "none";
        shadow.style.zIndex = "5";
        shadow.style.alignItems = "center";
        shadow.style.justifyContent = "center";

        var close = document.createElement("i");
        close.classList.add("mdi");
        close.classList.add("mdi-close");
        close.style.position = "absolute";
        close.style.top = "5px";
        close.style.right = "5px";
        close.style.fontSize = "14pt";
        close.onclick = function() {
          shadow.style.display = "none";
          bodyScrollLock.enableBodyScroll(shadow);
        }

        fileDiv.innerHTML += "<h2 style='margin: 0px;'>Useful Files</h2>";
        fileDiv.style.backgroundColor = "white";
        fileDiv.style.width = "75%";
        fileDiv.style.padding = "5%";
        fileDiv.style.position = "relative";
        fileDiv.style.borderRadius = "5px";
        fileDiv.innerHTML += "<ul style='text-align: center; padding-left:0px; margin-top: 5px; list-style:none; font-family: \"Dosis\", \"sans-serif\"; font-size: 14pt'>" + document.querySelector("#filebar ul").innerHTML + "</ul>";

        fileDiv.appendChild(close);
        shadow.appendChild(fileDiv);
        document.body.appendChild(shadow);
        displayFiles.onclick = function() {
          // document.body.style.opacity=".1";
          shadow.style.display = "flex";
          bodyScrollLock.disableBodyScroll(shadow);
        }
      </script>




    </div>
  </div>
  <script src="js/expandb.js" charset="utf-8"></script>
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
</body>

</html>