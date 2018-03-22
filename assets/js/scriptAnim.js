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

//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 50).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }
            $("#plus").attr('disabled', false);

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 50).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);               
            }
            $("#minus").attr('disabled', false);
        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });