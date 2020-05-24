<?php 
require_once('connect.php');
$sql="UPDATE Events
SET
Team_ID = ".$_POST["Team_ID"]."
WHERE Event_ID =".$_POST["Event_ID"];
mysqli_query($connection, $sql) or
die(mysqli_error($connection));
$sql="DELETE FROM Attendance WHERE Attendance.Event_ID=".$_POST["Event_ID"];
mysqli_query($connection, $sql) or
die(mysqli_error($connection));
$sql="DELETE FROM Applications WHERE Applications.Event_ID=".$_POST["Event_ID"];
mysqli_query($connection, $sql) or
die(mysqli_error($connection));

?>
