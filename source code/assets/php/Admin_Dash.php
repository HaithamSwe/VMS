<!DOCTYPE html>
<html>

<head>
    <?php
    require('assets/php/connect.php');
    //get Hours
    $sql = "SELECT SUM(Hours) as h FROM Attendance ";
    $result = mysqli_fetch_assoc(mysqli_query($connection, $sql)) or
        die(mysqli_error($connection));
    //get teams count
    $sql = "SELECT count(Team_ID) as cteams FROM Teams";
    $result2 = mysqli_fetch_assoc(mysqli_query($connection, $sql)) or
        die(mysqli_error($connection));
    //Get Events Count
    $sql = "SELECT count(Event_ID) as cevents FROM Events";
    $result3 = mysqli_fetch_assoc(mysqli_query($connection, $sql)) or
        die(mysqli_error($connection));
    //Get Members Count
    $sql = "SELECT count(National_ID) as cmembers FROM Users where Users.Role_ID=3";
    $result4 = mysqli_fetch_assoc(mysqli_query($connection, $sql)) or
        die(mysqli_error($connection));


    //Get Events 
    $sql = "SELECT Events.Event_ID,Events.Name FROM Events";
    $Events = mysqli_query($connection, $sql) or
        die(mysqli_error($connection));

    //Get Teams 
    $sql = "SELECT Team_ID,Team_Name FROM Teams";
    $Teams = mysqli_query($connection, $sql) or
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
                        <h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-warning btn-sm d-none d-sm-inline-block" role="button" data-toggle="modal" href="#myModal"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="color: rgb(244,204,94);">Events</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $result3["cevents"]; ?> Event</span></div>
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
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="color: rgb(243,194,62);">Members</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $result4["cmembers"]; ?> Member</span></div>
                                        </div>
                                        <div class="col-auto"><i class="icon ion-man fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>TEams</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $result2["cteams"]; ?> Teams</span></div>
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
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $result["h"]; ?> Hours</span></div>
                                        </div>
                                        <div class="col-auto"><i class="far fa-clock fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php include_once("Top3.php"); ?>
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
    <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Generate Report</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body" style="padding-left: 39px;">
                <form action="report.php" method="post">
                <label>Report Type:&nbsp;<select name="Type" id="reportType">
                            <option value="0" selected="">Select Report</option>
                            <option value="1">Team Members</option>
                            <option value="2">Team Events</option>
                            <option value="3">Event Information</option>
                        </select></label>
                    <div style="margin-top: 5px;margin-left: 0px;margin-bottom: 10px;"><label class="d-none" id="TeamName" style="margin-top: 0px;">Team Name:&nbsp;<select name="Team" style="margin-left: 3px;">
                                <?php foreach ($Teams as $rec) :
                                    echo "<option value=" . $rec["Team_ID"] . ">" . $rec["Team_Name"] . "</option>";
                                endforeach; ?>
                            </select></label><label class="d-none" id="EventName">Event Name:&nbsp;<select name="Event">
                            <?php foreach ($Events as $rec) :
                                    echo "<option value=" . $rec["Event_ID"] . ">" . $rec["Name"] . "</option>";
                                endforeach; ?>
                            </select></label></div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" data-dismiss="modal" type="button">Close</button><button class="btn btn-primary" id="submitbutton" type="submit" disabled>Submit</button></div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min2.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/reports.js"></script>
    <script src="assets/js/theme.js"></script>

</body>

</html>