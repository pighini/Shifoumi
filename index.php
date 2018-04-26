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
    $shapeL = chooseShape("L");
    $shapeR = chooseShape("R");
    $script = "<script type=\"text/javascript\">
      Anim('$shapeL', '$shapeR');
      </script>";
    $amount = trim(filter_input(INPUT_POST, "amount", FILTER_SANITIZE_NUMBER_INT));
    if (checkBalance($amount, $_SESSION['idUser'])) {
        insertBet($amount, $_SESSION['idUser']);
    }

    unset($_POST['btnLeft']);
}

if (filter_has_var(INPUT_POST, 'btnRight')) {
    $shapeL = chooseShape("L");
    $shapeR = chooseShape("R");
    $script = "<script type=\"text/javascript\">
      Anim('$shapeL', '$shapeR');
      </script>";
    unset($_POST['btnRight']);
}

require_once 'views/v_index.php';
?>
