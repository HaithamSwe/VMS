<?php 
require_once('connect.php');
$sql="INSERT INTO `Attendance`
(`User_ID`,
`Event_ID`,
`Hours`)
VALUES
(".$_POST["User_ID"].",
".$_POST["Event_ID"].",
(SELECT  (Events.EndTime-Events.StartTime)/10000 FROM Events where Event_ID=".$_POST["Event_ID"]."));";
 mysqli_query($connection, $sql) or
die(mysqli_error($connection));
?>
