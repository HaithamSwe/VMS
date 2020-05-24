<?php 
require_once('connect.php');
$sql="DELETE FROM Attendance WHERE (User_ID = '".$_POST["User_ID"]."') and (Event_ID = '".$_POST["Event_ID"]."')";
mysqli_query($connection, $sql) or
die(mysqli_error($connection));
?>
