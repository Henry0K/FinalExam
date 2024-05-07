<?php
$user="root";
$pass="root";
$host="localhost:8889";
$dbName="Bookstore";
$db=null;
try{
    $db=new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
}catch (Exception $ex){
    print "Error!: " . $ex->getMessage() . "<br/>";
    die();
}
return $db;
?>