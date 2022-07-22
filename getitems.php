<?php
include "connect.php";

//INSERT INTO `customs` (`id`, `name`, `phone`, `password`) VALUES (NULL, '', '', '') ;
$orderId = filterReq("id");


$stmt = $con -> prepare("SELECT * FROM items ");
$stmt->execute(array($orderId));

//$count = $stmt->rowCount();

$listorders =[];
echo $count;
// set the resulting array to associative
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo(json_encode($result));
