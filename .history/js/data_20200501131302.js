var clicked = true;

document.getElementById("sitechanger").addEventListener("click", function() {
  if (clicked) {
    document.getElementById("dropup-content").style.display = "none";
    clicked=false;
    bodyScrollLock.enableBodyScroll(document.getElementById("dropup-content"));
  } else {
    bodyScrollLock.disableBodyScroll(document.getElementById("dropup-content"));
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

setUpStickyElements();

