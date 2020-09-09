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
                <div class="panel-heading"><h2 class="page-title">Notification Dashboard</h2></div>
				</div>
            <div class="row">
                       
                <div class="col-lg-12">

                    <h2 class="page-title"></h2>

                  <!-- Zero Configuration Table -->
						<div class="panel panel-default" style="background:#b3f3e677;border-radius:5px;box-shadow:1px 1px 4px 2px rgba(110, 104, 104, 0.335);">
							<div class="panel-heading">View Panel</div>
							<div class="panel-body">
								<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
								else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
                                                                    
                                                                    <div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
														<?php 
														$sql ="SELECT id from member";
														$query = $dbh -> prepare($sql);
														$query->execute();
														$results=$query->fetchAll(PDO::FETCH_OBJ);
														$bg=$query->rowCount();
														?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($bg);?></div>
													<div class="stat-panel-title text-uppercase">Total Users</div>
												</div>
											</div>
											<a href="userlist.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">

															<?php 
															$reciver = 'Admin';
															$sql1 ="SELECT id from feedback where reciver = (:reciver)";
															$query1 = $dbh -> prepare($sql1);;
															$query1-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
															$query1->execute();
															$results1=$query1->fetchAll(PDO::FETCH_OBJ);
															$regbd=$query1->rowCount();
															?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?></div>
													<div class="stat-panel-title text-uppercase">Feedback Messages</div>
												</div>
											</div>
											<a href="feedback.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">

														<?php 
														$reciver = 'Admin';
														$sql12 ="SELECT id from notification where notireciver = (:reciver)";
														$query12 = $dbh -> prepare($sql12);;
														$query12-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
														$query12->execute();
														$results12=$query12->fetchAll(PDO::FETCH_OBJ);
														$regbd2=$query12->rowCount();
														?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd2);?></div>
													<div class="stat-panel-title text-uppercase">Notifications</div>
												</div>
											</div>
											<a href="notification.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
												<?php 
													$sql6 ="SELECT id from deleteduser ";
													$query6 = $dbh -> prepare($sql6);;
													$query6->execute();
													$results6=$query6->fetchAll(PDO::FETCH_OBJ);
													$query=$query6->rowCount();
													?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">Deleted Users</div>
												</div>
											</div>
											<a href="deleteduser.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
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
		
		   #page-wrapper > div:nth-child(3) > div > div > div.panel-body > div > div > div > a:hover{
			   color:#fff;
		   }
	   </style>
        <?php
                require_once "public/config/footer.php";
                ?>

    </body>
    
    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->
    </html>
    
    <?php } ?>