
if(window.innerWidth>768) {
  var viewporth = window.innerHeight;
  var height = document.getElementById('navbar').clientHeight;
  var dataheight = viewporth - height - 20;
  dataheight = dataheight.toString();
  dataheight += 'px';
  document.getElementById('datagrid').style.height = dataheight;
}

var buttons = document.getElementsByClassName("button");
for (let button of buttons) {
  button.addEventListener("click", () => {
    fetch(`data/${button.innerText.trim().toLowerCase()}.html`).then(function (html) {
      return html.text();
    }).then(function(text) {
      document.getElementById("displayarea").innerHTML = text;
    });
  });
  if (button.innerText.trim().toLowerCase()=="conductivity") {
    button.click();
  }
}
