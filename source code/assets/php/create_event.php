<?php
session_start(); //Start the Session
require('connect.php');

$name = $_FILES['IMG']['name'];  
$temp_name = $_FILES['IMG']['tmp_name']; 
$location = '../../assets/img/Events/';      
move_uploaded_file($temp_name, $location.$name);


$sql="INSERT INTO `Events`
(`Team_ID`,`Name`,
`Description`,
`StartTime`,
`EndTime`,
`Date`,
`Gender`,
`Capacity`,
`IMG`,
`Location`
)
VALUES
(1,
\"".$_POST["Name"]."\",
\"".$_POST["Description"]."\",
\"".$_POST["StartTime"]."\",
\"".$_POST["EndTime"]."\",
\"".$_POST["Date"]."\",
\"".$_POST["Gender"]."\",
".$_POST["Capacity"].",
\"".$_FILES["IMG"]["name"]."\",
\"".$_POST["Location"]."\")";
echo $sql;
$result = mysqli_query($connection, $sql) or
die(mysqli_error($connection));
header("Location: ../../Manage_Events.php"); /* Redirect browser */
exit();

?>

