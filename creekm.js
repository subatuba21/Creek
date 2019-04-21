$(document).ready(function() {

  if (document.title=="Arroyo Del Valle") {
    var img = 1;
    var gallery = setInterval(function() {
      if (img==1) {
        $('#gallery').attr('src', 'ducks.jpeg');
        img=2;
      }
      else if (img==2) {
        $('#gallery').attr('src', 'owl.jpeg');
        img=3;
      }
      else if (img==3) {
        $('#gallery').attr('src', 'fox.jpg');
        img=4;
      }
      else if (img==4) {
        $('#gallery').attr('src', 'man.jpeg');
        img=5;
      }
      else if (img==5) {
        $('#gallery').attr('src', 'arroyo-del-valle.jpg');
        img=1;
      }
    }, 3000);

  }
});
