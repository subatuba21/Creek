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

      if (restext['images'].length==0) {
        document.getElementById('siteheader').innerText = 'Site ' + site;
        document.getElementById('sitetext').innerText = restext['text'];
        document.getElementById('siteimages').innerHTML = "";
      }
      
      else {

        restext['images'].forEach(function (element) {
          document.getElementById('siteimages').innerHTML = element + document.getElementById('siteimages').innerHTML;
        });

        document.getElementById('siteimages').firstElementChild.onload = function () {
          var savedChildren=[];

          for (var child of document.getElementById('siteimages').children) {
            if (child.style.display==="none") {
              savedChildren.push(child);
            } 
          }

          document.getElementById('siteimages').innerHTML="";

          for (var child of savedChildren) {
            document.getElementById('siteimages').appendChild(child);
          }

          document.getElementById('siteheader').innerText = 'Site ' + site;
          document.getElementById('sitetext').innerText = restext['text'];
          document.getElementById('siteimages').style.height = "auto";
          for (var child of document.getElementById('siteimages').children) {
            child.style.display="inline-block";
          }
        }
        newIms();
      }
      window.scrollTo(0, 0);
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

function goToSite(value) {
  var jsonu = {
    site: parseInt(value)
  }
  site=value;
  getsite.open("POST", "study-sites/siteprint.php", true);
  getsite.setRequestHeader("Content-Type", "application/json");
  getsite.send(JSON.stringify(jsonu));
}
