<?php
session_start(); //Start the Session
require('connect.php');

if (isset($_POST['first_name']) and isset($_POST['last_name']) and isset($_POST['National_ID']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['Gender']) and isset($_POST['BirthDate']))
{
    $sql="INSERT INTO Users
    
    VALUES
    (\"".$_POST['National_ID']."\",
    \"".$_POST['first_name']."\",
    \"".$_POST['last_name']."\",
    3,
    \"".$_POST['Gender']."\",
    \"".strtolower($_POST['email'])."\",
    \"Active\",
    
    \"".$_POST['BirthDate']."\",
    1,
    \"".$_POST['password']."\")";
$result = mysqli_query($connection, $sql) or
die(mysqli_error($connection));
$_SESSION['National_ID'] = $_POST['National_ID'];
$_SESSION['FName'] =  $_POST['first_name'];
$_SESSION['LName'] =  $_POST['last_name'];
$_SESSION['Role_ID'] =  3;
$_SESSION['Gender'] =  $_POST['Gender'];
$_SESSION['Email']=$_POST['email'];
$_SESSION['Status']="Active";
$_SESSION['BirthDate']=$_POST['BirthDate'];
$_SESSION['Team_ID']=1;
header("Location: ../../index.php"); /* Redirect browser */
exit();

}
?>