<?php
session_start();
require('connect.php');

$id = $_POST['id'];
$query = "SELECT * FROM Users WHERE  National_ID='$id'";
$result = mysqli_query($connection, $query) or
die(mysqli_error($connection));
$count = mysqli_num_rows($result);
if ($count == 1){
echo "Error";
}



?>