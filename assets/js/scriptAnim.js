// Définition des variables globales
var canvas = document.getElementById("game");
var ctx = canvas.getContext("2d");
var btnL = document.getElementById("btnleft");
var btnR = document.getElementById("btnright");

var posY = 100;

var MainGauche = new Image();
var MainDroite = new Image();
var MainMoveG = new Image();
var MainMoveD = new Image();

var timer;
var handLeft;
var handRight;

function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max));
}

function Anim(optionGauche, optionDroite) {

    btnL.disabled = true;
    btnR.disabled = true;
    timer = setInterval(Display, 10);
    var imgNames = ['leaf', 'scissor', 'rock'];
    var imgNameL = imgNames[getRandomInt(imgNames.length)].concat("L");
    var imgNameR = imgNames[getRandomInt(imgNames.length)].concat("R");
    var directory = "assets/images/";
    var type = ".png";

    MainGauche.src = directory.concat(imgNameL.concat(type));
    MainDroite.src = directory.concat(imgNameR.concat(type));
    MainMoveG.src = directory.concat("rockL".concat(type));
    MainMoveD.src = directory.concat("rockR".concat(type));

    handLeft = Hand(20, 10, 1, MainMoveG);
    handRight = Hand(20, 240, 1, MainMoveD);
}


var cpt = 0;

function Display() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    if (cpt <= 325) {
        handLeft.deplacer();
        handLeft.displayImg();

        handRight.deplacer();
        handRight.displayImg();
    } else {
        clearInterval(timer);
        handLeft.changeImage(MainGauche);
        handRight.changeImage(MainDroite);
        handLeft.displayImg();
        handRight.displayImg();
        cpt = 0;
        document.getElementById("btnleft").disabled = false;
        document.getElementById("btnright").disabled = false;
    }


    if (cpt % 50 === 0 && cpt !== 0) {
        handLeft.vy = -handLeft.vy;
        handRight.vy = -handRight.vy;
    }


    cpt++;
}


function Hand(apy, apx, avy, aimg) {
    var sprite = {
        py: apy,
        px: apx,
        vy: avy,
        img: aimg,

        deplacer: function () {
            this.py += this.vy;
        },

        displayImg: function () {
            ctx.drawImage(this.img, this.px, this.py, 50, 50);
        },

        changeImage: function (option) {
            this.img = option;
        }
    }
    return sprite;
}
