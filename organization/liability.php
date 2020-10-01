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
                                                    <?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="invoice" x="0px" y="0px" viewBox="0 0 1010 1010" xml:space="preserve"><g id="invoice-invoice"><circle id="invoice-label" fill="#FC6E51" cx="505" cy="505" r="505"/><g id="invoice-invoice_1_"><path fill="#FFF" d="M719.536 787.8H290.464V222.2h351.063l78.01 78.009z"/><path fill="#ACAF48" d="M426.981 358.728h234.056v58.499H426.981z"/><path fill="#FFB933" d="M582.26 593.443h78.017v58.51H582.26z"/><path fill="#FFF" d="M505 592.773h78.019v58.51H505z"/><path fill="#3BAFDA" d="M641.527 222.2v78.009h78.01"/><path fill="#454545" d="M719.536 309.973h-87.773V222.2h19.529v68.244h68.244v19.53z"/><path fill="#454545" d="M729.637 797.9H280.364V212.1H645.71l83.927 83.926V797.9zm-429.073-20.2h408.873V304.39l-72.091-72.09H300.564v545.4z"/><path fill="#454545" d="M475.736 290.809H339.218v-20.2h136.518v20.2z"/><path fill="#454545" d="M671.137 661.383H338.873V348.627h332.264v312.756zm-312.064-20.201h291.865V368.827H359.072v272.355z"/><path fill="#454545" d="M670.782 710.481H514.755v-20.2h156.027v20.2z"/><path fill="#454545" d="M612.273 739.39h-97.518v-20.199h97.518v20.2z"/><path fill="#454545" d="M661.037 427.327H348.973v-20.2h312.064v20.2z"/><path fill="#454545" d="M437.082 651.282h-20.2V358.727h20.2v292.555z"/><path fill="#454545" d="M515.1 651.282h-20.2V417.227h20.2v234.055z"/><path fill="#454545" d="M593.12 651.282h-20.201V417.227h20.2v234.055z"/><path fill="#454545" d="M661.037 485.846H426.981v-20.2h234.056v20.2z"/><path fill="#454545" d="M661.037 544.355H426.981v-20.2h234.056v20.2z"/><g><path fill="#454545" d="M661.037 602.873H426.981v-20.2h234.056v20.2z"/></g></g></g><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="invoice" dc:description="invoice" dc:publisher="Iconscout" dc:date="2017-09-22" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>EcommDesign</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg>
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