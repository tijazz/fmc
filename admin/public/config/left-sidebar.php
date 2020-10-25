<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element open"> <span>
                        <img alt="image" class="img-profile" src="../images/<?php echo ($_SESSION["alogin"]); ?>">
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="true">
                        <!-- User name -->
                        <span class="clear"> <span class="block m-t-xs">
                                <strong class="font-bold">
                                    <?php echo ($_SESSION["username"]); ?>
                                </strong>
                                <!-- User position -->
                            </span> <span class="text-muted text-xs block">
                                <?php echo ($_SESSION["category"]); ?> Admin </span> </span>
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
                    <img src="../images/logo.png" alt="" style="height:30px;">
                </div>
            </li>
            <li>
                <a href="dashboard.php">
                    <i class="fas fa-user"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>

            <!-- Supply Chain Management -->
            <li class="parentd">
                <a href="organization.php">
                    <i class="fas fa-truck"></i>
                    <span class="nav-label">Organizations</span>
                </a>
            </li>

            <li class="parentd">
                <a href="employees.php">
                    <i class="fas fa-truck"></i>
                    <span class="nav-label">Employees</span>
                </a>
            </li>

            <!-- Risk Management -->
            <li class="parentd">
                <a href="investor.php">
                    <i class="fas fa-bolt"></i>
                    <span class="nav-label">Investors</span>
                </a>
            </li>


            <!-- Wallet -->
            <li>
                <a href="wallet.php">
                    <i class="fas fa-wallet"></i>
                    <span class="nav-label">Wallet</span>
                </a>
            </li>


            <!-- Notifications -->
            <li class="parentd">
                <a href="#" class='spec'><i class="fa fa-edit"></i> <span class="nav-label">Notifications</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li><a href="notification-dash.php">Notification Dashboard</a></li>
                    <li><a href="notification.php">Notification</a></li>
                </ul>
            </li>





            <li class="parentd">
                <a href="#" class='spec'><i class="fa fa-users"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
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