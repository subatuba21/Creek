function fadeOut(element) {
  let timer = setInterval(function () {
    console.log("fading out");
    if (parseFloat(element.style.opacity) <= 0) {
      element.style.display = "none";
      clearInterval(timer);
    }
    let newOpacity = parseFloat(element.style.opacity) - .02;
    console.log(newOpacity);

    element.style.opacity = newOpacity.toString();
  }, 7);
}

function fadeIn(element) {
  element.style.display = "block";
  let timer = setInterval(function () {
    console.log("fading in");
    if (parseFloat(element.style.opacity) >= 1) {
      clearInterval(timer);
    }
    let newOpacity = parseFloat(element.style.opacity) + .02;
    console.log(newOpacity);

    element.style.opacity = newOpacity.toString();
  }, 7);
}



function fixedUntilFooterHeight(element) {
  var rect;
  var top;
  var footer=document.querySelector("footer");

  function adjustSticky() {
    var elementHeight = window.getComputedStyle(element).getPropertyValue("height");
    var height = footer.offsetTop - 60;

    rect = element.getBoundingClientRect();
    if (element.style.position == "absolute") {
      top = window.scrollY + window.innerHeight - parseInt(window.getComputedStyle(element).getPropertyValue("bottom")) - parseInt(window.getComputedStyle(element).getPropertyValue("height"));
    }
    else {
      top = parseInt(rect.top) + window.scrollY;
    }
    if (top >= height) {
      element.style.position = "absolute";
      element.style.top = height + "px";
      if (elementHeight) {
        element.style.height = elementHeight;
      }
    }
    else {
      element.style.position = "fixed";
      element.style.top = "";
    }
  }

  window.addEventListener("scroll", adjustSticky);
  setInterval(adjustSticky, 50);
}

function setUpStickyElements() {
  window.addEventListener("load", () => {
    var sticky = document.querySelector(".bottom-left-sticky");
    var stickyHeight = window.getComputedStyle(sticky).getPropertyValue("height");

    var navbarBottom = document.getElementById("navbar-bottom");
    var navHeight = window.getComputedStyle(navbarBottom).getPropertyValue("height");

    navbarBottom.style.opacity = "0";
    navbarBottom.style.display = "none";
    sticky.style.opacity = "1";

    fixedUntilFooterHeight(navbarBottom);
    fixedUntilFooterHeight(sticky);

    document.querySelector(".mdi-eye-off-outline").addEventListener("click", function () {
      bodyScrollLock.enableBodyScroll(document.getElementById("dropup-content"));
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

  });
}
