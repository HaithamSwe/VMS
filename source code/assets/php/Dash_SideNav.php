<nav class="navbar navbar-dark bg-warning align-items-start sidebar sidebar-dark accordion bg-gradient-Warning p-0 toggled" id="Nav">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>VMS</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="Dash.php"><i class="fas fa-tachometer-alt" style="color: rgb(0,0,0);font-size: 20px;"></i><span>Dashboard</span></a></li>
                    <?php if ($_SESSION['Role_ID']==1 || $_SESSION['Role_ID']==2):?>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Manage_Members.php"><i class="fa fa-group" style="color: #000000;font-size: 20px;"></i><span>Manage Members</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Manage_Events.php"><i class="fas fa-calendar-alt" style="font-size: 20px;color: #000000;"></i><span>Manage Events</span></a></li>
                    <?php else:?>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="Events.php"><i class="fas fa-calendar-alt" style="font-size: 20px;color: #000000;"></i><span>Events</span></a></li>    
                    <?php endif;?>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>