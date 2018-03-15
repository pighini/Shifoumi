<?php

require_once 'dbConnection.php';

function usernameAvailable($username){
    $db = myPdo();
    $request = $db->prepare("SELECT * FROM users WHERE username = :username");
    $request->execute(array('username' => $username));

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
  $db = myPdo();
  $request = $db->prepare("SELECT * FROM users WHERE email = :email");
  $request->execute(array('email' => $email));

  return ($request->rowCount() > 0);
}

function checkUserAuthentification($username, $pwd){
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
    $db = MyPdo();
    $sql = "SELECT `username`, `balance` FROM `users` ORDER BY `balance` DESC LIMIT 10";
    $request = $db->query($sql);
    return $request;
}

function checkBalance($amount, $id)
{
 $balance = getBalance($amount, $id);
 if(amount > $balance)
 {
   return true;
 }
 else {
   {
     return false;
   }
 }

}
function getBalance($id)
{

$db = myPdo();
$userN = $username;
$email = $emailUser;
$password = $pwd;
$balance = $balanceUser;
$request = $db->prepare("SELECT balance FROM `users` WHERE `idUser` = :id");
$request->execute(array(
    'id' => $id
    ));

return $request;
}
function hasWon($choicePlayer, $winner)
{
if($choicePlayer == $winner )
{
  return true;
}
else{
  return false;
}
}

function giveReward($id, $amount)
{

  $db = myPdo();
  $totBalance = getBalance($id) + 2*$amount ;
  $request = $db->prepare("UPDATE users SET balance= :balance WHERE idUser = :id"  );
  $request->execute(array(
      'balance' => $totBalance,
      'id'=> $id
      ));

}
function insertBet($amount , $id)
{

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
function removeBetAmount($amount , $id)
{
  $db = myPdo();
  $totBalance = getBalance($id) - $amount ;
  $request = $db->prepare("UPDATE users SET balance= :balance WHERE idUser = :id"  );
  $request->execute(array(
      'balance' => $totBalance,
      'id'=> $id
      ));
}

function chooseShape($side, $shape)
{
  $shapes  = array("rock", "leaf", "scissor");
  $shape = $shapes[random_int(0,2)];
  if($side == "L")
  {
    return $shape +"L";
  }
  else
    {
      return  $shape +"R";
    }
  }

}
?>
