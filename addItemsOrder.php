<?php
include "connect.php";

//INSERT INTO `customs` (`id`, `name`, `phone`, `password`) VALUES (NULL, '', '', '') ;

$order_id =  filterReq("order_id");
$item_id =  filterReq("item_id");
$countItem =  filterReq("countItem");

$stmt = $con -> prepare("INSERT INTO `order_items` (`order_id`, `item_id`, `count`)
VALUES ($order_id ,$item_id,$countItem)");
$stmt->execute();



$count = $stmt->rowCount();

if($count!=0){
    echo json_encode(array('status'=>'success'));
}else{
    echo json_encode(array('status'=>'faild'));
}