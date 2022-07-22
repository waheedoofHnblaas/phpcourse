<?php
include "connect.php";

//INSERT INTO `customs` (`id`, `name`, `phone`, `password`) VALUES (NULL, '', '', '') ;
$username = filterReq("name");
$password =filterReq("password");


$stmt = $con -> prepare("SELECT * FROM `employees` WHERE  `name` = ? && `password` = ? ");
$stmt->execute(array($username,$password));

$count = $stmt->rowCount();
if($count!=0){
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode(array('status'=>'success','data'=>$data));
}else{
    $stmt2 = $con -> prepare("SELECT * FROM `employees` WHERE  `name` = '$username' ");
    $stmt2->execute();
    $count2 = $stmt2->rowCount();
    if($count2!=0){
        echo json_encode(array('status'=>'password'));
    }else{
        echo json_encode(array('status'=>'faild'));

    }
}