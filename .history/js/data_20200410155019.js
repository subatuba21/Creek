var clicked = true;

document.getElementById("sitechanger").addEventListener("click", function() {
  if (clicked) {
    document.getElementById("dropup-content").style.display = "none";
    clicked=false;
  } else {
    document.getElementById("dropup-content").style.display = "block";
    clicked=true;
  }
});

var buttons = document.querySelectorAll("#dropup-content div");
for (let button of buttons) {
  button.addEventListener("click", () => {
    fetch(`data/${button.innerText.trim().toLowerCase()}.html`).then(function(html) {
      return html.text();
    }).then(function(text) {
      document.getElementById("displayarea").innerHTML = text;
      if (window.innerWidth <= 768) {
        stopAtFooter();
      }
    });
  });
  if (button.innerText.trim().toLowerCase() == "conductivity") {
    button.click();
  }
}

var buttons = document.getElementsByClassName("button");
for (let button of buttons) {
  button.addEventListener("click", () => {
    fetch(`data/${button.innerText.trim().toLowerCase()}.html`).then(function(html) {
      return html.text();
    }).then(function(text) {
      document.getElementById("displayarea").innerHTML = text;
    });
  });
  if (button.innerText.trim().toLowerCase() == "conductivity") {
    button.click();
  }
}

function adjustElements() {
  if (window.innerWidth > 768) {
    var viewporth = window.innerHeight;
    var height = document.getElementById('navbar').clientHeight;
    var dataheight = viewporth - height - 20;
    dataheight = dataheight.toString();
    dataheight += 'px';
    document.getElementById('datagrid').style.height = dataheight;
  }
}

setUpStickyElements();

adjustElements();
window.addEventListener("resize", adjustElements);
