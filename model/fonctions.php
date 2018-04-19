<?php

require_once 'dbConnection.php';

function usernameAvailable($username) {
    $db = myPdo();
    $request = $db->prepare("SELECT * FROM users WHERE username = :username");
    $request->execute(array('username' => $username));

    return ($request->rowCount() > 0);
}

function addUser($username, $emailUser, $pwd, $balanceUser) {
    $db = myPdo();
    $userN = $username;
    $email = $emailUser;
    $password = $pwd;
    $balance = $balanceUser;
    $request = $db->prepare("INSERT INTO users(username, email, password,  balance)
            VALUES(:userN , :email, :password, :balance)");
    $request->execute(array(
        'userN' => $userN,
        'password' => $password,
        'email' => $email,
        'balance' => $balance
    ));
}

function emailExist($email) {
    $db = myPdo();
    $request = $db->prepare("SELECT * FROM users WHERE email = :email");
    $request->execute(array('email' => $email));

    return ($request->rowCount() > 0);
}

function checkUserAuthentification($username, $pwd) {
    $db = myPdo();
    $password = $pwd;
    $sql = "SELECT count(*) FROM users WHERE username = :username AND password = :password ";
    $request = $db->prepare($sql);
    $request->execute(
            array(
                'username' => $username,
                'password' => $password
    ));

    return $request->fetch()[0] != 0;
}

function getBestUsers() {
    $db = myPdo();
    $sql = "SELECT username, balance FROM users ORDER BY balance DESC LIMIT 10";
    $request = $db->query($sql);
    return $request;
}

function checkBalance($amount, $id) {
    $balance = getBalance($amount, $id);
    if (amount > $balance) {
        return true;
    } else { {
            return false;
        }
    }
}

function getBalance($id) {

    $db = myPdo();
    $userN = $username;
    $email = $emailUser;
    $password = $pwd;
    $balance = $balanceUser;
    $request = $db->prepare("SELECT balance FROM `users` WHERE `idUser` = :id");
    $request->execute(array(
        'id' => $id
    ));

    return $request->fetch()[0];
}

function hasWon($choicePlayer, $winner) {
    if ($choicePlayer == $winner) {
        return true;
    } else {
        return false;
    }
}

function giveReward($id, $amount) {

    $db = myPdo();
    $totBalance = getBalance($id) + 2 * $amount;
    $request = $db->prepare("UPDATE users SET balance= :balance WHERE idUser = :id");
    $request->execute(array(
        'balance' => $totBalance,
        'id' => $id
    ));
}

function insertBet($amount, $id) {

    $db = myPdo();
    $userN = $username;
    $email = $emailUser;
    $password = $pwd;
    $balance = $balanceUser;
    $request = $db->prepare("INSERT INTO bets(`amount`, `idUser`)
            VALUES(:amount , :id)");
    $request->execute(array(
        'amount' => $amount,
        'id' => $id
    ));
}

function removeBetAmount($amount, $id) {
    $db = myPdo();
    $totBalance = getBalance($id) - $amount;
    $request = $db->prepare("UPDATE users SET balance= :balance WHERE idUser = :id");
    $request->execute(array(
        'balance' => $totBalance,
        'id' => $id
    ));
}

function chooseShape($side, $shape) {
    $shapes = array("rock", "leaf", "scissor");
    $shape = $shapes[random_int(0, 2)];
    if ($side == "L") {
        return $shape + "L";
    } else {
        return $shape + "R";
    }
}

function updateEmail($email, $username)
{
  $db = myPdo();
  $request = $db->prepare("UPDATE `users` SET `email`= :email WHERE `username` = :username");
  $request->execute(array(
      'username' => $username,
      'email' => $email
  ));
}

function updatePassword($password, $username)
{
  $db = myPdo();
  $request = $db->prepare("UPDATE `users` SET `password`= :password WHERE `username` = :username");
  $request->execute(array(
      'username' => $username,
      'password' => $password
  ));
}
function updatePseudo($newUsername , $oldUsername)
{
  $db = myPdo();
  $request = $db->prepare("UPDATE `users` SET `username`= :newusername WHERE `username` = :oldusername");
  $request->execute(array(
      'newusername' => $newUsername,
      'oldusername' => $oldUsername
  ));
}
function updateAward($id, $amount) {
  $db = myPdo();
  $request = $db->prepare("UPDATE `bets` SET `amount`= :award WHERE `idBet` = :idBet");
    $request->execute(array(
      'award' => $amount,
        'idBet' => $id
  ));
}
function getBetHistory($id)
{
  $db = myPdo();
  $request = $db->prepare("SELECT  `amount`, `dateBet` FROM `bets` WHERE `idUser` = :idUser ORDER BY `dateBet` DESC");
    $request->execute(array(
      'idUser' => $id
  ));

  return $request;
}
function getUserByUsername($uName)
{
  $db = myPdo();
  $request = $db->prepare("SELECT * FROM `users` WHERE `username` = :username");
  $request->execute(array(
      'username' => $uName
  ));

  return $request;

}

function getIdByUsername($uName)
{
  $db = myPdo();
  $request = $db->prepare("SELECT `idUser` FROM `users` WHERE `username` = :username");
  $request->execute(array(
      'username' => $uName
  ));

  return $request->fetch()[0];

}
function identifyWinner($choiceLeft, $choiceRight)
{
  $left = 1;
  $right = 2;
  $tie = 3;

  if($choiceLeft == "scissorL")
  {
    if($choiceRight == "leafR")
    {
      return $left;
    }
    elseif ($choiceRight == "rockR") {
      return $right;
    }
    else {
      return $tie;
    }
  }
  elseif ($choiceLeft == "leafL")
   {
     if($choiceRight == "rockR")
     {
       return $left;
     }
     elseif ($choiceRight == "scissorR") {
       return $right;
     }
     else {
       return $tie;
     }
  }
  elseif ($choiceLeft== "rockL")
   {
     if($choiceRight == "scissorR")
     {
       return $left;
     }
     elseif ($choiceRight == "leafR") {
       return $right;
     }
     else {
       return $tie;
     }
  }

}
?>
