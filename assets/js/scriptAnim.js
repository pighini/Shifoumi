  // Définition des variables globales
var canvas  = document.getElementById("game");
var ctx     = canvas.getContext("2d");

var posY = 100;

var MainGauche = new Image();
var MainDroite = new Image();
var MainMoveG = new Image();
var MainMoveD = new Image();

var timer = setInterval(Display, 10);

function Anim(optionGauche, optionDroite) {

  var directory = "assets/images/";
  var type = ".png";

  MainGauche.src = directory.concat(optionGauche.concat(type));
  MainDroite.src = directory.concat(optionDroite.concat(type));
  MainMoveG.src = directory.concat("move".concat(type));
  MainMoveD.src = directory.concat("move".concat(type));


}

var handLeft = Hand(20, 10, 1, MainMoveG);
var handRight = Hand(20, 240, 1, MainMoveD);
var cpt = 0;

function Display(){
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  handLeft.deplacer();
  handLeft.displayImg();

  handRight.deplacer();
  handRight.displayImg();

  if (cpt >= 50) {
    handLeft.vy = -handLeft.vy
    handRight.vy = -handRight.vy;
    cpt=0;
  }
  cpt++;
}


function Hand(apy, apx, avy, aimg){
	var sprite = {
		 py: apy,
     px: apx,
		 vy: avy,
	   img : aimg,

		deplacer:function(){
	     	    this.py += this.vy;
			},

			displayImg:function(){
				ctx.drawImage(this.img, this.px, this.py)
			},
	}
	return sprite
}
