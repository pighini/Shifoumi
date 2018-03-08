<?php

session_start();

if (!isset($_SESSION["logue"])) {
    $_SESSION["logue"] = false;
}

require_once 'model/fonctions.php';

$username = "";
$pwd = "";
$rePwd = "";
$email = "";
$errorMessage = "";

if (filter_has_var(INPUT_POST, 'submitLogin')) {
    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $pwd = filter_input(INPUT_POST, 'pwd');

    if (checkUserAuthentification($username, $pwd)) {
        $_SESSION['logue'] = true;
        header("location:index.php");
        exit;
    }
    $errorMessage = "Your username or your password is wrong !";
}

if (filter_has_var(INPUT_POST, 'submitNew')) {
  $username = trim(filter_input(INPUT_POST, 'usernameN', FILTER_SANITIZE_STRING));
  $email = trim(filter_input(INPUT_POST, 'emailN', FILTER_SANITIZE_STRING));
  $pwd = filter_input(INPUT_POST, 'pwdN');
  $rePwd = filter_input(INPUT_POST, 'rePwdN');

  if (empty($username)) {
    $errorMessage = "Your username can't be empty !";
  }
  if (empty($email)) {
    $errorMessage = "Your email can't be empty !";
  }else if (empty($errorMessage)) {
      addUser($username, $email, $rePwd, 500);
      
      header("location:c_showLogin.php");
      exit;
  }
  $errorMessage = "Your username or your password is wrong !";
}


require_once 'views/v_login.php';
?>
