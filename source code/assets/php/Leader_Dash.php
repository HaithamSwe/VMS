<!DOCTYPE html>
<html>

<head>
    <?php
    require('assets/php/connect.php');
    //get Hours
    $sql = "SELECT SUM(Hours) as h FROM Attendance,Teams,Events where Attendance.Event_ID=Events.Event_ID and Events.Team_ID=Teams.Team_ID and Teams.Team_Leader=" . $_SESSION["National_ID"];
    $result = mysqli_fetch_assoc(mysqli_query($connection, $sql)) or
        die(mysqli_error($connection));
    //Get Events Count
    $sql = "Select Count(Events.Event_ID) as cevents from Teams,Events where Teams.Team_ID=Events.Team_ID and Teams.Team_Leader=" . $_SESSION["National_ID"];
    $result3 = mysqli_fetch_assoc(mysqli_query($connection, $sql)) or
        die(mysqli_error($connection));
    //Get Members Count
    $sql = "Select Count(National_ID) as cmembers from Teams,Users where Teams.Team_ID=Users.Team_ID and Teams.Team_Leader=" . $_SESSION["National_ID"];
    $result4 = mysqli_fetch_assoc(mysqli_query($connection, $sql)) or
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
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="color: rgb(244,204,94);">My Teams Events</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $result3["cevents"] ?> Event</span></div>
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
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="color: rgb(243,194,62);">My Teams Members</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $result4["cmembers"] ?> Members</span></div>
                                        </div>
                                        <div class="col-auto"><i class="icon ion-man fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span class="text-warning"><strong>MY Teams VOLUNTEERING HOURS</strong><br></span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $result["h"]; ?> Hours</span></div>
                                        </div>
                                        <div class="col-auto"><i class="far fa-clock fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php include_once("Incoming_Events.php"); ?>
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