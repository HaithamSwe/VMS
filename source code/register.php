<!DOCTYPE html>
<html class="text-warning" style="background-color: #f6c23e;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>VMS-Create Account</title>
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

<body style="background-color: rgb(246,194,62);">
    <div class="container d-flex justify-content-center">
        <div class="row justify-content-center" style="width: 588px;padding-top: 50px;">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Create an Account!</h4>
                                    </div>
                                    <form class="user" action= "assets/php/create_user.php" method="POST">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="First Name" name="first_name" required=""></div>
                                            <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="exampleLastName" placeholder="Last Name" name="last_name" required=""></div>
                                        </div>
                                        <div class="form-group"><input class="form-control form-control-user" type="text" id="National_ID" required="" aria-describedby="emailHelp" placeholder="National ID" name="National_ID" style="margin-top: 17px;" pattern="^\d{10}$"></div>
                                        <div id="errorID" style="color: red;"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="email" id="email" aria-describedby="emailHelp" placeholder="Email Address" name="email" style="margin-top: 17px;" required=""><div id="erroremail" style="color: red;"></div></div>
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user Password" type="password" id="examplePasswordInput" placeholder="Password" name="password" required=""></div>
                                            <div class="col-sm-6"><input class="form-control form-control-user Password" type="password" id="exampleRepeatPasswordInput" placeholder="Repeat Password"  required=""></div>
                                            <div id="errorPass" style="color: red;"></div>
                                        </div>
                                        <div class="form-group"><label>Gender:</label><select class="form-control" name="Gender" required=""><optgroup label="Gender"><option value="M" selected="">Male</option><option value="F">Female</option></optgroup></select></div>
                                        <div class="form-group"><label>BirthDate</label><input class="form-control" type="date" name="BirthDate" required=""></div><button class="btn btn-warning btn-block text-white btn-user" id="reg" type="submit">Register Account</button>
                                        <hr>
                                        <hr>
                                    </form>
                                    <div class="text-center"></div>
                                    <div class="text-center"><a class="small" href="login.php" style="color: rgb(246,194,62);">Already have an account? Login!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="assets/js/Select-Search.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="assets/js/checkinfo.js"></script>




</body>

</html>