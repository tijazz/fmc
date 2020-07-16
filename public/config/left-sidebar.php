<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element open"> <span>
                            <img alt="image" class="img-profile" src="images/<?php echo ($_SESSION["images"]); ?>">
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="true">
                            <!-- User name -->
                            <span class="clear"> <span class="block m-t-xs"> 
                                <strong class="font-bold">
                                    <?php echo ($_SESSION["staffname"]); ?>
                                </strong>
                                <!-- User position -->
                            </span> <span class="text-muted text-xs block">
                                    <?php echo ($_SESSION["category"]); ?> Investor <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li>
                                    Amount Invested: <span style="color:red"><?php echo ($_SESSION["unit_value"]); ?></span>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    Expected ROI: <span style="color:green"><?php echo ($_SESSION["roi"]); ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            <img src="images/logo.png" alt="" style="height:30px;">
                        </div>
                    </li>
                    <li class="active">
                        <a href="index-2.html">
                            <i class="fa fa-dashboard"></i>
                            <span class="nav-label">Dashboard</span> 
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-truck"></i>
                            <span class="nav-label">Supply chain management</span></a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-exclamation-triangle"></i>
                                <span class="nav-label">Risk Management</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="#">
                                <i class="fa fa-home"></i>
                                <span class="nav-label">Inventory management</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="#">
                                <i class="fa fa-search"></i>
                                <span class="nav-label">Monitoring and Evaluation</span> 
                            </a>
                        </li>
                        
                        <li>
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span class="nav-label">Financial Management</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="#">
                                <i class="fa fa-credit-card"></i>
                                <span class="nav-label">Investment Managment</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="transaction.php">
                                <i class="fa fa-star"></i>
                                <span class="nav-label">Transaction</span>  
                            </a>
                        </li>
                        <li class="active">
                    <a class="user__dets" href="#"><i class="fa fa-users"></i> <span class="nav-label">Manage User</span><span id="arrow" class="fa arrow"></span></a>
                    <ul id="user_dets_list" class="nav nav-second-level collapse in" style="display:none;">
                      <li><a href="Profile.php">View Profile</a></li>                        
                      <li><a href="editProfile.php">Edit Profile</a></li>                 
                      <li><a href="notification.php">Notifications</a></li>                  
                      <li><a href="inquiry.php">Send Inquiry</a></li>                   
                      <li><a href="complaints.php">Messages</a></li>     
                    </ul>
                </li>
                        
                        <li>
                            <a href="dashboard.php">
                                <i class="fa fa-bar-chart"></i>
                                <span class="nav-label">DUFMA General Dashboard</span>
                            </a>
                        </li>
                       
                    </ul>
                    
                </div>
            </nav>
            <style>
            /* .arrow{transform:rotate(180deg);} */
            .block{display:block;opacity:1;}
            .rotated{transform:rotate(180deg);}
            </style>
            <script src="public/js/side_bar.js"></script>