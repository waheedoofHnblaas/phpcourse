<?php
include "connect.php";

//INSERT INTO `customs` (`id`, `name`, `phone`, `password`) VALUES (NULL, '', '', '') ;
$orderId = filterReq("id");


$stmt = $con -> prepare("DELETE FROM `orders` WHERE `orders`.`order_id` = ?");
$stmt->execute(array($orderId));

$count = $stmt->rowCount();
if($count!=0){
    echo json_encode(array('status'=>'success'));
}else{
    echo json_encode(array('status'=>'faild'));
}