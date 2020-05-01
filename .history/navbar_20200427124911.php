<?php
$page = $_SESSION['page'];
$homestyle = '';
$homeDis = '';
if ($page == 'home') {
  $homestyle = 'background-color: rgba(255, 0, 0, 0); box-shadow:0px 0px 0px';
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
        </div>
        <div class='navbar-item' id='data'>
          <a href='data.php'>Data</a>
        </div>
        <div class='navbar-item' id='field-guide'>
          <a href='fieldguide.php'>Field Guide</a>
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
      if ($page!='home') {
        print "
        var cHeight = parseInt(window.getComputedStyle(document.getElementById('navbar')).getPropertyValue('height'));
        document.body.style.marginTop=cHeight+'px';
        console.log(document.body.style.marginTop);"
        
      }
    }
    window.addEventListener('load', configureNav);
    window.addEventListener('resize', configureNav);
    </script>

    <script src='js/navbar-mobile.js'></script>
  
