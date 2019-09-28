<?php
  $page = $_SESSION['page'];
  print "
    <div id='navbar'>
      <div id='navbar-left'>
        <div class='navbar-item' id='home'>
          <a href='index.php'>Home</a>
        </div>
        <div class='navbar-item' id='study-sites'>
          <a href='studysites.php'>Study Sites</a>
        </div>
        <div class='navbar-item' id='data'>
          <a href='data.php'>Data</a>
        </div>
        <div class='navbar-item' id='field-guide'>
          <a href='fieldguide.php'>Field Guide</a>
        </div>
        </div>
      <div id='logo'> <!--logo-->
          <img id='logoimg' src=''>
      </div>
      <div id='navbar-right'>
      </div>
    </div>
    <div id='placeholder'>

    </div>


    <script>
      document.getElementById('$page').classList.add('is-active');
      document.getElementById('$page').classList.remove('navbar-item');
      var leftwidth = document.getElementById('navbar-left').clientWidth;
      var height = document.getElementById('navbar-left').clientHeight;
      var rightwidth = document.getElementById('navbar-right').clientWidth;
      if (leftwidth>rightwidth) {
        leftwidth = leftwidth.toString();
        leftwidth += 'px';
        document.getElementById('navbar-right').style.width = leftwidth;
      }
      else {
        rightwidth = rightwidth.toString();
        rightwidth += 'px';
        document.getElementById('navbar-left').style.width = rightwidth;
      }
      height = height.toString();
      height+='px';
      document.getElementById('logoimg').style.maxHeight = height;
      document.getElementById('navbar').style.maxHeight = height;
      height = document.getElementById('navbar').style.maxHeight;
      document.getElementById('placeholder').style.height = height;
    </script>
  ";


?>
