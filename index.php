<?php

use function PHPSTORM_META\map;

include "connect.php";

//UPDATE
//$stmt = $con->prepare("UPDATE `users` SET username = ? , email = ? WHERE id=? ");
//$stmt->execute(array('moh','www.moh@gmail.com','20'));


//DELETE
//$stmt = $con->prepare("DELETE FROM `users` WHERE id = ? ");
//$stmt->execute(array('20'));


//INSERT
//$stmt = $con->prepare("INSERT INTO `users`(`username`, `email`) VALUES (?,?)");
//$stmt->execute(array('waheed','www.waheed@gmail.com'));


$stmt = $con -> prepare(
    "INSERT INTO `customs` ( `name`, `phone`, `password`) VALUES (?,?,?)"
);
$stmt->execute(array('$username','$phone','$password'));

$count = $stmt->rowCount();

if($count!=0){
    echo json_encode(array('status'=>'successful regist'));
}else{
    echo json_encode(array('status'=>'fail to regist'));
}

 ?>