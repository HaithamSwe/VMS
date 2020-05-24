<?php 
require_once('connect.php');
$sql="DELETE FROM Attendance WHERE Attendance.Event_ID=".$_POST["Event_ID"];
mysqli_query($connection, $sql) or
die(mysqli_error($connection));
$sql="DELETE FROM Applications WHERE Applications.Event_ID=".$_POST["Event_ID"];
mysqli_query($connection, $sql) or
die(mysqli_error($connection));
$sql="DELETE FROM Events WHERE Events.Event_ID=".$_POST["Event_ID"];
mysqli_query($connection, $sql) or
die(mysqli_error($connection));
?>
