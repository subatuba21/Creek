viewporth = window.innerHeight;
var height = document.getElementById('navbar').clientHeight;
var heroheight = viewporth - height;
heroheight = heroheight.toString();
heroheight+='px';
document.getElementById('sitecont').style.height=heroheight;
