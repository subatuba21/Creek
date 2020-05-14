
var menu = document.createElement("div");
menu.id = "navbar-mobile";
menu.style.width=window.innerWidth + "px";
menu.style.height=window.innerHeight + "px";
menu.style.position = "fixed";
menu.style.top = "0px";
menu.style.left = "0px";
menu.style.zIndex=1000;
menu.style.width="0px";
menu.close = function() {
  this.style.width = "0px";
}

menu.open = function () {
  this.style.width = window.innerWidth + "px";
  this.style.height = window.innerHeight + "px";
}

var crossIcon = document.createElement("i");
crossIcon.classList.add("mdi");
crossIcon.classList.add("mdi-close");
var pageHolder = document.createElement("div");

 pageHolder.style.width = window.innerWidth-40 + "px";
 pageHolder.style.display = "inline-block";
 pageHolder.innerHTML =
 "<a href='index.php'>Home</a>" +
"<a href='studysites.php'>Study Sites</a>" +
"<a href='data.php'>Data</a>" +
"<a href='fieldguide.php' onclick='gallery.open(\"\", document.querySelector(\"gallery\"))'>Field Guide</a>";

var currentPage = document.title.toLowerCase();
console.log(currentPage);


menu.appendChild(pageHolder);
menu.appendChild(crossIcon);
document.body.appendChild(menu);

pageHolder.style.top = (window.innerHeight - parseInt(window.getComputedStyle(pageHolder).getPropertyValue("height")))/2.75  + "px";
pageHolder.style.right = (window.innerWidth - parseInt(window.getComputedStyle(pageHolder).getPropertyValue("width")))/2 + "px";
pageHolder.style.position = "absolute";

crossIcon.addEventListener("click", function () {
  bodyScrollLock.enableBodyScroll(menu);
  menu.close();
});

document.getElementById('menu').addEventListener("click", function () {
  menu.open();
  bodyScrollLock.disableBodyScroll(menu);
});

for (var element of document.querySelectorAll("#navbar-mobile a")) {
  console.log(element.innerText);
  if (element.innerText.trim().toLowerCase()==currentPage) {
    element.style.fontWeight="600";
  }
}

window.addEventListener("resize", function () {
  pageHolder.style.top = (window.innerHeight - parseInt(window.getComputedStyle(pageHolder).getPropertyValue("height")))/2.75  + "px";
  pageHolder.style.right = (window.innerWidth - parseInt(window.getComputedStyle(pageHolder).getPropertyValue("width")))/2 + "px";
  pageHolder.style.position = "absolute";
});
