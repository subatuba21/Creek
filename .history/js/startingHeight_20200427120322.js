function setStartingHeight(element) {
    var navbar = document.getElementById("navbar");
    var desiredHeight = parseInt(window.getComputedStyle(navbar).getPropertyValue(navbar))+30;
    while (element.getBoundingClientRect().top < desiredHeight) {
        element.style.marginTop+=1
    };
}

