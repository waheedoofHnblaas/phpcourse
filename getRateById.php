<?php
include "connect.php";

//INSERT INTO `customs` (`id`, `name`, `phone`, `password`) VALUES (NULL, '', '', '') ;
$EmpId = filterReq("id");


$stmt = $con -> prepare("SELECT employees.rate FROM employees WHERE employees.id=? ");
$stmt->execute(array($EmpId));

//$count = $stmt->rowCount();

echo $count;
// set the resulting array to associative
$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo(json_encode($result));