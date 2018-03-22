<?php

session_start();

if ($_SESSION["logue"] == false) {
    header("location:c_showAccueil.php");
} else {
    $_SESSION["logue"];
}

require_once 'model/fonctions.php';

require_once 'views/v_profile.php';
