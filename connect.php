
<?php
error_reporting(E_ERROR | E_PARSE);
$url='127.0.0.1:3307 ';
$username='root';
$password='123';
$db='finalgrocery';
$conn=mysqli_connect($url,$username,$password,$db);
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}

?>
