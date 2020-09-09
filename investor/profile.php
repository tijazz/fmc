<?php
        session_start();
     
    error_reporting(0);
        include('includes/config.php');
        if(strlen($_SESSION['alogin'])==0)
            {	
        header('location:index.php');
        }
        else{
            ?>

        <!DOCTYPE html>
        <html>


        <?php
        require_once "public/config/header.php";
        ?>

<body>
    <div id="wrapper">
        <?php
        require_once "public/config/left-sidebar.php";
        ?>
            
            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">
            
                <?php
                require_once "public/config/topbar.php";
                ?>
                            
                </div>
                <div class="row  border-bottom white-bg dashboard-header">
                    
                <div class="col-sm-12 col-lg-12">
                        <h2>Profile</h2>
                    </div>
                    <div class="col-sm-12 col-lg-9">
                        <div class="profile_header">
                            <div class="profile_info">
                                <div class="image_circle">
                                  
                                    <img alt="image" class="img-profile" src="images/<?php echo ($_SESSION["images"]); ?>">
                   
                                    <i class="fa fa-pencil"></i>
                                </div>
                                <div class="user_info">
                                    <span><?php echo ($_SESSION["staffname"]); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="bank_set_up">
                            <div class="circle_bank_icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="util">
                                <h3>Bank Set-up</h3>
                                <p>Set up your bank now to enable smoother transactions with us.</p>
                                <a href="#" class="set_bank_btn">Register</a>
                            </div>
                        </div>
                        <div class="other_info">
                            <div class="user_full_info_wrapper">
                                <h3 class="major_header">YOUR INFO</h3>
                                <ul class="user_full_info">
                                    <li><i class="fa fa-envelope"></i><span><?php echo ($_SESSION["email"]); ?> </span></li>
                                    <li><i class="fa fa-list-alt"></i><span>            
                                        <?php echo ($_SESSION["category"]); ?> Investor <b class="caret"></b></span> </span> </a>
                                      </span>
                                    </li>
                                    <li><p><i class="fa fa-building-o"></i>  <i class="fa fa-map-marker"></i></p>
                                        
                                       Number of Unit: <span style="color:red"><?php echo ($_SESSION["unit"]); ?>
                             
                                        </span>
                                    </li>
                                    <li><p><i class="fa fa-building-o"></i>  <i class="fa fa-map-marker"></i></p>
                                        
                                        Amount Invested: <span style="color:red"><?php echo ($_SESSION["unit_value"]); ?>
                             
                                        </span>
                                    </li>
                                    <li><p><i class="fa fa-user"></i>  <i class="fa fa-map-marker"></i></p>
                              
                                    Expected ROI: <span style="color:green"><?php echo ($_SESSION["roi"]); ?></span>
                          
                                    </li>
                                    <li><i class="fa fa-phone"></i>   <span>
                                    <?php echo ($_SESSION["phone"]); ?> 
                                    </span></li>
                                    <li><span class="edit"><a href="editProfile.php"><i class="fa fa-pencil fa-2x"></i></a></span></li>
                                </ul>
                            </div>
                            <div class="access_list">
                                <h3 class="major_header">What you have access to</h3>
                                <ul>
                                    <li>Financial Management<span class="highlight">Open</span></li>
                                    <li>Risk Management<span class="highlight">Register</span></li>
                                    <li>Inventory Management<span class="highlight">Register</span></li>
                                    <li>Investment Management<span class="highlight">Open</span></li>
                                    <li>Supply Chain Management<span class="highlight">Open</span></li>
                                    <li>Monitoring and Evaluation<span class="highlight">Open</span></li>
                                </ul>
                            </div>
                            <div class="accounts_and_profiles">
                                <h3 class="major_header">ACCOUNTS CREATED</h3>
                                <hr>
                                <ul class="accounts">
                                    <li>Dufma General Account<span><i class="fa fa-check-square"></i></span></li>
                                    <li>Sellers Hub/Market Dashboard<span><i class="fa fa-check-square"></i></span></li>
                                    <li>Farm Management Center<span><i class="fa fa-times" style="color:red;"></i></span></li>
                                </ul>
                                <hr>
                                <h3 class="major_header">PROFILES FILLED</h3>
                                <ul class="profiles">
                                    <li>
                                        Training student center <span><i class="fa fa-times" style="color:red;"></i></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        
                    </div>

                        <div class="col-lg-3">
                        <?php
                            require_once "public/config/right-sidebar.php";
                            ?>
                                                
                        </div>
                        
                </div>



                            
                        
                    
                </div>

                
            </div>
            
        </div>
        <?php
                require_once "public/config/footer.php";
                ?>
        
    </body>
    
    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->
    </html>
    
    <?php } ?>