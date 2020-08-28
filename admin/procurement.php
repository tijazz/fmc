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
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
                                                <svg id="Layer_1_1_" enable-background="new 0 0 64 64" height="128" viewBox="0 0 64 64" width="128" xmlns="http://www.w3.org/2000/svg"><path d="m4 62h6c1.103 0 2-.897 2-2v-2h22.606c5.024 0 9.933-1.408 14.193-4.07 6.423-4.015 10.862-10.596 12.179-18.056l.434-2.458c.194-1.098-.105-2.218-.822-3.072s-1.768-1.344-2.883-1.344c-.609 0-1.189.151-1.707.415v-4.415h1c.404 0 .77-.244.924-.617.155-.374.069-.804-.217-1.09l-8-8c-.391-.391-1.023-.391-1.414 0l-2.293 2.293v-13.586c0-.552-.447-1-1-1h-10c-.553 0-1 .448-1 1v11h-4.052c-.761-1.674-1.324-2.653-1.776-3.221l2.527-6.176c.281-.675.117-1.434-.418-1.933-.535-.5-1.304-.609-1.957-.283l-1.891.945-1.191-1.588c-.301-.402-.761-.654-1.262-.69-.502-.037-.993.146-1.352.503l-1.521 1.52-.999-1.333c-.302-.403-.762-.654-1.264-.69-.501-.037-.994.147-1.35.503l-1.919 1.919-2.884-.824c-.677-.194-1.392.036-1.829.583-.438.547-.505 1.298-.17 1.911l3.024 5.583c-2.123 1.918-4.716 7.307-4.716 12.204v3.067c0 3.309 2.691 6 6 6h11 9 8 10.382l-2.112 4.225-5.499 2.357c-.617-2.063-2.51-3.582-4.771-3.582h-14.397c-5.204 0-10.211 1.434-14.603 4.146v-2.146c0-1.103-.897-2-2-2h-6c-1.103 0-2 .897-2 2v22c0 1.103.897 2 2 2zm11.177-55.557c.605.173 1.258.005 1.702-.441l1.813-1.813 1 1.335c.303.402.764.654 1.266.689.508.033.992-.149 1.347-.504l1.521-1.52 1.141 1.52c.501.672 1.409.888 2.162.512l1.455-.728-2.256 5.507h-2.71l1.276-2.553-1.789-.895-1.723 3.448h-1.753l-1.394-2.9-1.803.867.977 2.033h-1.814l-2.843-5.25zm9.823 9.557v15h-10c-2.206 0-4-1.794-4-4v-3.067c0-5.353 3.313-10.345 4.261-10.933h11.327c.162.196.529.722 1.15 2h-1.738c-.553 0-1 .448-1 1zm2 1h7v14h-7zm22 .414 5.586 5.586h-11.172zm-13-12.414h8v14.586l-3.707 3.707c-.286.286-.372.716-.217 1.09.154.373.52.617.924.617h1v6h-6zm8 20h10v6h-2v-4c0-.552-.447-1-1-1h-4c-.553 0-1 .448-1 1v4h-2zm6 6h-2v-3h2zm-23.397 7h14.397c1.654 0 3 1.346 3 3s-1.346 3-3 3h-16v2h16c2.521 0 4.591-1.882 4.93-4.311l6.463-2.77c.218-.093.396-.26.501-.472l3.236-6.473c.302-.601.905-.974 1.577-.974.522 0 1.015.229 1.351.63s.477.925.386 1.439l-.434 2.458c-1.219 6.903-5.326 12.992-11.271 16.707-3.942 2.464-8.483 3.766-13.133 3.766h-22.606v-13.462c4.319-2.962 9.353-4.538 14.603-4.538zm-22.603 0h6l.001 22h-6.001z"/><path d="m6 41h2v3h-2z"/><path d="m38 7h1v2h-1z"/><path d="m41 7h1v2h-1z"/><path d="m38 11h1v2h-1z"/><path d="m41 11h1v2h-1z"/><path d="m38 15h1v2h-1z"/><path d="m41 15h1v2h-1z"/><path d="m29 19h1v2h-1z"/><path d="m32 19h1v2h-1z"/><path d="m29 23h1v2h-1z"/><path d="m32 23h1v2h-1z"/><path d="m29 27h1v2h-1z"/><path d="m32 27h1v2h-1z"/><path d="m38 19h1v2h-1z"/><path d="m41 19h1v2h-1z"/><path d="m22 18h-1v-1h-2v1h-1c-.553 0-1 .448-1 1v3c0 .552.447 1 1 1h3v1h-4v1c0 .552.447 1 1 1h1v1h2v-1h1c.553 0 1-.448 1-1v-3c0-.552-.447-1-1-1h-3v-1h4v-1c0-.552-.447-1-1-1z"/><path d="m53 4h2v2h-2z"/><path d="m55 2h2v2h-2z"/><path d="m57 4h2v2h-2z"/><path d="m55 6h2v2h-2z"/><path d="m60 9h2v2h-2z"/><path d="m53 12h2v2h-2z"/><path d="m2 11h2v2h-2z"/><path d="m4 9h2v2h-2z"/><path d="m6 11h2v2h-2z"/><path d="m4 13h2v2h-2z"/><path d="m2 19h2v2h-2z"/><path d="m6 2h2v2h-2z"/></svg>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">Tangible Asset</div>
												</div>
											</div>
											<a href="tangible-asset.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
                                                <svg id="_x33_0" enable-background="new 0 0 64 64" height="128" viewBox="0 0 64 64" width="128" xmlns="http://www.w3.org/2000/svg"><g><path d="m33 29h2v6h-2z"/><path d="m37 29h2v6h-2z"/><path d="m37 57c0 2.206-1.794 4-4 4h-26c-2.206 0-4-1.794-4-4v-46c0-2.206 1.794-4 4-4h4v2h-4c-1.103 0-2 .897-2 2v46c0 1.103.897 2 2 2h26c1.103 0 2-.897 2-2v-8h-2v8h-26v-4h4v-1.584c0-1.121.669-2.122 1.753-2.57 1.047-.436 2.233-.203 3.025.589l1.12 1.123 5.658-5.658-1.12-1.12c-.794-.794-1.026-1.982-.57-3.074.428-1.037 1.428-1.706 2.55-1.706h1.584v-8h-1.584c-1.121 0-2.122-.669-2.57-1.753-.436-1.044-.204-2.232.589-3.025l1.122-1.121-5.658-5.658-1.119 1.122c-.793.794-1.982 1.024-3.074.57-1.037-.429-1.706-1.43-1.706-2.551v-1.584h-4v-6h4c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2h4v4h2v-4c0-1.103-.897-2-2-2h-4v-2h4c2.206 0 4 1.794 4 4v4h2v-4c0-3.309-2.691-6-6-6h-8v-2c0-1.103-.897-2-2-2h-6c-1.103 0-2 .897-2 2v2h-8c-3.309 0-6 2.691-6 6v46c0 3.309 2.691 6 6 6h26c3.309 0 6-2.691 6-6v-8h-2zm-30-26c2.206 0 4 1.794 4 4s-1.794 4-4 4zm0 10c3.309 0 6-2.691 6-6s-2.691-6-6-6v-2c4.411 0 8 3.589 8 8s-3.589 8-8 8zm2.018-22c.152 1.762 1.269 3.298 2.966 4 1.665.694 3.545.399 4.903-.74l2.853 2.854c-1.14 1.357-1.434 3.241-.723 4.945.685 1.657 2.22 2.771 3.982 2.924v4.035c-1.763.152-3.299 1.27-4 2.966-.695 1.665-.4 3.546.741 4.903l-2.854 2.854c-1.356-1.139-3.24-1.433-4.947-.723-1.655.685-2.769 2.22-2.921 3.982h-2.018v-6c5.514 0 10-4.486 10-10s-4.486-10-10-10v-6zm7.982-12v-4h6v4h4v4h-14v-4z"/><path d="m27 19h26v-2.079l7.256 5.079-7.256 5.079v-2.079h-26v2h24v3.921l12.744-8.921-12.744-8.921v3.921h-24z"/><path d="m29 21h2v2h-2z"/><path d="m35 21h2v2h-2z"/><path d="m41 21h2v2h-2z"/><path d="m51 37h-24v2h26v-2.079l7.256 5.079-7.256 5.079v-2.079h-26v2h24v3.921l12.744-8.921-12.744-8.921z"/><path d="m29 41h2v2h-2z"/><path d="m35 41h2v2h-2z"/><path d="m41 41h2v2h-2z"/><path d="m27 49h4v2h-4z"/><path d="m21 49h4v2h-4z"/><path d="m21 53h10v2h-10z"/></g></svg>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd2);?></div>
													<div class="stat-panel-title text-uppercase">Equipment And Input</div>
												</div>
											</div>
											<a href="equip-input.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
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