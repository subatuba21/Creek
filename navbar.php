<?php
$page = $_SESSION['page'];
$homestyle = '';
$homeDis = '';
if ($page == 'home') {
  $homestyle = 'background-color: var(--grey); box-shadow:0px 0px 0px';
  $homeDis = 'display:none;';
}
print "
    <div id='navbar' style='$homestyle'>
      <div id='navbar-left'>
        <i class='mdi mdi-menu' id='menu'></i>
        <div class='navbar-item' id='home'>
          <a href='index.php'>Home</a>
        </div>
        <div class='navbar-item' id='study-sites'>
          <a href='studysites.php'>Study Sites</a>
          <div class='dropdown'>
            
            <a href='studysites.php?page=1'>Site 1</a>
            <a href='studysites.php?page=2'>Site 2</a>
            <a href='studysites.php?page=3'>Site 3</a>
            <a href='studysites.php?page=4'>Site 4</a>
            <a href='studysites.php?page=5'>Site 5</a>
            <a href='studysites.php?page=6'>Site 6</a>
            <a href='studysites.php?page=7'>Site 7</a>
            <a href='studysites.php?page=8'>Site 8</a>
            <a href='studysites.php?page=9'>Site 9</a>
            <a href='studysites.php?page=10'>Site 10</a>
            <a href='studysites.php?page=11'>Site 11</a>
            <a href='studysites.php?page=12'>Site 12</a>
            <a href='studysites.php?page=13'>Site 13</a>
            <a href='studysites.php?page=14'>Site 14</a>
          </div>
        </div>
        <script> 
          document.querySelector('#study-sites').onmouseover = function() {
            this.querySelector('.dropdown').style.display='inline-block';
          }
          document.querySelector('#study-sites').onmouseout = function() {
            this.querySelector('.dropdown').style.display='none';
          }
        </script>
        <div class='navbar-item' id='data'>
          <a href='data.php'>Data</a>
          <div class='dropdown'>
            
            <a href='data.php?page=conductivity'>Conductivity</a>
            <a href='data.php?page=turbidity'>Turbidity</a>
            <a href='data.php?page=temperature'>Temperature</a>
            <a href='data.php?page=depth'>Depth</a>
            <a href='data.php?page=phosphate levels'>Phosphate Levels</a>
            <a href='data.php?page=ph'>pH</a>
            <a href='data.php?page=nitrate'>Nitrate</a>
            <a href='data.php?page=plankton net'>Plankton Net</a>
            <a href='data.php?page=kick net'>Kick Net</a>
            <a href='data.php?page=seine net'>Seine Net</a>
            <a href='data.php?page=dip net'>Dip Net</a>
            <a href='data.php?page=succession'>Succession</a>
            <a href='data.php?page=sediments'>Sediments</a>
            <a href='data.php?page=clean up'>Clean Up</a>
          </div>
        </div>
        <script> 
          document.querySelector('#data').onmouseover = function() {
            this.querySelector('.dropdown').style.display='inline-block';
          }
          document.querySelector('#data').onmouseout = function() {
            this.querySelector('.dropdown').style.display='none';
          }
        </script>
        <div class='navbar-item' id='field-guide'>
          <a href='fieldguide.php'>Field Guide</a>
        </div>
        <div class='navbar-item' id='gallery' style='cursor: pointer'>
          <a style='cursor:pointer' onclick='gallery.open(document.querySelector(\"image-gallery\"), \"\")'>Open Gallery</a>
        </div>
        </div>

      <div id='navbar-right'>
        <div class='navbar-item'>
          <a href=''>Creekwatch</a>
        </div>
      </div>
    </div>

    <script>
    function configureNav() {
      document.getElementById('$page').classList.add('is-active');
      document.getElementById('$page').classList.remove('navbar-item');
      var leftwidth = document.getElementById('navbar-left').clientWidth;
      var height = document.getElementById('navbar-left').clientHeight;
      var rightwidth = document.getElementById('navbar-right').clientWidth;
      if (window.innerWidth>768){
        height = height.toString();
        height+='px';
        document.getElementById('navbar').style.maxHeight = height;
        height = document.getElementById('navbar').style.maxHeight;
      }
      else {
        document.getElementById('navbar-left').style.height = document.getElementById('navbar-right').clientHeight.toString() + 'px';
      }
";
if ($page != 'home') {
  print "
        var cHeight = parseInt(window.getComputedStyle(document.getElementById('navbar')).getPropertyValue('height'));
        document.body.style.marginTop=cHeight+'px';
        console.log(document.body.style.marginTop);";
}
print "
    }
    window.addEventListener('load', configureNav);
    window.addEventListener('resize', configureNav);
    </script>

    <script src='js/navbar-mobile.js'></script>
  ";
