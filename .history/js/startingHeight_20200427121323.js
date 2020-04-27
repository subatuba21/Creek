function setStartingHeight(element) {
    var navbar = document.getElementById("navbar");
    function f () {
        var desiredHeight = parseInt(window.getComputedStyle(navbar).getPropertyValue("height")) + 30;
        var i=100;
        while (element.getBoundingClientRect().top < desiredHeight && i>1) {
            console.log(element.getBoundingClientRect().top);
            element.style.marginTop = parseInt(element.style.marginTop) + 1 + "px";
            i--;
        };
    }
    window.addEventListener("load", f);
    window.addEventListener("resize", f);
}

