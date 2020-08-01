function route() {
    var page = new URLSearchParams(window.location.search).get("page");
    if (page == null) return;
    var numbers = [];
    for (var i=1; i<=14; i++) {
        numbers.push(i+"");
    }
    if (document.title==="Study Sites" && numbers.includes(page)) {
        goToSite(page);
    }
}
route();