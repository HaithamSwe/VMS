<!DOCTYPE html>
<html>

<head>
    <?php
    session_start();
    if (!isset($_SESSION['National_ID']) || !($_SESSION['Role_ID'] == 1 || $_SESSION['Role_ID'] == 2)) {
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
    <title>Manage Members</title>
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
                    <h3 class="text-dark mb-4">Manage Members</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-warning m-0 font-weight-bold">Members</p>
                        </div>
                        <div class="card-body">
                            <?php if ($_SESSION["Role_ID"] == 1) : ?>
                                <div class="row">
                                    <div class="col-6"><button class="btn btn-warning" type="button" data-toggle="modal" href="#AddUser" style="padding-right: 12px;margin: 5px;height: 35px;padding-top: 3px;padding-bottom: 3px;"><i class="fa fa-user-plus" style="font-size: 23px;padding-right: 6px;"></i>Add Member</button></div>

                                </div>
                            <?php endif; ?>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" style="height: 400px;" aria-describedby="dataTable_info">
                                <?php require_once("assets/php/ManageMembers_Table.php") ?>
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
    <div>
                <div class="modal fade" role="dialog" tabindex="-1" id="AddUser">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Add New Member</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow mb-3">
                                            <div class="card-body">
                                                <form action= "assets/php/create_user2.php" method="POST">
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="first_name"><strong>First Name</strong></label><input class="form-control" type="text" name="first_name" required=""></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" name="last_name" required=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="National_ID"><strong>National ID</strong></label><input class="form-control" type="text" id="National_ID" name="National_ID" required="" inputmode="numeric"></div>
                                                            <div id="errorID" style="color: red;"></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group"><label for="email"><strong>Email Address</strong></label><input class="form-control" id="changeemail" type="email" required="" name="email"></div>
                                                            <div id="erroremail" style="color: red;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="Password"><strong>Password</strong></label><input class="form-control" type="text" name="password" required=""></div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="first_name"><strong>Gender</strong></label><select class="form-control" name="Gender"><optgroup label="Gender"><option value="M">Male</option><option value="F">Female</option></optgroup></select></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>BirtDate</strong></label><input class="form-control" type="date" name="BirthDate" required=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><button class="btn btn-warning btn-sm" id="reg" type="submit">Create</button></div>
                                                </form>
                                            </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/Members.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/checkinfo.js"></script>
</body>

</html>