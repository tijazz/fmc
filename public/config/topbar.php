                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#" id='slide_left_btn'><i class="fa fa-bars"></i> </a>
                            
                            <form role="search" class="navbar-form-custom" action="http://webapplayers.com/  inspinia_admin-v2.6.1/search_results.html">
                            </form>
                            
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <span class="m-r-sm text-muted welcome-message">Welcome 
                                    <?php echo ($_SESSION["alogin"]); ?></span>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                    <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                                </a>
                                <ul class="dropdown-menu dropdown-messages">
                                    <li>
                                        <div class="dropdown-messages-box">
                                            <a href="profile.html" class="pull-left">
                                                <img alt="image" class="img-circle" src="public/images/farm.jpg">
                                            </a>
                                            <div class="media-body">
                                                <small class="pull-right">46h ago</small>
                                                <strong>Your Farm humidity level</strong> has risen <strong>past 70%</strong>. <br>
                                                <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="dropdown-messages-box">
                                            <a href="profile.html" class="pull-left">
                                                <img alt="image" class="img-circle" src="public/images/farm.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right text-navy">5h ago</small>
                                                <strong>Your Investment will soon be due</strong> with <strong>Beca Farms Limited</strong>. <br>
                                                <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="dropdown-messages-box">
                                            <a href="profile.html" class="pull-left">
                                                <img alt="image" class="img-circle" src="public/images/farm.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right">23h ago</small>
                                                <strong>You have been assigned to a</strong> new supervisor <strong>Mr Adesesan</strong>. <br>
                                                <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="text-center link-block">
                                            <a href="mailbox.html">
                                                <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                    <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                                </a>
                                <ul class="dropdown-menu dropdown-alerts">
                                    <li>
                                        <a href="mailbox.html">
                                            <div>
                                                <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="profile.html">
                                            <div>
                                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                                <span class="pull-right text-muted small">12 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="grid_options.html">
                                            <div>
                                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="text-center link-block">
                                            <a href="notifications.html">
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            
                            <!-- setting  -->
                            <li>
                                <a class="right-sidebar-toggle">
                                    <i class="fa fa-cog"></i>
                                </a>
                            </li>
                            <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                        </ul>
                        
                    </nav>

                    <!-- Temporary fix to the navbar issue -->
                    <script>

                        let navTriggerBtn = document.getElementById('slide_left_btn');
                        let BigLeftNav = document.querySelector("#wrapper > nav");
                        let pageWrapper = document.querySelector('#page-wrapper');
                        if(window.innerWidth > 763){
                        navTriggerBtn.addEventListener('click',() => {
                            BigLeftNav.classList.toggle('slide_in_navbar');
                            pageWrapper.classList.toggle('_margin_left');
                        })}
                        else if(window.innerWidth < 763 ){
                            navTriggerBtn.addEventListener('click',() => {
                            BigLeftNav.classList.toggle('slide_in_navbar');
                            BigLeftNav.classList.toggle('navbar_small');
                            // pageWrapper.classList.toggle('no_margin_left_small_screens');
                            navTriggerBtn.classList.toggle('right_btn');
                        })}
                        
                    </script>
                    <style>
                    /* initally  */
                    #wrapper > nav{
                        margin-left:-500px;
                        display:block;
                    }

                    #page-wrapper{
                        margin-left:0;
                    }
                    #wrapper > nav > div{
                        width:250px;
                    }
                    /* end initially */

                        /* styles for big screens */
                        .slide_in_navbar{
                            margin-left:0 !important;
                            transition:0.4s ease-in-out;
                            display:block;
                        }
                        ._margin_left{
                            margin-left:250px !important;
                        }
                        /* end styles for huge screens */
                       
                        /* styles for small screens */
                        .right_btn{
                            position:absolute;
                            right:1rem;
                        }
                        
                        .navbar_small{
                            margin-left:0;
                            /* z-index:1000; */
                            width:250px !important;
                            display:block !important;
                            background-color:#2f4050;
                        }
                    </style>