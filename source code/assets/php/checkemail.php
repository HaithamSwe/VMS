<?php
session_start();
require('connect.php');
if (isset($_POST['email']) && isset($_POST['id']))
{
$email =  strtolower($_POST['email']);
$id = $_POST['id'];
$query = "SELECT * FROM Users WHERE Email='$email' and NOT National_ID='$id'";
$result = mysqli_query($connection, $query) or
die(mysqli_error($connection));
$count = mysqli_num_rows($result);
if ($count == 1){
echo "Error";
}
}
else if (isset($_POST['email']))
{
$email = $_POST['email'];
$query = "SELECT * FROM Users WHERE Email='$email'";
$result = mysqli_query($connection, $query) or
die(mysqli_error($connection));
$count = mysqli_num_rows($result);
if ($count == 1){
echo "Error";
}
}

?>