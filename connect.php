<?php

$dsn = "mysql:host=localhost:3306;dbname=phpcourse";
$user = 'root';
$pass= 'root';
$option =array(
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8" //ARABIC
);

try{
    $con = new PDO($dsn ,$user ,$pass ,$option );
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    include "../myPhpProject/funcs.php";
}catch(PDOException $e){
    echo $e-> getMessage();
}

 ?>