<?php

require_once 'dbConnection.php';

function PseudoExist($pseudo){
    $db = connectDb();
    $request = $db->prepare("SELECT * FROM users WHERE username = :username");
    $request->execute(array('username' => $pseudo));

    return ($request->rowCount() > 0);
}
function addUser($username, $email ,$pwd, $balance){
    $db = connectDb();
    $password = sha1($pwd);
    $salt = sha1(rand(0,100));
    $password = sha1($salt.$password);
    $request = $db->prepare("INSERT INTO users(`username`, `email`, `password`,  `balance`)
            VALUES(:FistName, :LastName, :Pwd, :Pseudo, :salt, :email, :sms)");
    $request->execute(array(
        'username' => uname,
        'email' => $password,
        'password' => $password,
        'balance' => $salt,

   ));
}

?>
