function setStartingHeight(element) {
    var navbar = document.getElementById("navbar");
    function f () {
        var desiredHeight = parseInt(window.getComputedStyle(navbar).getPropertyValue("height")) + 30;
        while (element.getBoundingClientRect().top < desiredHeight) {
            console.log(element.getBoundingClientRect().top);
            element.style.marginTop = parseInt(element.style.marginTop) + 1 + "px";
            
        };
    }
    window.addEventListener("load", f);
    window.addEventListener("resize", f);
}

