<?php 
require_once('connect.php');
$sql="DELETE FROM Applications WHERE Event_ID=".$_POST["Event_ID"]." and User_ID=".$_POST["National_ID"];
mysqli_query($connection, $sql) or
die(mysqli_error($connection));
$sql="DELETE FROM Attendance WHERE Event_ID=".$_POST["Event_ID"]." and User_ID=".$_POST["National_ID"];
mysqli_query($connection, $sql) or
die(mysqli_error($connection));
?>
