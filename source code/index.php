<!DOCTYPE html>
<html>

<head>
<?php
session_start();
require('assets/php/connect.php');

if (isset($_SESSION['National_ID']) && $_SESSION["Role_ID"] == 2)
$sql = "SELECT Events.* from Events,Teams where Events.Team_ID=Teams.Team_ID and Teams.Team_Leader=" .$_SESSION["National_ID"]   . " and Events.Date>= CURDATE() Order by Events.Date LIMIT 0,3";
else if (isset($_SESSION['National_ID']) && $_SESSION["Role_ID"]  == 3)
$sql = "SELECT Events.* from `Events`,Users where `Events`.Team_ID=Users.Team_ID and Users.National_ID=" . $_SESSION["National_ID"] . " and Events.Date>= CURDATE() order by Events.Date LIMIT 0,3";
else
$sql = " SELECT Events.* from Events where Events.Date>= CURDATE() Order BY Events.Date LIMIT 0,3";
    $result = mysqli_query($connection, $sql) or
    die(mysqli_error($connection));
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>VMS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Fixed-navbar-starting-with-transparency-1.css">
    <link rel="stylesheet" href="assets/css/Fixed-navbar-starting-with-transparency.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/gradient-navbar-1.css">
    <link rel="stylesheet" href="assets/css/gradient-navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Important-Highlighted-Event.css">
    <link rel="stylesheet" href="assets/css/Latest-Events.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/Pretty-Search-Form.css">
    <link rel="stylesheet" href="assets/css/Responsive-footer-1.css">
    <link rel="stylesheet" href="assets/css/Responsive-footer.css">
    <link rel="stylesheet" href="assets/css/Search-Field-With-Icon.css">
    <link rel="stylesheet" href="assets/css/Search-Input-responsive.css">
    <link rel="stylesheet" href="assets/css/Select-Search.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php 
    
    include_once("assets/php/Header.php");
    ?>
    <div data-aos="slide-up" data-aos-once="true" class="simple-slider" style="padding-top: 0px;">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url(assets/img/EQPf2rvW4AE12Um.jpg);background-size: cover;"></div>
                <div class="swiper-slide" style="background-image:url(assets/img/EQWW8d9W4AIBtOd.jpg);"></div>
                <div class="swiper-slide" style="background-image:url(assets/img/EQPxh_TXkAAjHDx.jpg);"></div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <div></div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center" style="padding: 34px;">What is&nbsp;<span class="text-danger">V</span>MS ?</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 order-1">
                    <p class="text-break text-center text-dark" style="color: rgb(0,0,0);font-size: 20px;"><br><strong>VMS</strong><br>A volunteering management system that Groups all the volunteering teams under one place and help them to manage their teams in scheduling Events,taking attendance and&nbsp;many other features <br><br><br><br><br><br></p>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 d-flex justify-content-center align-items-center order-2 justify-content-md-center">
                    <img src="assets/img/28.width-600.jpg" alt="VMS"></div>
            </div>
        </div>
    </div>
    <div class="blog-home2 py-5">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <!-- Column -->
                <div class="col-md-8 text-center">
                    <h3 class="my-3">Upcoming Voluntary Events</h3>

                </div>
                <!-- Column -->
                <!-- Column -->
            </div>
            <div class="row mt-4">
                <!-- Column -->
                <?php foreach($result as $rec):?>
                <div class="col-md-4 on-hover">
                <div class="card border-0 mb-4">
                <?php echo "<a href=\"Event.php?EventID=".$rec["Event_ID"]."\"><img height=\"250px\" class=\"card-img-top\" src=\"assets/img/Events/".$rec["IMG"]."\" alt=\"".$rec["Name"]."\"></a>";?>
                <?php echo "<h5 class=\"font-weight-medium mt-3\"><a href=\"Event.php?EventID=".$rec["Event_ID"]."\" class=\"text-decoration-none link\">".$rec["Name"]."</a></h5>";?>
                <?php echo "<a href=\"Event.php?EventID=".$rec["Event_ID"]."\" class=\"text-decoration-none linking text-themecolor mt-2\">Learn More</a>";?>
                </div>
                </div>
                <?php endforeach;?>
                





            </div>
        </div>
    </div>
    <div style="background-color: rgba(58,47,47,0);background-image: url(&quot;assets/img/footer.png&quot;);background-size: cover;background-repeat: no-repeat;height: 254px;background-position: center;">
        <div class="container">
            <h1 class="text-center" style="font-family: ABeeZee, sans-serif;font-size: 46px;color: rgb(0,0,0);padding-top: 23px;">Contact Us</h1>
            <hr style="background-color: #000000;color: rgb(0,0,0);">
            <p class="text-center" style="margin-top:30px;margin-bottom:15px;"><a style="font-size:35px;margin-right:30px;" href="#"><i class="fa fa-facebook-square" style="color: rgb(0,0,0);margin-right: 0px;"></i></a><a style="font-size:35px;margin-right:30px;" href="#"><i class="fa fa-instagram" style="color: rgb(0,0,0);margin-right: 0px;"></i></a>
                <a style="font-size:35px;margin-right:30px;" href="#"><i class="icon ion-social-twitter" style="color: rgb(0,0,0);margin-right: 2px;"></i></a><a style="font-size:35px;margin-right:30px;" href="#"><i class="icon ion-social-snapchat" style="color: rgb(0,0,0);margin-right: 0px;"></i></a>
                <a style="font-size:35px;" href="#"></a>
            </p>
            <p class="text-center" style="color: rgb(0,0,0);font-family: ABeeZee, sans-serif;margin-bottom: 23px;">Copyright © VMS 2020<br></p>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Fixed-navbar-starting-with-transparency.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Select-Search.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>