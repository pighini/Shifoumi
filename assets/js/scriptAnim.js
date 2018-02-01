

function Anim(optionGauche, optionDroite) {
  // Définition des variables globales
  var canvas  = document.getElementById("game");
  var ctx     = canvas.getContext("2d");

  var directory = "assets/images/";
  var type = ".png";

  var MainGauche = new Image();
  MainGauche.src = directory.concat(optionGauche.concat(type));


  var MainDroite = new Image();
  MainDroite.src = directory.concat(optionDroite.concat(type));

  var MainMoveG = new Image();
  MainMoveG.src = directory.concat("move".concat(type));

  var MainMoveD = new Image();
  MainMoveD.src = directory.concat("move".concat(type));

   var id = setInterval(down, 10);
   var cpt = 0;
   var posY = 100;

   function down() {
   ctx.clearRect(20, posY, 50, 50);
   ctx.clearRect(330, posY, 50, 50);

   posY = posY + 1;

   ctx.drawImage(MainMoveD, 20, posY);
   ctx.drawImage(MainMoveG, 330, posY);

   if (cpt >= 50) {
     clearInterval(id);
   }
   else
   {
     cpt++;
   }
 }

 var id = setInterval(frame, 10);

}
