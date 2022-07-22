<?php
include "connect.php";

//INSERT INTO `customs` (`id`, `name`, `phone`, `password`) VALUES (NULL, '', '', '') ;
$orderId = filterReq("id");
$doneCustTime = filterReq("doneCustTime");


$stmt = $con -> prepare("UPDATE `orders` SET `isRecieved` = '1', `doneCustTime` = ? WHERE `orders`.`order_id` = ?");
$stmt->execute(array($doneCustTime,$orderId));

$count = $stmt->rowCount();
if($count!=0){
    echo json_encode(array('status'=>'success'));
}else{
    echo json_encode(array('status'=>'faild'));
}