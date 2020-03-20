function fadeOut (element) {
  let timer = setInterval(function () {
    console.log("fading out");
    if (parseFloat(element.style.opacity)<=0) {
      element.style.display="none";
      clearInterval(timer);
    }
    let newOpacity = parseFloat(element.style.opacity)-.02;
    console.log(newOpacity);

    element.style.opacity = newOpacity.toString();
    console.log(sticky.style.opacity);
  }, 7);
}

function fadeIn (element) {
  element.style.display="block";
  let timer = setInterval(function () {
    console.log("fading in");
    if (parseFloat(element.style.opacity)>=1) {
      clearInterval(timer);
    }
    let newOpacity = parseFloat(element.style.opacity)+.02;
    console.log(newOpacity);

    element.style.opacity = newOpacity.toString();
    console.log(sticky.style.opacity);
  }, 7);
}



function fixedUntilHeight (element, height, elementHeight) {
  let rect;
  let top;
  window.addEventListener("scroll", function () {
    rect = element.getBoundingClientRect();
    if (element.style.position=="absolute") {
      top = window.scrollY + window.innerHeight - parseInt(window.getComputedStyle(element).getPropertyValue("bottom")) - parseInt(window.getComputedStyle(element).getPropertyValue("height"));
    }
    else {
      top = parseInt(rect.top) + window.scrollY;
    }
    if (top>=height) {
      element.style.position="absolute";
      element.style.top = height + "px";
      if (elementHeight) {
        element.style.height=elementHeight;
      }
    }
    else {
      element.style.position = "fixed";
      element.style.top = "";
    }
  });
}
