function setStartingHeight(element) {
    var navbar = document.getElementById("navbar");
    function f () {
        var desiredHeight = parseInt(window.getComputedStyle(navbar).getPropertyValue(navbar)) + 30;
        while (element.getBoundingClientRect().top < desiredHeight) {
            element.style.marginTop = parseInt(element.style.marginTop) + 1 + "px";
        };
    }
    window.addEventListener("load", f);
    window.addEventListener("resize", f);
}

