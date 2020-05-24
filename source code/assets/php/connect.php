<?php


$dbhost = 'localhost:3306';
$dbuser = 'ialamerc_root';
$dbpass = 'hD3KsCCUTg';
$dbName = 'ialamerc_VMS';


$connection = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$connection){
die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, $dbName);
if (!$select_db){
die("Database Selection Failed" . mysqli_error($connection));
}
?>

