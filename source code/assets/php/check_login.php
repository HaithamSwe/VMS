<?php
session_start(); //Start the Session
require('connect.php');

if (isset($_POST['email']) and isset($_POST['password']))
{

$email = strtolower($_POST['email']);
$password = $_POST['password'];
// Checking the values are existing in the database or not
$query = "SELECT * FROM Users WHERE Email='$email' and Password='$password'";
$result = mysqli_query($connection, $query) or
die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){
$result=mysqli_fetch_assoc($result);
$_SESSION['National_ID'] = $result["National_ID"];
$_SESSION['FName'] =  $result["FName"];
$_SESSION['LName'] =  $result["LName"];
$_SESSION['Role_ID'] =  $result["Role_ID"];
$_SESSION['Gender'] =  $result["Gender"];
$_SESSION['Email']=$email;
$_SESSION['Status']=$result["Status"];
$_SESSION['BirthDate']=$result["BirthDate"];
$_SESSION['Team_ID']=$result["Team_ID"];
if (isset($_SESSION['error'])){
    unset($_SESSION["error"]);
}
}else{// the login credentials doesn't match
$_SESSION["error"]="Invalid Email or Password";
header("Location: ../../login.php"); /* Redirect browser */
exit();
}
}
// if the user is logged in Greets the user with message
if (isset($_SESSION['National_ID'])){
    header("Location: ../../index.php"); /* Redirect browser */
exit();
}
?>