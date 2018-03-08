<?php

require_once 'dbConnection.php';

function usernameAvailable($pseudo){
    $db = MyPdo();
    $request = $db->prepare("SELECT * FROM users WHERE username = :username");
    $request->execute(array('username' => $pseudo));

    return ($request->rowCount() > 0);
}
function addUser($username, $emailUser ,$pwd, $balanceUser){
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

function emailExist($email){
  $db = MyPdo();
  $request = $db->prepare("SELECT * FROM users WHERE email = :email");
  $request->execute(array('email' => $email));

  return ($request->rowCount() > 0);
}

function checkUserAuthentification($pseudo, $pwd){
    $db = MyPdo();
    $password = $pwd;
    $sql = "SELECT count(*) FROM users WHERE username = :username AND password = :password ";
    $request = $db->prepare($sql);
    $request->execute(
      array(
        'pseudo' => $pseudo,
        'password' => $password
    ));

    return $request->fetch()[0] != 0;
}

function getBestUsers() {
    $db = myPdo();
    $sql = "SELECT `username`, `balance` FROM `users` ORDER BY `balance` DESC LIMIT 10";
    $request = $db->query($sql);
    return $request;
}

function newGame()
{


}
function chooseShape()
{

}
function makeABet($amount , $id)
{

    $db = MyPdo();
    $userN = $username;
    $email = $emailUser;
    $password = $pwd;
    $balance = $balanceUser;
    $request = $db->prepare("INSERT INTO bets(`amount`, `idUser`)
            VALUES(:amount , :email)");
    $request->execute(array(
        'amount' => $amount,
        'idUser' => $id
        ));

  }
?>
