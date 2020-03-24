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

if (window.innerWidth<=768) {
  var sticky = document.querySelector(".bottom-left-sticky");
  var stickyHeight = window.getComputedStyle(sticky).getPropertyValue("height");

  var navbarBottom = document.getElementById("navbar-bottom");
  var navHeight = window.getComputedStyle(navbarBottom).getPropertyValue("height");
  navbarBottom.style.opacity = "0";
  navbarBottom.style.display = "none";
  fixedUntilHeight(navbarBottom, 1000, navHeight);
  fixedUntilHeight(sticky, 1000, stickyHeight);
  sticky.style.opacity = "1";

  document.querySelector(".mdi-eye-off-outline").addEventListener("click", function () {
    fadeIn(sticky);
    fadeOut(navbarBottom);
    window.scrollTo(window.scrollX, window.scrollY - 1);
    window.scrollTo(window.scrollX, window.scrollY + 1);

  });

  sticky.addEventListener("click", function () {
    fadeOut(sticky);
    fadeIn(navbarBottom);
    window.scrollTo(window.scrollX, window.scrollY - 1);
    window.scrollTo(window.scrollX, window.scrollY + 1);
  });

}

adjustElements();
window.addEventListener("resize", adjustElements);
