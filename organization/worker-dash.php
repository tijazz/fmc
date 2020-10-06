<?php
        session_start();    
        error_reporting(0);
        $error="";
        $msg="";
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
                <div class="panel-heading">
                    <h2 class="page-title">Workers</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">

                    <h2 class="page-title"></h2>

                    <!-- Zero Configuration Table -->
                    <div class="panel panel-default"
                        style="background:#b3f3e677;border-radius:5px;box-shadow:1px 1px 4px 2px rgba(110, 104, 104, 0.335);">
                        <div class="panel-heading">View Panel</div>
                        <div class="panel-body">
                            <?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?>
                            </div><?php } 
								else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body bk-primary text-light">
                                            <div class="stat-panel text-center">
                                               <img src="public/images/icons8-conference-50.png" alt="">
                                                <div class="stat-panel-number h1 "></div>
                                                <div class="stat-panel-title text-uppercase">Workers List</div>
                                            </div>
                                        </div>
                                        <a href="worker.php" class="block-anchor panel-footer text-center">Full
                                            Detail <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body bk-success text-light">
                                            <div class="stat-panel text-center">
                                                    <img src="public/images/icons8-business-building-50.png" alt="">
                                                <div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?>
                                                </div>
                                                <div class="stat-panel-title text-uppercase">Worker Appraisal</div>
                                            </div>
                                        </div>
                                        <a href="workerappraisal.php" class="block-anchor panel-footer text-center">Full
                                            Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>

                                
                                



                            </div>

                        </div>
                    </div>

                </div>

                <!---
                <div class="col-lg-4">
                        <?php
               // require_once "public/config/right-sidebar.php";
                ?>
					 </div>
		-->
            </div>

        </div>


    </div>

    </div>
    <style>
    #page-wrapper>div:nth-child(3)>div>div>div.panel-body>div>div>div>a:hover {
        color: #fff;
    }
    </style>
    <?php
                require_once "public/config/footer.php";
                ?>

</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

</html>

<?php } ?>