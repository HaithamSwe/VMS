<?php 
require_once('connect.php');
$sql="INSERT INTO Applications VALUES (".$_POST["National_ID"].",".$_POST["Event_ID"].",1)";
mysqli_query($connection, $sql) or
die(mysqli_error($connection));
?>
