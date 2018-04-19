<?php

session_start();

if ($_SESSION["logue"] == false) {
    header("location:c_showLogin.php?new=&amp;login=in active");
    exit();
}

require_once 'model/fonctions.php';

$oldEmail = $_SESSION["email"];
$oldUsername = $_SESSION["username"];
$type = "danger";

if (filter_has_var(INPUT_POST, "submit")) {
    $newUsername = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
    $newEmail = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));

    $pwd = $_POST['pwd'];
    $newPwd = $_POST['Npwd'];
    $reNewPwd = $_POST['NrePwd'];

    if ($oldEmail != $newEmail) {
        if (!empty($newEmail)) {
            if ($pwd == $_SESSION['pwd']) {
                updateEmail($email, $_SESSION["username"]);
                $_SESSION['email'] = $newEmail;
                $message = "Your changes have been applied !";
                $type = "success";
            } else {
                $message = "Your password is wrong !";
                $type = "danger";
            }
        }
    }
    if ($oldUsername != $newUsername) {
        if (!empty($newUsername) && !usernameAvailable($newUsername)) {
            if ($pwd == $_SESSION['pwd']) {
                updatePseudo($newUsername, $_SESSION["username"]);
                $_SESSION['username'] = $newUsername;
                $message = "Your changes have been applied !";
                $type = "success";
            } else {
                $message = "Your password is wrong !";
                $type = "danger";
            }
        }else{
             $message = "You can't use this username !";
        }
    }
    if (!empty($newPwd)) {
        if ($newPwd != $reNewPwd) {
            $message = "The passwords don't match !";
            $type = "danger";
        } else {
            if ($pwd == $_SESSION['pwd']) {
                updatePassword($reNewPwd, $_SESSION["username"]);
                $_SESSION['pwd'] = $newPwd;
                $message = "Your changes have been applied !";
                $type = "success";
            } else {
                $message = "Your password is wrong !";
                $type = "danger";
            }
        }
    }
}

require_once 'views/v_account.php';
