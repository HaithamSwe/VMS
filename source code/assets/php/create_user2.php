<?php
session_start(); //Start the Session
require('connect.php');

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
    echo $sql;
$result = mysqli_query($connection, $sql) or
die(mysqli_error($connection));
header("Location: ../../Manage_Members.php"); /* Redirect browser */
exit();

?>