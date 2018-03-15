<?php

require_once 'dbConnection.php';

function getUsers(){
    $db = connectDb();
    $sql = "SELECT idUser, FistName, LastName, Pseudo FROM Users";
    $request = $db->query($sql);
    return $request;
}

function getUserById($idUser){
    $db= connectDb();
    $sql="SELECT FistName, LastName, Pseudo, Pwd, email, sms from Users WHERE idUser=:idUser";
    $request=$db->prepare($sql);
    $request->execute(array(':idUser' => $idUser));
    return $request->fetch(PDO::FETCH_ASSOC);
}

function addUsers($prenom, $nom, $pwd, $pseudo, $email, $sms){
    $db = connectDb();
    $password = sha1($pwd);
    $salt = sha1(rand(0,100));
    $password = sha1($salt.$password);
    $request = $db->prepare("INSERT INTO Users(FistName, LastName, Pwd, Pseudo, salt, email, sms)
            VALUES(:FistName, :LastName, :Pwd, :Pseudo, :salt, :email, :sms)");
    $request->execute(array(
      'FistName' => $prenom,
        'LastName' => $nom,
        'Pwd' => $password,
        'Pseudo' => $pseudo,
        'salt' => $salt,
        'email' => $email,
        'sms' => $sms
   ));
}

function updateUser($prenom, $nom, $pseudo, $id, $email, $sms){
    $db = connectDb();
    $request = $db->prepare("UPDATE Users SET FistName = :firstname,LastName = :lastname, Pseudo = :pseudo, email = :email, sms = :sms where idUser=:id");
    $request->execute(array(
      ':firstname' => $prenom,
        ':lastname' => $nom,
        ':pseudo' => $pseudo,
        ':id'=>$id,
        ':email'=>$email,
        ':sms'=>$sms
   ));
}

function updatePassword($oldPwd, $newPwd, $id){
  $db = connectDb();
  $password = sha1($newPwd);
  $salt = sha1(rand(0,100));
  $password = sha1($salt.$password);
  $request = $db->prepare("UPDATE Users SET Pwd = :password, salt = :salt where idUser=:id AND Pwd = :oldPwd");
  $request->execute(array(
      ':oldPwd' => $oldPwd,
      ':password' => $password,
      ':salt' => $salt,
      ':id'=>$id
 ));
}

function PseudoExist($pseudo){
    $db = connectDb();
    $request = $db->prepare("SELECT * FROM Users WHERE Pseudo = :pseudo");
    $request->execute(array('pseudo' => $pseudo));

    return ($request->rowCount() > 0);
}

function deleteUsers($idUser){
    $db = connectDb();
    $sql = "DELETE FROM Users WHERE idUser = :idUser";
    $request = $db->prepare($sql);
    $request->execute(array('idUser' => $idUser));
}

function checkUserAuthentification($pseudo, $pwd, $salt){
    $db = connectDb();
    $password = $pwd;
    $sql = "SELECT count(*) FROM Users WHERE Pseudo = :pseudo AND Pwd = :password ";
    $request = $db->prepare($sql);
    $request->execute(
      array(
        'pseudo' => $pseudo,
        'password' => $password
    ));

    return $request->fetch()[0]!=0;
}

function getPseudoByEmail($email){
  $db = connectDb();
  $request = $db->prepare("SELECT Pseudo FROM Users WHERE email = :email");
  $request->execute(array('email' => $email));

  return ($request->fetch()[0]);
}

function getEmailByPseudo($pseudo){
  $db = connectDb();
  $request = $db->prepare("SELECT email FROM Users WHERE Pseudo = :pseudo");
  $request->execute(array('pseudo' => $pseudo));

  return ($request->fetch()[0]);
}

function getSaltByPseudo($pseudo){
    $db = connectDb();
    $sql = "SELECT salt FROM Users WHERE Pseudo = :pseudo";
    $request = $db->prepare($sql);
    $request->execute(
      array(
        'pseudo' => $pseudo
    ));

    return $request->fetch(PDO::FETCH_ASSOC)["salt"];
}

function emailExist($email){
  $db = connectDb();
  $request = $db->prepare("SELECT * FROM Users WHERE email = :email");
  $request->execute(array('email' => $email));

  return ($request->rowCount() > 0);
}

function SendReinitMessage($email, $key){
  $text = "Voici le code pour que vous puissiez réinitialiser votre mot de passe ou votre pseudo : " . $key . " Dépéchez vous votre temps est compté.";
  $f = fopen("messages.csv", 'a');
  fputcsv($f, array("Email", $text), ';');
  fclose($f);
}

function SendReinitSms($email, $url){

}

function startPwdReinitialisation($pseudo){
  $key = sha1(rand(0,100));
  SendReinitMessage(getEmailByPseudo($pseudo), $key);
  $db = connectDb();
  $request = $db->prepare("INSERT INTO reinitKeys(reinitKey, expirationDate, idUser)
          VALUES(:reinitkey, :expirationDate, (SELECT idUser FROM Users WHERE Pseudo = :pseudo))");
  $request->execute(array(
    'reinitkey' => $key,
    'expirationDate' => date('Y-m-d H:i:s', strtotime('15 minute')),
    'pseudo' => $pseudo
  ));
}

function checkKey($key){
  $db = connectDb();
  $request = $db->prepare("SELECT * FROM reinitKeys WHERE reinitKey = :key AND expirationDate > NOW()");
  $request->execute(array('key' => $key));

  return ($request->rowCount() > 0);
}

function checkKeyWithPseudo($pseudo, $key){
  $db = connectDb();
  $request = $db->prepare("SELECT * FROM reinitKeys WHERE reinitKey = :key AND expirationDate > NOW() AND idUser = (SELECT idUser FROM Users WHERE Pseudo = :pseudo)");
  $request->execute(array('key' => $key,
              'pseudo' => $pseudo
  ));

  return ($request->rowCount() > 0);
}

function updatePwdWithKey($pseudo,$key,$newPwd, $newPseudo){
  $db = connectDb();
  $password = sha1($newPwd);
  $salt = sha1(rand(0,100));
  $password = sha1($salt.$password);
  $request = $db->prepare("UPDATE Users SET Pseudo = :newPseudo, Pwd = :password, salt = :salt where Pseudo=:pseudo");
  $request->execute(array(
      ':password' => $password,
      ':salt' => $salt,
      ':pseudo'=>$pseudo,
      ':newPseudo' => $newPseudo
  ));
}
