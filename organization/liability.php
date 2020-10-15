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
                <div class="panel-heading"><h2 class="page-title">TANGIBLE ASSETS</h2></div>
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
                                                <svg id="Layer_2" height="128" viewBox="0 0 128 128" width="128" xmlns="http://www.w3.org/2000/svg" data-name="Layer 2"><path d="m59.2 100.6h-36.318a7.332 7.332 0 1 0 0 3.5h36.318a7.332 7.332 0 1 0 0-3.5zm-43.43 5.582a3.832 3.832 0 1 1 3.831-3.832 3.836 3.836 0 0 1 -3.83 3.837zm50.542-7.663a3.832 3.832 0 1 1 -3.832 3.832 3.836 3.836 0 0 1 3.832-3.828z"/><path d="m126.25 9.88h-58.56a1.813 1.813 0 0 0 -1.26.52l-14.41 14.41a1.8 1.8 0 0 0 -.52 1.26v11.55h-10.46a1.752 1.752 0 0 0 -1.4.7l-10.02 13.28h-21.54a1.746 1.746 0 0 0 -1.75 1.75v22.42a1.752 1.752 0 0 0 1.75 1.75h15.69v9.06h-8a15.77 15.77 0 1 0 0 31.54h50.54a15.77 15.77 0 1 0 0-31.54h-7.99v-9.06h15.68a1.752 1.752 0 0 0 1.75-1.75v-36.39a1.754 1.754 0 0 0 -1.75-1.76h-9v-6.7l7.55-7.54h41.95v57.66h-15.92v-.79a7.757 7.757 0 0 0 -7.75-7.75h-.33a1.746 1.746 0 0 0 -1.75 1.75v8.54a1.854 1.854 0 0 0 .24.89l10 17a1.767 1.767 0 0 0 1.51.86h25.75a1.746 1.746 0 0 0 1.75-1.75v-88.17a1.743 1.743 0 0 0 -1.75-1.74zm-71.25 18.79 6.5 2.7v6.25h-6.5zm11.31 61.41a12.27 12.27 0 1 1 0 24.54h-6.8v-4.45a1.75 1.75 0 0 0 -3.5 0v4.45h-4.86v-4.45a1.75 1.75 0 0 0 -3.5 0v4.45h-4.86v-4.45a1.75 1.75 0 0 0 -3.5 0v4.45h-4.86v-4.45a1.75 1.75 0 0 0 -3.5 0v4.45h-4.86v-4.45a1.75 1.75 0 1 0 -3.5 0v4.45h-6.8a12.27 12.27 0 1 1 0-24.54h8v4.01a1.75 1.75 0 0 0 3.5 0v-4.01h4.26v4.01a1.75 1.75 0 1 0 3.5 0v-4.01h4.26v4.01a1.75 1.75 0 0 0 3.5 0v-4.01h4.26v4.01a1.75 1.75 0 0 0 3.5 0v-4.01h4.27v4.01a1.75 1.75 0 0 0 3.5 0v-4.01zm-39.04-3.5v-9.06h27.55v9.06zm44.98-22.94h-24.89v-12.14h24.89zm0-22.52v6.88h-26.64a1.752 1.752 0 0 0 -1.75 1.75v15.64a1.752 1.752 0 0 0 1.75 1.75h26.64v6.88h-62.42v-7.32h22.6a1.75 1.75 0 0 0 0-3.5h-22.6v-8.1h20.66a1.772 1.772 0 0 0 1.4-.69l10.02-13.29zm-9.41-12.99-6.5-2.69 10.72-10.73 2.7 6.5zm10.15-8.25-2.69-6.5h44.2v6.5zm19.26 56.36a4.259 4.259 0 0 1 2.83 4.01v.79h-2.83zm32.25 21.8h-23l-2.94-5h11.27a1.75 1.75 0 0 0 0-3.5h-13.33l-2.94-5h30.94zm0-17h-6.5v-57.66h6.5zm0-61.16h-6.5v-6.5h6.5z"/></svg>
													<div class="stat-panel-number h1 "></div>
													<div class="stat-panel-title text-uppercase">Liability</div>
												</div>
											</div>
											<a href="liabilitylist.php" class="block-anchor panel-footer text-center">Full Detail <i class="fa fa-arrow-right"></i></a>
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