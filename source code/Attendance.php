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
    if (isset($_GET["EventID"])) {
        $sql = "SELECT * FROM Events where Event_ID=" . $_GET["EventID"];
        $result = mysqli_query($connection, $sql) or
            die(mysqli_error($connection));
        $result = mysqli_fetch_assoc($result);
    }


    ?>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Attendance - VMS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min2.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
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
                    <h3 class="text-dark mb-4"><?php echo $result["Name"] ?> &nbsp;Attendance<br></h3>
                    <div class="card shadow" style="max-width: 584px;">
                        <div class="card-header py-3">
                            <p class="text-warning m-0 font-weight-bold">Attendance List</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col offset-0"><label>Select Member<select id="Memberselection"style="margin-left: 10px;height: 38px;">
                                        </select></label><button class="btn btn-primary" type="button" style="margin-left: 10px;" <?php echo "onclick=\"addtoList(".$_GET["EventID"].")\"";?>>Add</button></div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
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
                    <h4>Modal Title</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <p class="text-center text-muted">Description </p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" data-dismiss="modal" type="button">Close</button><button class="btn btn-primary" type="button">Save</button></div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/Attendance.js"></script>
    <script>$(document).ready(function () {
    UpdateList(<?php echo $_GET["EventID"];?>);
    UpdateSelection(<?php echo $_GET["EventID"];?>);
});</script>
</body>

</html>