<?php

session_start();

if (!isset($_SESSION["logue"])) {
    $_SESSION["logue"] = false;
}

require_once 'model/fonctions.php';
$usersList = getBestUsers();

$betAmount = $_SESSION["betAmount"];
$benefit = $betAmount * 2;

if (filter_has_var(INPUT_POST, "plus")) {
    $_SESSION["betAmount"] = $_SESSION["betAmount"] + 50;
}

if (filter_has_var(INPUT_POST, "minus")) {
    $_SESSION["betAmount"] = $_SESSION["betAmount"] - 50;
}

require_once 'views/v_index.php';
?>
