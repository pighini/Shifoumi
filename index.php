<?php

session_start();

if (!isset($_SESSION["logue"])) {
    $_SESSION["logue"] = false;
}

require_once 'model/fonctions.php';
$usersList = getBestUsers();

//$betAmount = $_SESSION["betAmount"];
//$benefit = $betAmount * 2;
$script = "";
//$amount = 0;
if (filter_has_var(INPUT_POST, 'btnLeft')) {
    //$amount = $_POST['quant[1]'];
    //$idUser = $_SESSION['idUser'];
    $script = '<script type="text/javascript">
    Anim();
    </script>';
    //$shapeL = chooseShape('L');
    //insertBet($amount, $idUser);
    unset($_POST['btnLeft']);
}

if (filter_has_var(INPUT_POST, 'btnRight')) {
    $script = '<script type="text/javascript">
    Anim();
    </script>';
    unset($_POST['btnRight']);
}

require_once 'views/v_index.php';
?>
