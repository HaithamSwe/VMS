<!DOCTYPE html>
<html>

<head>

<?php 
session_start();
if(!isset($_SESSION['National_ID'])){
header("Location: index.php"); 
exit();
}
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>VMS-Edit Profile </title>
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
                <h3 class="text-dark mb-4">Edit Profile</h3>
                <div class="row mb-3">
                    <div class="col-lg-8">
    
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-warning m-0 font-weight-bold">Inforamtion</p>
                                    </div>
                                    <div class="card-body">
                                        <form action= "assets/php/update_user.php" method="POST">
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="first_name"><strong>First Name</strong></label><input class="form-control" type="text" name="first_name" placeholder=<?php echo "\"".$_SESSION['FName']."\""?>></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" name="last_name" placeholder=<?php echo "\"".$_SESSION['LName']."\""?>></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="email"><strong>Email Address</strong></label><input class="form-control" type="email"  id="changeemail"name="email" placeholder=<?php echo "\"".$_SESSION['Email']."\""?>></div>
                                                    <div id="erroremail" style="color: red;"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">

                                                <div class="col">
                                                    <div class="form-group"><label for="last_name"><strong>BirtDate</strong></label><input class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="BirthDate" placeholder=<?php echo "\"".$_SESSION['BirthDate']."\""?>></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><button class="btn btn-warning btn-sm" id="savechange"type="submit">Save Changes</button>
                                        <?php if(isset($_SESSION['msg'])){
                                        echo "<p>".$_SESSION['msg']."</p>";
                                        unset($_SESSION['msg']);
                                    }
                                        ?>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-warning m-0 font-weight-bold">Password</p>
                                    </div>
                                    <div class="card-body">
                                        <form action= "assets/php/update_pass.php" method="POST">
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="password"><strong>New Password</strong></label><input class="form-control changePassword" id="examplePasswordInput" type="password" name="password"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label ><strong>Repeate-New Password</strong></label><input class="form-control changePassword" id="exampleRepeatPasswordInput" type="password" ></div>
                                                </div>
                                                <div id="errorPass" style="color: red;"></div>
                                            </div>
                                            <div class="form-group"><button class="btn btn-warning btn-sm" id="changepass" type="submit" disabled>Change Password</button>
                                            <?php if(isset($_SESSION['msg2'])){
                                        echo "<p>".$_SESSION['msg2']."</p>";
                                        unset($_SESSION['msg2']);
                                    }
                                        ?>
                                        </div>
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