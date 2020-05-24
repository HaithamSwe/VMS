<?php 
require_once('connect.php');
$sql="UPDATE Users
SET
Team_ID = ".$_POST["Team_ID"]."
WHERE National_ID =".$_POST["Member_ID"];
mysqli_query($connection, $sql) or
die(mysqli_error($connection));
?>
