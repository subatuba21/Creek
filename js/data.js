var getData = new XMLHttpRequest();
getData.onreadystatechange = function() {
  if (this.readyState==4 && this.status==200) {
    var datahtml = getData.responseText;
    document.getElementById('displayarea').innerHTML = datahtml;
  }
}
viewporth = window.innerHeight;
var height = document.getElementById('navbar').clientHeight;
var dataheight = viewporth - height;
dataheight = dataheight.toString();
dataheight+='px';
document.getElementById('datagrid').style.height=dataheight;

function conductivity(item) {
  getData.open("POST", "data/dataprint.php", true);
  getData.send(item);
}
