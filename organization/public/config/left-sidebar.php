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
                                <strong class="font-bold">
                                    <?php echo ($_SESSION["staffname"]); ?>
                                </strong>
                                <!-- User position -->
                            </span> <span class="text-muted text-xs block"> Organization <b class="caret"></b></span> </span>
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
                    <i class="fas fa-user"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>

            <!-- Supply Chain Management -->
            <li class="parentd">
                <a href="#">
                    <i class="fas fa-truck"></i>
                    <span class="nav-label">Supply chain management</span><span class="fa arrow"></span>
                </a>
            </li>

            <!-- Risk Management -->
            <li class="parentd">
                <a href="#">
                    <i class="fas fa-bolt"></i>
                    <span class="nav-label">Risk Management</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="na.php">Landing Summary Page</a></li>
                    <li><a href="na.php">Insurance</a></li>
                    <li><a href="na.php">Disaster Analysis</a></li>
                    <li><a href="na.php">Pest/Disease Management</a></li>
                    <li><a href="na.php">Certification</a></li>


                </ul>
            </li>

            <!-- Inventory Management -->
            <li class="parentd">
                <a href="#" data-toggle="tooltip" title="Inventory Management: where we Mage our inventory">
                    <i class="fas fa-university"></i>
                    <span class="nav-label">Inventory management</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="inventorymgmt.php">Landing Summary Page</a></li>
                    <li><a href="tangible-asset.php">Procurement</a></li>
                    <li><a href="productlist.php">Product Management</a></li>
                    <li><a href="warehouselist.php">Ware Housing</a></li>
                    <li><a href="na.php">Input Analysis</a></li>
                    <li><a href="na.php">output</a></li>
                    <li><a href="na.php">Tracking and Report</a></li>

                </ul>
            </li>

            <!-- Monitoring and Evaluation -->
            <li class="parentd">
                <a href="#" class="spec">
                    <i class="fas fa-search"></i>
                    <span class="nav-label">Monitoring and Evaluation</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="na.php">Landing summary</a></li>
                    <li><a href="fpm.php">Field/Pen Management</a></li>
                    <li><a href="na.php">Field Report</a></li>
                    <li><a href="employee-dash.php">Employee Management</a></li>
                    <li><a href="worker-dash.php">Worker Management</a></li>
                    <li><a href="weather-dash.php">Weather</a></li>
                    <li><a href="na.php">Record Management</a></li>

                </ul>
            </li>

            <!-- Financial Management -->
            <li class='parentd'>
                <a href="#" class="spec">
                    <i class="fas fa-money"></i>
                    <span class="nav-label">Financial Management</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">

                    <li><a href="finmgtdash.php">Dashboard</a></li>
                    <li><a href="expenditure.php">Expenditure Log</a></li>
                    <li><a href="income.php">Income Log</a></li>
                    <li><a href="asset.php">Asset</a></li>
                    <li><a href="liability.php">Liability</a></li>
                    <li><a href="budget.php">Budget</a></li>
                    <li><a href="transaction.php">Transactions</a></li>
                    <li><a href="#">Invoices</a></li>
                </ul>
            </li>


            <!-- End investment management -->

            <!-- Wallet -->
            <li>
                <a href="wallet.php">
                    <i class="fas fa-wallet"></i>
                    <span class="nav-label">Wallet</span>
                </a>
            </li>


            <!-- Notifications -->
            <li class="parentd">
                <a href="#" class='spec'><i class="fa fa-edit"></i> <span class="nav-label">Notifications</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li><a href="notification-dash.php">Notification Dashboard</a></li>
                    <li><a href="notification.php">Notification</a></li>
                </ul>
            </li>





            <li class="parentd">
                <a href="#" class='spec'><i class="fa fa-users"></i> <span class="nav-label">Users</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="profile.php">My Profile</a></li>
                    <li><a href="userlist.php">Users list</a></li>
                    <li><a href="deleteduser.php">Deleted Users</a></li>

                </ul>
            </li>

            <li>
                <a href="dashboard.php">
                    <i class="fa fa-star"></i>
                    <span class="nav-label">DUFMA General Dashboard</span>
                </a>
            </li>


        </ul>
    </div>

</nav>
<style>
    @media(min-width:600px) {

        #wrapper>nav>div {
            position: fixed;
        }
    }
</style>
<script>
    let parentds = document.querySelectorAll(".parentd");
    let links = document.querySelectorAll(".parentd > a");
    let links2 = document.querySelectorAll('.parentd2 > a');
    links.forEach((one) => {
        var opened = false;
        one.addEventListener("click", () => {
            parentds.forEach((two) => {
                two.classList.remove('opened');
            })
            if (opened == false) {
                one.parentElement.classList.add('opened');
                opened = true;
            } else {
                one.parentElement.classList.remove('opened');
                opened = false;
            }



        })
    })
    links2.forEach((one) => {
        one.addEventListener("click", () => {
            one.parentElement.classList.toggle("opened");
        })
    })
</script>