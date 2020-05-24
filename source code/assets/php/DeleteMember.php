<?php 
require_once('connect.php');
$sql="DELETE FROM Attendance WHERE Attendance.User_ID=".$_POST["Member_ID"];
mysqli_query($connection, $sql) or
die(mysqli_error($connection));
$sql="DELETE FROM Applications WHERE Applications.User_ID=".$_POST["Member_ID"];
mysqli_query($connection, $sql) or
die(mysqli_error($connection));
$sql="DELETE FROM Users WHERE Users.National_ID=".$_POST["Member_ID"];
mysqli_query($connection, $sql) or
die(mysqli_error($connection));
?>
