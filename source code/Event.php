<!DOCTYPE html>
<html>

<head>
    <?php
    require('assets/php/connect.php');
    if(isset($_GET["EventID"])){
        $sql="SELECT * FROM Events where Event_ID=".$_GET["EventID"];
        $result = mysqli_query($connection, $sql) or
        die(mysqli_error($connection));
        $result=mysqli_fetch_assoc($result);
    }
    
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
    session_start();
    include_once("assets/php/Header.php");
    ?>
    <div data-aos="slide-up" data-aos-once="true" class="simple-slider" style="padding-top: 0px;">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(assets/img/Events/<?php echo $result["IMG"]?>);"></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="features-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center"><?php echo $result["Name"]?><br></h2>
                <p class="text-center">Description: <?php echo $result["Description"]?>&nbsp;</p>
            </div>
            <div class="row justify-content-center features">
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-map-marker icon"></i>
                        <h3 class="name">Location</h3>
                        <p class="description"><?php echo $result["Location"]?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-clock-o icon"></i>
                        <h3 class="name">Time</h3>
                        <p class="description"><?php echo $result["StartTime"]?>&nbsp;- <?php echo $result["EndTime"]?><br></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-calendar icon"></i>
                        <h3 class="name">Date</h3>
                        <p class="description"><?php echo $result["Date"]?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="icon ion-man icon" style="margin-right: 8px;"></i><i class="icon ion-woman icon" style="margin-left: 8px;"></i>
                        <h3 class="name">Gender</h3>
                        <p class="description">
                        <?php if($result["Gender"]=="M")
                        echo "Males";
                        else if($result["Gender"]=="F")
                        echo "Females";
                        else 
                        echo "Both Males and Females";
                        
                        ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: rgba(58,47,47,0);background-image: url(&quot;assets/img/footer.png&quot;);background-size: cover;background-repeat: no-repeat;height: 254px;background-position: center;">
        <div class="container">
            <h1 class="text-center" style="font-family: ABeeZee, sans-serif;font-size: 46px;color: rgb(0,0,0);padding-top: 23px;">Contact Us</h1>
            <hr style="background-color: #000000;color: rgb(0,0,0);">
            <p class="text-center" style="margin-top:30px;margin-bottom:15px;"><a style="font-size:35px;margin-right:30px;" href="#"><i class="fa fa-facebook-square" style="color: rgb(0,0,0);margin-right: 0px;"></i></a><a style="font-size:35px;margin-right:30px;" href="#"><i class="fa fa-instagram" style="color: rgb(0,0,0);margin-right: 0px;"></i></a>
                <a
                    style="font-size:35px;margin-right:30px;" href="#"><i class="icon ion-social-twitter" style="color: rgb(0,0,0);margin-right: 2px;"></i></a><a style="font-size:35px;margin-right:30px;" href="#"><i class="icon ion-social-snapchat" style="color: rgb(0,0,0);margin-right: 0px;"></i></a><a style="font-size:35px;"
                        href="#"></a></p>
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