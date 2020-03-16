var getData = new XMLHttpRequest();
getData.onreadystatechange = function() {
  if (this.readyState==4 && this.status==200) {
    var datahtml = getData.responseText;
    document.getElementById('displayarea').innerHTML = datahtml;
  }
}
var viewporth = window.innerHeight;
var height = document.getElementById('navbar').clientHeight;
var dataheight = viewporth - height - 20;
dataheight = dataheight.toString();
dataheight+='px';
document.getElementById('datagrid').style.height=dataheight;
var items = document.getElementsByClassName("button");

function dataPrint(item) {
  getData.open("POST", "data/dataprint.php", true);
  getData.send(item);
}

for (let item of items) {
  item.addEventListener('click', function() {
    dataPrint(item.innerText.toLowerCase());
  })
}
