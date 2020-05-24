<nav class="navbar navbar-dark navbar-expand-md navigation-clean-button" style="padding-top: 0px;padding-bottom: 0px;background-color: rgb(246,194,62);">
        <div class="container"><a class="navbar-brand" href="index.php" style="color: rgb(255,255,255);">VMS</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" style="color: rgb(255,255,255);" href="Events.php">Events</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Search.php" style="color: rgb(255,255,255);">Search<i class="fa fa-search" style="padding-left: 4px;"></i></a></li>
                </ul>
                <?php  if (!isset($_SESSION['National_ID'])):?>
                <div class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(255,255,255);">Account</a>
                    <div class="dropdown-menu text-warning" role="menu" style="color: rgb(243,194,62);"><a class="dropdown-item" role="presentation" href="login.php" style="color: rgb(255,255,255);background-color: #f3c23e;">Login</a><a class="dropdown-item" role="presentation" href="register.php" style="background-color: #f3c23e;">register<br></a></div>
                </div>
                <?php else:?>
                    <span class="navbar-text actions" style="padding-top: 8px;"> <a class="btn btn-light action-button" role="button" href="Dash.php" style="background-color: rgb(0,0,0);">DashBoard</a></span>
                <?php endif;?>
            </div>
        </div>
</nav>