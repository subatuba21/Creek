function processUrl(Url, setHistory) {
  let url = new URL(Url);
  let extraPath = url.searchParams.get("p");
  let organism = url.searchParams.get("o");
  console.log(Url);
  if (extraPath) {
    pathMaker.setFullPath(extraPath);
    changeContent(extraPath, "", false, setHistory, function () {
      if (organism) {
        changeContent(extraPath, organism, false, setHistory);
      }
    });

  } else changeContent("", "", false, true);
}

let currentUrl = window.location.href;
processUrl(currentUrl, true);

window.onpopstate = function() {
  //alert("what");
  processUrl(window.location.href, false);
}
