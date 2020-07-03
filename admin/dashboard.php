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
                        <h2 class="FMS-title">Farm Management Services</h2>

                       
                        <div class="col-12 services">

                            <!-- fms-1st col -->
                            <div class="col-sm-6 col-md-6 col-lg-12">

                              <div class="card-body risk_management">
                                <h5 class="card-title rm-title">Risk management</h5>
                                <hr>
                                <p class="card-text rm-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                              </div>

                                <div class="card-body inventory_management">
                                <h5 class="card-title in-title">Inventory_management</h5>
                                <hr>
                                <p class="card-text in-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                              </div>

                                <div class="card-body fin_management">
                                <h5 class="card-title fin-title">Financial_management</h5>
                                <hr>
                                <div class="fin-context">
                                <h3>Current savings:</h3>
                                <h1 style="margin-bottom: 3.5rem;">&#8358;<?php echo ($_SESSION["unit_value"]); ?>.00</h1>
                                <a href="" class="fm_btn">Analyze Finances</a>
                                </div>
                              </div>
                            </div>
                            <!-- fms 1st col -->

                            <!-- fms 2nd col -->
                            <div class="col-sm-6 col-md-6 col-lg-12">
                                <div class="card-body supply_chain_management">
                                    <h5 class="card-title scm-title">Supply Chain management</h5>
                                    <hr>
                                    <div class="context scm-context">
                                        <p>Your requested goods are at Sagamu,Lagos.</p>
                                        <a href="" class="check_location">Check Location</a>
                                        <h4 class="map">Mini Map</h4>
                                    </div>
                                </div>    

                                <div class="card-body monitoring_eval">
                                 <h5 class="card-title me-title">Monitoring management</h5>
                                <hr>
                                    <p class="card-text me-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                              </div>

                            <div class="investment_management">
                                <h5 class="card-title invest-title">Investment management</h5>
                                <hr>
                                <div class="context invest-context">
                                    <h3>Ongoing investments</h3>
                                    <ul class="invest-list">
                                        <!-- <li class="invest-list-items">Sherry Farms Investment</li>
                                        <li class="invest-list-items">Maira livestock Investment</li>
                                        <li class="invest-list-items">Guided Investment</li> -->
                                    </ul>
                                <a href="" class="im_btn">View investments</a>
                                </div>
                            </div>

                            </div>
                            <!-- fms 2nd col -->

                        <div class="col-lg-12">
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