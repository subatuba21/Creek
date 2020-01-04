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
      newIms();
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

document.getElementById("arrow-go").addEventListener("click", function() {
  site = document.getElementById('sitechanger').value.toString();
  var jsonu = {
    site: site
  };

  getsite.open("POST", "study-sites/siteprint.php", true);
  getsite.setRequestHeader("Content-Type", "application/json");
  getsite.send(JSON.stringify(jsonu));
});

document.getElementById("arrow-left").addEventListener("click", function() {
  site = document.getElementById('siteheader').innerText;
  site = site.trim();
  site = site.substring(site.length-2, site.length);
  site = site.trim();
  site = parseInt(site);
  site--;
  site = site.toString();
  var jsonu = {
    site: site
  };

  getsite.open("POST", "study-sites/siteprint.php", true);
  getsite.setRequestHeader("Content-Type", "application/json");
  getsite.send(JSON.stringify(jsonu));
});

document.getElementById("arrow-right").addEventListener("click", function() {
  site = document.getElementById('siteheader').innerText;
  site = site.trim();
  site = site.substring(site.length-2, site.length);
  site = site.trim();
  site = parseInt(site);
  site++;
  site = site.toString();
  var jsonu = {
    site: site
  };

  getsite.open("POST", "study-sites/siteprint.php", true);
  getsite.setRequestHeader("Content-Type", "application/json");
  getsite.send(JSON.stringify(jsonu));
});
