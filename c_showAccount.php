<?php

session_start();

if ($_SESSION["logue"] == false) {
    header("location:c_showLogin.php?new=&amp;login=in active");
    exit();
}

require_once 'model/fonctions.php';

require_once 'views/v_account.php';
