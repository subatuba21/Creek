var getsite = new XMLHttpRequest();
var site;
getsite.onreadystatechange = function() {
  if (this.readyState==4 && this.status==200) {
    var restext = getsite.responseText;
    var restext = JSON.parse(restext);
    if (restext=="0") {
      alert("That is not a valid study site.");
    }
    else {
      document.getElementById('siteheader').innerText = 'Site ' + site;
      document.getElementById('sitetext').innerText = restext['text'];
      document.getElementById('siteimages').innerHTML = "";
      restext['images'].forEach(function(element) {
        document.getElementById('siteimages').innerHTML += element;
    });
  }
  }
};

document.getElementById('sitechanger').addEventListener("keydown", event => {
  if (event.keyCode === 13) {
    site = document.getElementById('sitechanger').value.toString();
    var jsonu = {
      site: site
    };

    getsite.open("POST", "study-sites/siteprint.php", true);
    getsite.setRequestHeader("Content-Type", "application/json");
    getsite.send(JSON.stringify(jsonu));
  }
}

);
