<?php
session_start(); //Start the Session
require('connect.php');
$sql="UPDATE Events SET ";

$name = $_FILES['IMG']['name']; 
$Second = false;

if ($_POST['Name']!=""){
     if($Second)
        $sql.=",";
    $sql.="Name ='".$_POST['Name']."'";
    $Second=true;
}


if($_POST['Description']!=""){
    if($Second)
        $sql.=",";
$sql.="Description ='".$_POST['Description']."'";
$Second=true;
}


if($_POST['StartTime']!=""){
    if($Second)
        $sql.=",";
$sql.="StartTime ='".$_POST['StartTime']."'";
$Second=true;
}
if($_POST['EndTime']!=""){
if($Second)
        $sql.=",";
$sql.="EndTime ='".$_POST['EndTime']."'";
$Second=true;
}


if($_POST['Date']!=""){
    if($Second)
    $sql.=","; 
$sql.="Date ='".$_POST['Date']."'";
$Second=true;
}


if($_POST['Gender']!=""){
    if($Second)
    $sql.=",";
$sql.="Gender ='".$_POST['Gender']."'";
$Second=true;
}
if($_POST['Capacity']!=""){
    if($Second)
    $sql.=",";
$sql.="Capacity =".$_POST['Capacity']."";
$Second=true;
}
if($_POST['Location']!=""){
    if($Second)
    $sql.=",";
$sql.="Location ='".$_POST['Location']."'";
$Second=true;
}


if(isset($name) && $name!=""){
    if($Second)
    $sql.=",";
$sql.="IMG ='".$_FILES['IMG']['name']."'";
$Second=true;
$name = $_FILES['IMG']['name'];  
$temp_name = $_FILES['IMG']['tmp_name']; 
$location = '../../assets/img/Events/';      
move_uploaded_file($temp_name, $location.$name);



}

$sql.=" WHERE Event_ID=".$_POST['Event_ID'];

echo $sql;

if($sql=="UPDATE Events SET ")
header("Location: ../../Editprofile.php");

$result = mysqli_query($connection, $sql) or
die(mysqli_error($connection));
header("Location: ../../Manage_Events.php"); /* Redirect browser */
exit();

?>