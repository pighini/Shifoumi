<?php

session_start();

if (!isset($_SESSION["logue"])) {
    $_SESSION["logue"] = false;
}

/*$usersList = getUsers();*/

require_once 'model/fonctions.php';


require_once 'views/v_index.php';
?>
