<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars" style="color: rgb(243,194,62);"></i></button>
                    <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="Search.php" method="GET">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" name="search" placeholder="Search for Event">
                                <div   class="input-group-append"><button  class="btn btn-warning py-0" type="submit"><i style="padding-top: 8px;"  class="fas fa-search"></i></button></div>
                            </div>
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a  class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100"  action="Search.php" method="GET">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" name="search" placeholder="Search for Event">
                                            <div  class="input-group-append"><button  class="btn btn-warning py-0" type="submit"><i  class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation"></li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo $_SESSION['FName']." ".$_SESSION['LName']; ?></span><i class="fa fa-user"></i></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"
                                        role="menu"><a class="dropdown-item" role="presentation" href="Editprofile.php"><i class="fas fa-pencil-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Edit Profile</a><a class="dropdown-item" role="presentation" href="assets/php/logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                                        
                                </div>
                                
                            </li>
                        </ul>
                    </div>
                </nav>