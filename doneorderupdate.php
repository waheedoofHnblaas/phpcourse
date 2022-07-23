<?php
include "connect.php";

//INSERT INTO `customs` (`id`, `name`, `phone`, `password`) VALUES (NULL, '', '', '') ;
$orderId = filterReq("id");
$doneCustTime = filterReq("doneCustTime");
$deliveryId = filterReq("dId");
$rate = filterReq("rate");


$stmt = $con -> prepare("UPDATE `orders` SET `isRecieved` = '1', `doneCustTime` = ? 
                         WHERE `orders`.`order_id` = ?");
$stmt->execute(array($doneCustTime,$orderId));
$count = $stmt->rowCount();


$stmt2 = $con -> prepare("UPDATE `employees` SET employees.rate=0 WHERE employees.id=$deliveryId;
                        UPDATE `employees` SET employees.rate=$rate WHERE employees.id=$deliveryId");
$stmt2->execute(array());
$count2 = $stmt2->rowCount();


if($count!=0 && $count2==1){
    echo json_encode(array('status'=>'success'));
}else{
    echo json_encode(array('status'=>'faild'));
}