<!DOCTYPE html>
<html>

<head>
<?php 
    session_start();
    if(!isset($_SESSION['National_ID']) ||!($_SESSION['Role_ID']==1 || $_SESSION['Role_ID']==2)){
    header("Location: index.php"); /* Redirect browser */
    exit();
}
require('assets/php/connect.php');
if(($_SESSION['Role_ID'] == 1))
$sql = "SELECT Team_ID,Team_Name FROM Teams";
else
$sql = "SELECT Team_ID,Team_Name FROM Teams where Team_Leader=".$_SESSION['National_ID'];
$Teams = mysqli_query($connection, $sql) or
    die(mysqli_error($connection));



echo "<p id='NationalID' hidden>" . $_SESSION['National_ID'] . "</p>";
echo "<p id='Role_ID' hidden>" . $_SESSION['Role_ID'] . "</p>";
echo "<p id='Selected' hidden></p>";
?>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Manage Events</title>
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
            <div id="content" >
            <?php 
            include_once("assets/php/Dash_Header.php");
            ?>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Manage Events</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-warning m-0 font-weight-bold">Events</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6"><button class="btn btn-warning d-flex align-items-center"  data-toggle="modal" href="#modal" type="button" style="padding-right: 11px;margin: 5px;height: 38px;padding-top: 3px;padding-bottom: 7px;"><i class="material-icons" style="font-size: 15px;padding-right: 6px;">event_available</i>Create Event</button></div>
        
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" style="height: 400px;" role="grid" aria-describedby="dataTable_info">
                            <?php require_once("assets/php/ManageEvent_Table.php")?>
                        </div>

                    </div>
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

                    <div style="margin-top: 5px;margin-left: 0px;margin-bottom: 10px;"><label  id="TeamName" style="margin-top: 0px;">Team Name:&nbsp;<select name="Team" style="margin-left: 3px;">
                                <?php foreach ($Teams as $rec):
                                    echo "<option value=" . $rec["Team_ID"] . ">" . $rec["Team_Name"] . "</option>";
                                endforeach; ?>
                            </select>
                            </label>
                        </div>

                </div>
                <div class="modal-footer"><button class="btn btn-light" data-dismiss="modal" type="button" onclick="Selection(0)">Close</button><button class="btn btn-primary" id="submitbutton" type="Button" onclick="AssignTeam()">Submit</button></div>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" tabindex="-1" id="modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Add New Event</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow mb-3">
                                            <div class="card-body">
                                                <form action="assets/php/create_event.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="first_name"><strong>Event Name</strong><br></label><input class="form-control" type="text" name="Name" required=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="email"><strong>Description</strong><br></label><textarea class="form-control" name="Description"></textarea></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="first_name"><strong>Gender</strong></label><select class="form-control" name="Gender" required=""><optgroup label="Gender"><option value="M">Male</option><option value="F">Female</option><option value="B">Both</option></optgroup></select></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group"><label for="first_name"><strong>Capacity</strong><br></label><input class="form-control" type="number" min="0" step="1" name="Capacity" required=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>Date</strong></label><input class="form-control" type="date" name="Date" required=""></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group"><label for="first_name"><strong>Location</strong><br></label><input class="form-control" type="text" name="Location" required=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>Start Time</strong></label><input class="form-control" type="time" name="StartTime" required=""></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>End Time</strong></label><input class="form-control" type="time" name="EndTime" required=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>Event Image:&nbsp;</strong></label><input type="file" name="IMG" required="" accept="image/*"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><button class="btn btn-warning btn-sm" type="submit">Create</button></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min2.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Events.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>