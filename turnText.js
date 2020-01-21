var fs = require("fs");
var readline = require("readline");
var r1 = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

r1.question("Path: ", function(path) {
  var file = fs.readFileSync(path, "utf-8");
  convertFile(file);
});

function convertFile(html) {
  html = html.replace(/<style([\s\S]*?)<\/style>/gi, '');
  html = html.replace(/<script([\s\S]*?)<\/script>/gi, '');
  html = html.replace(/<\/div>/ig, '\n');
  html = html.replace(/<\/li>/ig, '\n');
  html = html.replace(/<li>/ig, '  *  ');
  html = html.replace(/<\/ul>/ig, '\n');
  html = html.replace(/<\/p>/ig, '\n');
  html = html.replace(/<br\s*[\/]?>/gi, "\n");
  html = html.replace(/<[^>]+>/ig, '');
  return html;
}
