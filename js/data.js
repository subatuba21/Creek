viewporth = window.innerHeight;
var height = document.getElementById('navbar').clientHeight;
var dataheight = viewporth - height;
dataheight = dataheight.toString();
dataheight+='px';
document.getElementById('datagrid').style.height=dataheight;
