<?php
include "connect.php";

//INSERT INTO `customs` (`id`, `name`, `phone`, `password`) VALUES (NULL, '', '', '') ;

$owner_id =  filterReq("owner_id");
$delivery_id =  filterReq("delivery_id");
$deliveryLat =  filterReq("deliveryLat");
$deliveryLong =  filterReq("deliveryLong");
$isWaiting =  filterReq("isWaiting");
$isRecieved =  filterReq("isRecieved");
$lat =  filterReq("lat");
$long =  filterReq("long");
$createTime =  filterReq("createTime");


$getDelTime =  filterReq("getDelTime");
$doneCustTime =  filterReq("doneCustTime");
$totalPrice =  filterReq("totalPrice");

$stmt = $con -> prepare("INSERT INTO `orders`
                         (`owner_id`, `delivery_id`, `isWaiting`,`isRecieved`,`getDelTime`,
                         `doneCustTime`,`totalPrice`, `lat`, `long`, `createTime`, `deliveryLat`, `deliveryLong`)
                         VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->execute(
    array(
    $owner_id,
    $delivery_id,
    $isWaiting,
    $isRecieved,
    $getDelTime,$doneCustTime,$totalPrice,
    $lat,
    $long,
    $createTime,
    $deliveryLat,
    $deliveryLong,
));

$last_order_id = $con->lastInsertId();




$count = $stmt->rowCount();

if($count!=0){
    echo json_encode(array('status'=>'success','orderId'=>$last_order_id,));
}else{
    echo json_encode(array('status'=>'faild'));
}
/*


$stmt2 = $con -> prepare("INSERT INTO `order_items` (`order_id`, `item_id`, `count`)
 VALUES ($last_order_id ,$item_id,$countItem),($last_order_id ,$item_id2,$countItem2),
 ($last_order_id ,$item_id3,$countItem3)");
$stmt2->execute();
$count2 = $stmt2->rowCount();
*/