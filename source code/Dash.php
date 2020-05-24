<?php
session_start();
if(!isset($_SESSION['National_ID'])){
    header("Location: index.php"); /* Redirect browser */
    exit();
}
else{
if($_SESSION['Role_ID']==1){
    //if he was Admin
    include_once("assets/php/Admin_Dash.php"); 
}
else if($_SESSION['Role_ID']==2){
    //if he was leader
    include_once("assets/php/Leader_Dash.php"); /* Redirect browser */
}
else if($_SESSION['Role_ID']==3){
    //if he was Member
    include_once("assets/php/Member_Dash.php"); /* Redirect browser */
}
}
?>