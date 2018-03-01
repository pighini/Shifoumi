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


  var posY = 100;
    
    

   function down() {
   ctx.clearRect(20, posY, 50, 50);
   ctx.clearRect(330, posY, 50, 50);

   posY = posY + 1;

   ctx.drawImage(MainMoveD, 20, posY);
   ctx.drawImage(MainMoveG, 330, posY);

 }
    
 function up() {
   ctx.clearRect(20, posY, 50, 50);
   ctx.clearRect(330, posY, 50, 50);

   posY = posY - 1;

   ctx.drawImage(MainMoveD, 20, posY);
   ctx.drawImage(MainMoveG, 330, posY);
    
}
    
for (var iter = 0; iter < 3; iter++) 
{
    for (var cpt1 = 0, cpt1 < 50; cpt1++)
    {
        down();
    }
    for (var cpt2 = 0, cpt2< 50; cpt2++)
    {
        up();
    }  
} 
