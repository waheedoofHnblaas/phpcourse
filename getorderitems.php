<?php
include "connect.php";

//SELECT order_items.count FROM order_items WHERE order_items.order_id = 6;
$orderId = filterReq("id");


$stmt = $con -> prepare("SELECT items.item_id,items.name,items.info,items.price,items.weight,order_items.count
                         FROM items,orders,order_items
                          where orders.order_id = ? &&
                            order_items.item_id = items.item_id &&
                             order_items.order_id = orders.order_id");

$stmt2 = $con -> prepare("SELECT order_items.count FROM order_items WHERE order_items.order_id = ?");
$stmt->execute(array($orderId));
$stmt2->execute(array($orderId));

//$count = $stmt->rowCount();

$listorders =[];
echo $count;
// set the resulting array to associative
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result2 = $stmt2->fetch(PDO::FETCH_ASSOC);

echo(json_encode($result));
