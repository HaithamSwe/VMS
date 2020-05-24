<!DOCTYPE html>
<html>

<head>
<?php
session_start();
if(isset($_SESSION['National_ID'])){
echo "<p id='NationalID' hidden>" . $_SESSION['National_ID'] . "</p>";
echo "<p id='RoleID' hidden>" . $_SESSION['Role_ID'] . "</p>";
echo "<p id='gender' hidden>". $_SESSION['Gender'] ."</p>";
echo "<p id='Status' hidden>". $_SESSION['Status'] ."</p>";
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
    <div>
    <?php 
    include_once("assets/php/Header.php");
    ?>
    <section id="Board" style="padding-top: 30px;padding-bottom: 30px;">
        <div class="container-fluid">
            <h3 class="text-dark mb-4">Search</h3>
            <div class="search-container"><input type="text" class="search-input" id="search1" name="search-bar" placeholder="Enter Event Name"
            <?php if (isset($_GET["search"]))
            echo "value=\"".$_GET["search"]."\"";
            ?>
            
            
            ><button class="btn btn-light search-btn" onclick="UpdateTable()" type="button"> <i class="fa fa-search"></i></button></a></div>
        </div>
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header py-3">
                

                </div>
                <div class="card-body">
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <?php if (isset($_GET["search"])){
                    include_once("assets/php/Event_Table.php");
                }
                    ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
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
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Fixed-navbar-starting-with-transparency.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Applications.js"></script>
    <script src="assets/js/Select-Search.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>