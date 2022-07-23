<?php
include "connect.php";

//INSERT INTO `customs` (`id`, `name`, `phone`, `password`) VALUES (NULL, '', '', '') ;
$ItemId = filterReq("id");


if($ItemId==-1){

$stmt = $con -> prepare("SELECT * FROM `itemtype` WHERE 1");
$stmt->execute(array($ItemId));
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo(json_encode($result));

}else{

$stmt = $con -> prepare("SELECT * FROM `itemtype` WHERE typeId=? ");
$stmt->execute(array($ItemId));
echo $count;
$result = $stmt->fetch(PDO::FETCH_ASSOC);
echo(json_encode($result));

}
