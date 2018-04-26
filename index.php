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
    $shapeL = chooseShape("L");
    $shapeR = chooseShape("R");
    $script = "<script type=\"text/javascript\">
      Anim('$shapeL', '$shapeR');
      </script>";
    $amount = trim(filter_input(INPUT_POST, "amount", FILTER_SANITIZE_NUMBER_INT));
    if (checkBalance($amount, $_SESSION['idUser'])) {
        $idBet = insertBet($amount, $_SESSION['idUser']);
        $winner = identifyWinner($shapeL, $shapeR);
        switch ($winner) {
            case 1:
                removeBetAmount($amount, $_SESSION['idUser']);
                giveReward($_SESSION['idUser'], $amount);
                updateWon($idBet, 1);
                break;
            case 2:
                removeBetAmount($amount, $_SESSION['idUser']);
                break;
            case 3:
                updateWon($idBet, 2);
                break;
            default:
                removeBetAmount($amount, $_SESSION['idUser']);
                break;
        }
    }

    unset($_POST['btnLeft']);
}

if (filter_has_var(INPUT_POST, 'btnRight')) {
    $shapeL = chooseShape("L");
    $shapeR = chooseShape("R");
    $script = "<script type=\"text/javascript\">
      Anim('$shapeL', '$shapeR');
      </script>";
    $amount = trim(filter_input(INPUT_POST, "amount", FILTER_SANITIZE_NUMBER_INT));
    if (checkBalance($amount, $_SESSION['idUser'])) {
        $idBet = insertBet($amount, $_SESSION['idUser']);
        $winner = identifyWinner($shapeL, $shapeR);
        switch ($winner) {
            case 2:
                removeBetAmount($amount, $_SESSION['idUser']);
                giveReward($_SESSION['idUser'], $amount);
                updateWon($idBet, 1);
                break;
            case 1:
                removeBetAmount($amount, $_SESSION['idUser']);
                break;
            case 3:
                updateWon($idBet, 2);
                break;
            default:
                removeBetAmount($amount, $_SESSION['idUser']);
                break;
        }
    }

    unset($_POST['btnRight']);
}

require_once 'views/v_index.php';
?>
