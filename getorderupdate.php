<?php
include "connect.php";

//INSERT INTO `customs` (`id`, `name`, `phone`, `password`) VALUES (NULL, '', '', '') ;
$orderId = filterReq("order_id");
$deliveryId = filterReq("delivery_id");
$getDelTime = filterReq("getDelTime");
$deliveryLat = filterReq("deliveryLat");
$deliveryLong = filterReq("deliveryLong");


$stmt = $con -> prepare("UPDATE `orders` 
SET `delivery_id` = ?, `isWaiting` = '0', `getDelTime` = ?, `deliveryLat` = ?, `deliveryLong` = ? WHERE `orders`.`order_id` = ?");


$stmt->execute(array($deliveryId,$getDelTime,$deliveryLat,$deliveryLong,$orderId));

$count = $stmt->rowCount();
if($count!=0){
    echo json_encode(array('status'=>'success'));
}else{
    echo json_encode(array('status'=>'faild'));
}