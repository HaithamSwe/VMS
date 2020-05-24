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
    $sql = "SELECT * FROM Events where Event_ID=" . $_GET["Event_ID"];

    $Event = mysqli_fetch_assoc(mysqli_query($connection, $sql)) or
        die(mysqli_error($connection));
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>VMS-Edit Event </title>
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
                    <h3 class="text-dark mb-4">Edit Event</h3>
                    <div class="row mb-3">
                        <div class="col-lg-8">

                            <div class="row">
                            <div class="col">
                                        <div class="card shadow mb-3">
                                            <div class="card-body">
                                                <form action="assets/php/update_event.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="first_name"><strong>Event Name</strong><br></label><input class="form-control" type="text" name="Name" placeholder=<?php echo "\"".$Event['Name']."\""?>></div>
                                                            <input name="Event_ID" type="text" hidden value=<?php echo "\"".$_GET["Event_ID"]."\""; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="email"><strong>Description</strong><br></label><textarea class="form-control" name="Description" placeholder=<?php echo "\"".$Event['Description']."\""?>></textarea></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="first_name"><strong>Gender</strong></label><select class="form-control" name="Gender" ><optgroup label="Gender">
                                                                <option value="M"  <?php if($Event['Gender']=="M") echo"selected";?> >Male</option>
                                                                <option value="F" <?php if($Event['Gender']=="F") echo"selected";?>>Female</option>
                                                                <option value="B" <?php if($Event['Gender']=="B") echo"selected";?>>Both</option>
                                                            </optgroup></select></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group"><label for="first_name"><strong>Capacity</strong><br></label><input class="form-control" type="number" min="0" step="1" name="Capacity" placeholder=<?php echo "\"".$Event['Capacity']."\""?>></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>Date</strong></label><input class="form-control" type="text" name="Date" onfocus="(this.type='date')" onblur="(this.type='text')"  placeholder=<?php echo "\"".$Event['Date']."\""?>></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group"><label for="first_name"><strong>Location</strong><br></label><input class="form-control" type="text" name="Location" placeholder=<?php echo "\"".$Event['Location']."\""?>></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>Start Time</strong></label><input class="form-control" type="text" onfocus="(this.type='time')" onblur="(this.type='text')" name="StartTime" placeholder=<?php echo "\"".$Event['StartTime']."\""?>></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>End Time</strong></label><input class="form-control" type="text" onfocus="(this.type='time')" onblur="(this.type='text')" name="EndTime" placeholder=<?php echo "\"".$Event['EndTime']."\""?>></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="last_name"><strong>Event Image:&nbsp;</strong></label><input type="file" name="IMG"  accept="image/*"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><button class="btn btn-warning btn-sm" type="submit">Save Changes</button></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/checkinfo.js"></script>
</body>

</html>