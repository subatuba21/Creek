class pathmaker {
  constructor() {
    this.level=1;
    this.levels = new Map();
    this.levels.set(1, null);
    this.levels.set(2, null);
    this.levels.set(3, null);
    this.topLevel = 4;
    this.backCounter=0;
  }

  changePath(level, item) {
    this.levels.set(level, item);
    for (let i = level+1; i<=this.topLevel; i++) {
      this.levels.set(i, null);
    }
  }

  setPath(level, item) {
    this.levels.set(level, item);
  }

  getBackwardPath() {
    this.backCounter++;
    let i = 1;
    this.pathStr="";
    if (this.levels.get(i)==null) {
      this.backCounter--;
      return null;
    }

    for (i; i<=this.getTopLevel()-this.backCounter; i++) {
      this.pathStr += "/";
      this.pathStr += this.levels.get(i);
    }
    return this.pathStr;
  }

  getForwardPath() {

  }

  getCurrentPath () {
    let i = 1;
    this.pathStr="";
    if (this.levels.get(i)==null) {
      return "";
    }

    for (i; i<=this.getTopLevel()-this.backCounter; i++) {
      this.pathStr += "/";
      this.pathStr += this.levels.get(i);
    }
    return this.pathStr;
  }

  getPath () {
    this.levels.i = 1;
    this.pathStr="";
    while(this.levels.get(this.levels.i)!=null) {
      this.pathStr += "/";
      this.pathStr += this.levels.get(this.levels.i);
      this.levels.i++;
    }
    return this.pathStr;
  }

  setFullPath (path) {
    let pathArr =path.split("/");
    for (var i=0; i<pathArr.length; i++) {
      this.setPath(i, pathArr[i]);
    }
  }

  getTopLevel () {
    let topLevel = 0;
    while(this.levels.get(topLevel+1)!=null) {
      topLevel++;
    }
    //console.log(topLevel);
    return topLevel;
  }

}
