<?php
session_start(); //Start the Session
require('connect.php');
$sql="UPDATE Users SET ";

if ($_POST['first_name']!=""){
$sql.="FName ='".$_POST['first_name']."'";
if($_POST['last_name']!="")
$sql.=",LName ='".$_POST['last_name']."'";

if($_POST['email']!="")
$sql.=",Email ='".$_POST['email']."'";

if($_POST['BirthDate']!="")
$sql.=",BirthDate ='".$_POST['BirthDate']."'";
$sql.=" WHERE National_ID='".$_SESSION['National_ID']."'";

}
else if($_POST['last_name']!=""){
$sql.="LName ='".$_POST['last_name']."'";

if($_POST['email']!="")
$sql.=",Email ='".$_POST['email']."'";

if($_POST['BirthDate']!="")
$sql.=",BirthDate ='".$_POST['BirthDate']."'";
$sql.=" WHERE National_ID='".$_SESSION['National_ID']."'";

}
else if($_POST['email']!=""){
$sql.="Email ='".$_POST['email']."'";

if($_POST['BirthDate']!="")
$sql.=",BirthDate ='".$_POST['BirthDate']."'";
$sql.=" WHERE National_ID='".$_SESSION['National_ID']."'";

}
else if($_POST['BirthDate']!=""){
$sql.="BirthDate ='".$_POST['BirthDate']."'";
$sql.=" WHERE National_ID='".$_SESSION['National_ID']."'";
}
if($sql=="UPDATE Users SET ")
header("Location: ../../Editprofile.php");

$result = mysqli_query($connection, $sql) or
die(mysqli_error($connection));
if ($_POST['first_name']!="")
$_SESSION['FName'] =  $_POST['first_name'];
if($_POST['last_name']!="")
$_SESSION['LName'] =  $_POST['last_name'];
if($_POST['email']!="")
$_SESSION['Email']=$_POST['email'];
if($_POST['BirthDate']!="")
$_SESSION['BirthDate']=$_POST['BirthDate'];
$_SESSION["msg"]="Profile info updated successfully";
header("Location: ../../Editprofile.php"); /* Redirect browser */
exit();

?>