<?php

session_start();

if (!isset($_SESSION["logue"])) {
    $_SESSION["logue"] = false;
}

require_once 'model/fonctions.php';

$username = "";
$usernameN = "";
$pwd = "";
$rePwd = "";
$email = "";
$messageL = "";
$messageN = "";
$new = (!empty($_GET["new"])) ? $_GET["new"] : "";
$login = (!empty($_GET["login"])) ? $_GET["login"] : "";
$alertStyle = "danger";

if (filter_has_var(INPUT_POST, 'submitLogin')) {
    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $pwd = filter_input(INPUT_POST, 'pwd');
    $new = "";
    $login = "in active";

    if (checkUserAuthentification($username, $pwd)) {
        $_SESSION['logue'] = true;
        header("location:index.php");
        exit;
    }
    $messageL = "Your username or your password is wrong !";
}

if (filter_has_var(INPUT_POST, 'submitNew')) {
    $usernameN = trim(filter_input(INPUT_POST, 'usernameN', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'emailN', FILTER_SANITIZE_STRING));
    $pwd = filter_input(INPUT_POST, 'pwdN');
    $rePwd = filter_input(INPUT_POST, 'rePwdN');
    $new = "in active";
    $login = "";
    if (empty($usernameN)) {
        $messageN = "Your username can't be empty !";
    }
    if (empty($email)) {
        $messageN = "Your email can't be empty !";
    }
    if ($pwd != $rePwd) {
        $messageN = "The passwords don't match !";
    } else if (empty($messageN)) {
        addUser($usernameN, $email, $rePwd, 500);
        $messageL = "Your account has been created.";
        $alertStyle = "success";
        $new = "";
        $login = "in active";
    } else {
        $messageN = "Your account can't be created !";
    }
}


require_once 'views/v_login.php';
?>
