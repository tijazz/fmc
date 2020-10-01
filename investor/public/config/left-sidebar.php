<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element open"> <span>
                        <img alt="image" class="img-profile" src="../images/<?php echo ($_SESSION["images"]); ?>">
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="true">
                        <!-- User name -->
                        <span class="clear"> <span class="block m-t-xs">
                                <strong class="font-bold white-hover">
                                    <?php echo ($_SESSION["name"]); ?>
                                </strong>
                                <!-- User position -->
                            </span> <span class="text-muted text-xs block"> Investor <b class="caret"></b></span> </span>
                    </a>
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
                <a href="dashboard.php">
                    <i class="fa fa-dashboard"></i>
                    <span class="nav-label">Dashboard</span>
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

            <li>
                <a href="na.php">
                    <i class="fa fa-star"></i>
                    <span class="nav-label">Investee</span>
                </a>
            </li>

            <li class="active">
                <a class="user__dets" href="#"><i class="fa fa-users"></i> <span class="nav-label">Manage
                        User</span><span id="arrow" class="fa arrow"></span></a>
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
    .white-hover:hover{
        color:#fff !important;
    }
    .block {
        display: block;
        opacity: 1;
    }

    .rotated {
        transform: rotate(180deg);
    }
    .panel svg{
                height:120px;
                width:120px;
            }
            .panel a,.panel a:hover{
                color:rgb(11, 89, 109) !important;
            }
</style>
<script src="public/js/side_bar.js"></script>