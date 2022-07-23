<?php
include "connect.php";

//INSERT INTO `customs` (`id`, `name`, `phone`, `password`) VALUES (NULL, '', '', '') ;
$ownerId = filterReq("id");

$stmt = $con -> prepare("SELECT * FROM `orders` WHERE orders.owner_id = ? or orders.delivery_id =?");
$stmt->execute(array($ownerId,$ownerId));

//$count = $stmt->rowCount();

$listorders =[];
echo $count;
// set the resulting array to associative
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo(json_encode($result));