<?php

$url='127.0.0.1:3307';
$username='root';
$password='123';
$conn=mysqli_connect($url,$username,$password,"grocery");

if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}

?>