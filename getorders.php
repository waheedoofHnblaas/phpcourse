<?php
include "connect.php";

//INSERT INTO `customs` (`id`, `name`, `phone`, `password`) VALUES (NULL, '', '', '') ;



$stmt = $con -> prepare("SELECT * FROM orders");
$stmt->execute();

//$count = $stmt->rowCount();

$listorders =[];
echo $count;
// set the resulting array to associative
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo(json_encode($result));
