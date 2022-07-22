<?php
include "connect.php";

//INSERT INTO `customs` (`id`, `name`, `phone`, `password`) VALUES (NULL, '', '', '') ;
$username = filterReq("name");
$phone = filterReq("phone");
$password =filterReq("password");


$stmt = $con -> prepare(
    "INSERT INTO `employees` ( `name`, `phone`, `password`) VALUES (?,?,?)"
);
$stmt->execute(array($username,$phone,$password));

$count = $stmt->rowCount();

if($count!=0){
    echo json_encode(array('status'=>'success'));
}else{
    echo json_encode(array('status'=>'faild'));
}
