<?php

session_start();

if (!isset($_SESSION["logue"])) {
    $_SESSION["logue"] = false;
}

require_once 'model/fonctions.php';
$usersList = getBestUsers();

require_once 'views/v_index.php';
?>
