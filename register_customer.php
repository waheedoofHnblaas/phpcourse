<?php
include "connect.php";
//SELECT * FROM `customs` WHERE customs.name='ali'&& customs.password='111111' 
//INSERT INTO `customs` (`id`, `name`, `phone`, `password`) VALUES (NULL, '', '', '') ;
$username = filterReq("name");
$phone = filterReq("phone");
$password =filterReq("password");
$createTime =filterReq("createTime");


$stmt2 = $con -> prepare(
    "SELECT * FROM `customs` WHERE name = '$username'"
);
$stmt2->execute();

$count2 = $stmt2->rowCount();

if($count2!=0){
    echo json_encode(array('status'=>'user is here'));


}else{

    $stmt = $con -> prepare(
    "INSERT INTO `customs` ( `name`, `phone`, `password`, `createTime`) VALUES (?,?,?,?)"
   );
   $stmt->execute(array($username,$phone,$password,$createTime));

   $count = $stmt->rowCount();

   if($count!=0){
     echo json_encode(array('status'=>'success'));
   }else{
      echo json_encode(array('status'=>'faild'));
   }

}

