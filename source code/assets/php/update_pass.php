<?php
session_start(); //Start the Session
require('connect.php');


if ($_POST['password']!=""){
$sql="UPDATE Users SET Password='".$_POST['password']."' WHERE National_ID='".$_SESSION['National_ID']."'";
$result = mysqli_query($connection, $sql) or
die(mysqli_error($connection));
$_SESSION["msg2"]="password updated successfully";
}
header("Location: ../../Editprofile.php"); /* Redirect browser */
exit();

?>