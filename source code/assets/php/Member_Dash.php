<!DOCTYPE html>
<html>

<head>
<?php
    require('assets/php/connect.php');
        //get Hours and attendacne count
        $sql="SELECT COUNT(Hours) as ATTENDED, SUM(Hours) as h FROM Attendance where User_ID=".$_SESSION["National_ID"];
        $result = mysqli_fetch_assoc(mysqli_query($connection, $sql)) or
        die(mysqli_error($connection)); 
        $result2="";
        if(isset($_SESSION['Team_ID'])){
        //get team Name
        $sql="SELECT Teams.Team_Name from Teams where Team_ID=".$_SESSION["Team_ID"];
        $result2 = mysqli_fetch_assoc(mysqli_query($connection, $sql)) or
        die(mysqli_error($connection)); 
        }
        

        //Get Teams
        $sql="SELECT Events.Name, Events.Date FROM Events,Attendance where Events.Event_ID=Attendance.Event_ID and Attendance.User_ID=".$_SESSION["National_ID"];
        $result3 =mysqli_query($connection, $sql) or
        die(mysqli_error($connection)); 
        
    ?>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - VMS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min2.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/dh-card-image-left-dark.css">
    <link rel="stylesheet" href="assets/css/Profile-Card.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body id="page-top">
    <div id="wrapper">
    <?php 
            include_once("assets/php/Dash_SideNav.php");
            ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            <?php 
            include_once("assets/php/Dash_Header.php");
            ?>
                <div class="text-center profile-card" style="margin:15px;background-color:#ffffff;">
                    <div class="profile-card-img" style="height:150px;background-size:cover;"></div>
                    <div style="padding-bottom: 30px;"><img class="rounded-circle" style="margin-top:-70px;" src="assets/img/avatar-dhg.png" height="150px" alt="avatar">
                        <h3><?php echo $_SESSION['FName']." ".$_SESSION['LName']; ?></h3>
                    </div>
                </div>
                <section></section>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="color: rgb(244,204,94);">Attended Events</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $result["ATTENDED"];?> Event</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-calendar visible fa-2x text-gray-300" style="color: #000000;"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>Member IN</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php if(isset($_SESSION['Team_ID']))echo $result2["Team_Name"];?><br></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fa fa-group fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span class="text-warning"><strong>VOLUNTEERING HOURS</strong><br></span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $result["h"];?> Hours</span></div>
                                        </div>
                                        <div class="col-auto"><i class="far fa-clock fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-warning font-weight-bold m-0">My Attendence</h6>
                                </div>
                                <ul class="list-group list-group-flush" style="overflow-y: scroll; height:210px;">
                                    <?php foreach($result3 as $rec):?>
                                        <li class="list-group-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <h6 class="mb-0"><?php echo $rec["Name"];?><br></h6><span class="text-xs"><?php echo $rec["Date"];?></span></div>
                                        </div>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                        <?php include_once("Incoming_Events.php");?>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © VMS 2020</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min2.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>