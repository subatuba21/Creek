class gallery extends HTMLElement {

  constructor() {
    super();
    var icons=document.createElement("link");
    icons.rel="stylesheet";
    icons.href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css";
    var shadow=this.attachShadow({mode: "open"});
    shadow.appendChild(icons);
    var wrapper = document.createElement("div");
    wrapper.id="wrapper";
    var cont = document.createElement("div");
    cont.id="cont";
    var header = document.createElement("h2");
    header.innerText = "Gallery";
    cont.appendChild(header);
    var path = document.createElement("span");
    path.id="path";
    path.innerText=gallery.getpath();
    cont.appendChild(path);
    var closebutton = document.createElement("i");
    closebutton.id = "closebutton";
    closebutton.classList.add("mdi");
    closebutton.classList.add("mdi-close");
    var backbutton = document.createElement("i");
    backbutton.id = "backbutton";
    backbutton.classList.add("mdi");
    backbutton.classList.add("mdi-arrow-left");
    header.appendChild(closebutton);
    header.innerHTML = backbutton.outerHTML + header.innerHTML;
    var style = document.createElement("link");
    style.setAttribute("rel", "stylesheet");
    style.setAttribute("href", "gallery.css");
    var font = document.createElement("link");
    font.setAttribute("rel", "stylesheet");
    font.setAttribute("href", "https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800");
    shadow.appendChild(font);
    shadow.appendChild(style);
    wrapper.appendChild(cont);
    shadow.appendChild(wrapper);
    wrapper.style.height=window.innerHeight.toString() + "px";
    window.addEventListener("resize", function() {
      wrapper.style.height=window.innerHeight.toString() + "px";
    });
    this.shadowRoot.getElementById("closebutton").addEventListener("click", ()=>{
      console.log("l");
      wrapper.style.display="none";
    });
    this.shadowRoot.getElementById("backbutton").addEventListener("click", () => {
      let path = gallery.getpath();
      let lastind = path.lastIndexOf("/");
      if (lastind===-1) {
        return;
      }
      else {
        let home = path.indexOf("Home/")
        gallery.setpath(path.substring(home+4, lastind));
        console.log(gallery.getpath());
        gallery.setview(gallery.getpath(), this);
      }
    });
    gallery.setview("", this);
  }

  static setview(path, object) {
    var oldObjects = object.shadowRoot.getElementById("cont").querySelectorAll(".item");
    gallery.setpath(`Home${path}`);
    if (object.shadowRoot.getElementById("main-image-div")!=null) {
      object.shadowRoot.getElementById("main-image-div").remove();
    }
    if (object.shadowRoot.getElementById("viewed-image-current")!=null) {
      object.shadowRoot.getElementById("viewed-image-current").remove();
    }
    object.shadowRoot.getElementById("path").innerText = gallery.getpath();
    for (let item of oldObjects) {
      item.remove();
    }
    var str = "";
    var imgfile = /\.(gif|jpg|jpeg|tiff|png)$/i;
    path=path.replace(/ /g, "_");
    if (path.substring(path.lastIndexOf("/")+1).search(imgfile)!=-1) {
      var currentIm = document.createElement("img");
      currentIm.id="viewed-image-current";
      currentIm.src="images/" + path;
      let num=50;
      if (window.innerWidth<768) {
        currentIm.style.width = "95%";
        currentIm.style.marginLeft = "0%";
        currentIm.style.marginTop = "10%";
      }
      else {
        currentIm.style.height = (parseInt(object.shadowRoot.getElementById("cont").offsetHeight)-50-parseInt(object.shadowRoot.querySelector("h2").offsetHeight)-parseInt(object.shadowRoot.querySelector("span").offsetHeight)).toString() + "px";
      }
      object.shadowRoot.getElementById("cont").appendChild(currentIm);
    }
    else {
      fetch(`images${path}/flds.txt`, {
        method: 'POST'
      }).then(response => {
        if (response.status==404) {
          throw new Error("No Files");
        }
        return response.text();
      }).then(text => {
        this.currentView = text.trim().split(",");
        for (let item of this.currentView) {
          let element = document.createElement("span");
          let tempi = document.createElement("i");
          tempi.classList.add("mdi");
          tempi.classList.add("mdi-folder");
          element.classList.add("item");
          element.appendChild(tempi);
          let tempspan = document.createElement("span");
          tempspan.innerText=item;
          element.appendChild(tempspan);
          element.setAttribute("data-path", path+`/${item}`);
          element.addEventListener("click", function() {
            gallery.setview(this.getAttribute("data-path"), object);
          });
          object.shadowRoot.getElementById("cont").appendChild(element);
        }
      }).catch( e=> {
        console.log(e.message);
      }).then(function() {

        fetch(`images${path}/imgs.txt`, {
          method: 'POST'
        }).then(response => {
          if (response.status==404) {
            throw new Error("No Images");
          }
          return response.text();
        }).then(text => {
          gallery.currentView = text.trim().split(",");
          var mainimgdiv = document.createElement("div");
          mainimgdiv.id = "main-image-div";
          for (let item of gallery.currentView) {
            let maindiv = document.createElement("div");
            maindiv.classList.add("image-item-wrapper");
            let image = document.createElement("img");
            let element = document.createElement("span");
            element.innerText=item;
            maindiv.setAttribute("data-path", path+`/${item}`);
            image.src = "images" + maindiv.getAttribute("data-path");
            maindiv.addEventListener("click", function() {
              gallery.setview(this.getAttribute("data-path"), object);
            });
            maindiv.appendChild(image);
            maindiv.appendChild(element);
            mainimgdiv.appendChild(maindiv);
          }
          object.shadowRoot.getElementById("cont").appendChild(mainimgdiv);
          for (let div of object.shadowRoot.querySelectorAll(".image-item-wrapper img")) {
            div.style.height = parseInt(window.getComputedStyle(div).getPropertyValue("width"))*3/4 + "px";
          }
        }).catch(e=> {
          console.log(e);
        });

      });
    }
  }

  static open(element, path) {
    element.shadowRoot.getElementById("wrapper").style.display = "block";
    this.setview(path, element);
  }

  static getpath() {
    if (this._path==null) {
      gallery.setpath("Home");
    }
    return this._path;
  }

  static setpath(pathway) {
    pathway=pathway.replace(/_/g, " ");
    this._path = pathway;
  }
}

customElements.define('image-gallery', gallery);

window.addEventListener("load", function() {
  newIms();
});

function newIms() {

  for (let image of document.getElementsByTagName("img")) {
    if(image.classList.contains("gallery-exception")==false) {
      console.log("hi");
      image.addEventListener("click", ()=> {
        let temp = document.querySelector("image-gallery");
        gallery.open(temp, image.src.substring(image.src.indexOf("/images")+7));
      });
    }
  }
  
}
