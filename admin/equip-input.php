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
												<svg id="Layer_5" enable-background="new 0 0 64 64" height="128" viewBox="0 0 64 64" width="128" xmlns="http://www.w3.org/2000/svg"><g><path d="m24 26c2.226 0 4.194-1.418 4.897-3.53l.051-.154-1.897-.633-.051.155c-.431 1.293-1.637 2.162-3 2.162s-2.569-.869-3-2.163l-.051-.154-1.897.633.051.153c.703 2.113 2.671 3.531 4.897 3.531z"/><path d="m29 45h-10v6h10zm-2 4h-6v-2h6z"/><path d="m23 53h2v2h-2z"/><path d="m27 53h2v2h-2z"/><path d="m23 57h2v2h-2z"/><path d="m27 57h2v2h-2z"/><path d="m58 33h-12c-1.654 0-3 1.346-3 3v1.322c-3.428-4.431-8.636-7.13-14.377-7.312l-.02-.04c3.578-.308 6.397-3.314 6.397-6.97v-1c2.206 0 4-1.794 4-4 0-.98-.368-1.868-.956-2.564.615-1.396.956-2.909.956-4.436v-1.276c0-2.632-1.874-4.918-4.456-5.435-.688-.138-1.314-.473-1.81-.969l-.697-.697c-1.046-1.046-2.438-1.623-3.918-1.623h-8.785c-5.698 0-10.334 4.636-10.334 10.333 0 1.435.321 2.858.9 4.171-.554.686-.9 1.547-.9 2.496 0 2.206 1.794 4 4 4h.002l-.002 1c0 3.656 2.819 6.662 6.397 6.969l-.02.041c-10.189.33-18.377 8.722-18.377 18.99v1c0 3.909 2.51 7.235 6 8.475v4.525h31 12c1.654 0 3-1.346 3-3v-1h5c1.654 0 3-1.346 3-3v-2c0-.771-.301-1.468-.78-2 .48-.532.78-1.229.78-2v-2c0-.771-.301-1.468-.78-2 .48-.532.78-1.229.78-2v-2c0-.771-.301-1.468-.78-2 .48-.532.78-1.229.78-2v-2c0-1.654-1.346-3-3-3zm-13 3c0-.551.449-1 1-1h1v2h2v-2h2v2h2v-2h2v2h2v-2h1c.551 0 1 .449 1 1v2c0 .551-.449 1-1 1h-12c-.551 0-1-.449-1-1zm14 6v2c0 .551-.449 1-1 1h-12c-.551 0-1-.449-1-1v-2c0-.551.449-1 1-1h1v2h2v-2h2v2h2v-2h2v2h2v-2h1c.551 0 1 .449 1 1zm0 6v2c0 .551-.449 1-1 1h-5.184c-.414-1.161-1.514-2-2.816-2h-1v-2h2v2h2v-2h2v2h2v-2h1c.551 0 1 .449 1 1zm-21 7c-.551 0-1-.449-1-1v-2c0-.551.449-1 1-1h1v2h2v-2h2v2h2v-2h2v2h2v-2h1c.551 0 1 .449 1 1v2c0 .551-.449 1-1 1zm7-7c0-.551.449-1 1-1h1v2h-2zm-1.887-6.772c-.066.248-.113.503-.113.772v2c0 .771.301 1.468.78 2-.48.532-.78 1.229-.78 2v1h-2v-7h-2v7h-1c-1.654 0-3 1.346-3 3v2c0 .771.301 1.468.78 2-.48.532-.78 1.229-.78 2v2c0 .352.072.686.184 1h-2.184v-17c0-1.654-1.346-3-3-3h-.82l1.465-8.792c5.337.824 9.946 4.116 12.468 9.02zm-30.113 11.186 1.121-1.121c.189-.189.441-.293.708-.293h.171c.551 0 1 .449 1 1v1h1c1.103 0 2 .897 2 2s-.897 2-2 2h-4zm8 2.586c0-1.911-1.346-3.513-3.14-3.907-.163-.514-.468-.963-.86-1.316v-5.777c0-.551.449-1 1-1h12c.551 0 1 .449 1 1v17h-14v-2c2.206 0 4-1.794 4-4zm5.382-25 .438.875-2.82 3.524-2.819-3.524.437-.875zm-2.382 7.803 2.131 3.197h-4.263zm1.238-1.749 3.23-4.037c.061.002.121.004.182.006l-1.22 7.319zm-5.7-4.031 3.224 4.03-2.192 3.288-1.218-7.308c.063-.003.124-.008.186-.01zm5.462-18.023h-2c0-.352-.072-.686-.184-1h2.369c-.113.314-.185.648-.185 1zm-4 0v2c0 .551-.449 1-1 1h-4c-.551 0-1-.449-1-1v-1-2.382l.03.015c.48.24 1.017.367 1.553.367h2.417 1c.551 0 1 .449 1 1zm6 0c0-.551.449-1 1-1h1 2.528c.811 0 1.472.661 1.472 1.472v.528 1c0 .551-.449 1-1 1h-4c-.551 0-1-.449-1-1zm8 6v-4c1.103 0 2 .897 2 2s-.897 2-2 2zm-15.667-17h8.785c.946 0 1.835.369 2.505 1.038l.697.697c.776.776 1.756 1.301 2.832 1.516 1.65.329 2.848 1.79 2.848 3.473v1.276c0 1.114-.214 2.224-.617 3.261-.433-.161-.895-.261-1.383-.261h-.048c-.233-1.69-1.672-3-3.424-3h-2.528-1-8-1-2.417c-.227 0-.455-.054-.658-.156l-.112-.056c-.501-.25-.813-.754-.813-1.316 0-.811.661-1.472 1.472-1.472h1.528v-2h-1.528c-1.754 0-3.209 1.308-3.44 3l-.012 5h-.02c-.516 0-1.005.106-1.458.284-.356-.94-.542-1.944-.542-2.951 0-4.595 3.738-8.333 8.333-8.333zm-6.333 17c-1.103 0-2-.897-2-2s.897-2 2-2c0 .053.013.103.016.156l-.009 3.844zm2 3v-4.184c.314.112.648.184 1 .184h4c1.654 0 3-1.346 3-3h2c0 1.654 1.346 3 3 3h4c.352 0 .686-.072 1-.184v4.184c0 2.757-2.243 5-5 5h-8c-2.757 0-5-2.243-5-5zm-12 27v-1c0-8.473 6.237-15.497 14.357-16.773l1.463 8.773h-.82c-1.654 0-3 1.346-3 3v5h-.171c-.801 0-1.555.312-2.122.879l-1.096 1.096c-1.471-.191-2.611-1.453-2.611-2.975v-6h-2v6c0 2.414 1.721 4.434 4 4.899v4.101h-1c-3.86 0-7-3.14-7-7zm6 8.941c.329.037.662.059 1 .059h5v2h-6zm42 1.059c0 .551-.449 1-1 1h-12c-.551 0-1-.449-1-1v-2c0-.551.449-1 1-1h1v2h2v-2h2v2h2v-2h2v2h2v-2h1c.551 0 1 .449 1 1zm8-4c0 .551-.449 1-1 1h-5.184c-.133-.374-.335-.711-.596-1 .48-.532.78-1.229.78-2v-1h2v2h2v-2h1c.551 0 1 .449 1 1z"/><path d="m57 7v22h-2v-18h-6v18h-2v-14h-6v16h22v-24zm-12 22h-2v-12h2zm6-16h2v16h-2zm10 16h-2v-20h2z"/></g></svg>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">Administration</div>
												</div>
											</div>
											<a href="administrationlist.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">

														<svg id="Layer_5" enable-background="new 0 0 64 64" height="128" viewBox="0 0 64 64" width="128" xmlns="http://www.w3.org/2000/svg"><g><path d="m60 15h3v-2.658l-.249-.283c-2.005-2.281-5.014-3.396-8.038-2.969-2.349.328-4.521 1.635-5.957 3.584-.622.843-1.528 1.326-2.487 1.326h-11.764c-1.806-7.447-8.511-13-16.505-13-9.374 0-17 7.626-17 17s7.626 17 17 17c7.994 0 14.699-5.553 16.505-13h11.767c.955 0 1.866.491 2.499 1.348 1.69 2.287 4.393 3.652 7.229 3.652 2.582 0 5.042-1.115 6.751-3.059l.249-.283v-2.658h-3c-1.654 0-3-1.346-3-3s1.346-3 3-3zm-37-4v6h-2v10h-6v-12h-2v-4zm0 12h6v4h-6zm6-2h-6v-2h6zm-16-4v10h-6v-10zm-5.164 12h20.327c-2.676 2.474-6.241 4-10.164 4s-7.487-1.526-10.163-4zm23.164-3.548v-8.452h-6v-8h-2v-2h-2v2h-2v-4h-2v4h-2v-2h-2v2h-2v6h-6v10.452c-1.265-2.199-2-4.739-2-7.452 0-8.271 6.729-15 15-15s15 6.729 15 15c0 2.713-.735 5.253-2 7.452zm29-2.452h.89c-1.303 1.277-3.058 2-4.89 2-2.237 0-4.286-1.036-5.621-2.842-1.013-1.371-2.51-2.158-4.107-2.158h-11.4c.077-.657.128-1.322.128-2s-.051-1.343-.128-2h11.397c1.601 0 3.094-.779 4.097-2.14 1.119-1.519 2.805-2.536 4.623-2.79 2.187-.302 4.354.413 5.901 1.93h-.89c-2.757 0-5 2.243-5 5s2.243 5 5 5z"/><path d="m46 29c-7.634 0-14.107 5.059-16.247 12h-10.753v2h-9.764l-2-1h-6.236v8h6.236l2-1h9.764v2h10.753c2.14 6.941 8.613 12 16.247 12 9.374 0 17-7.626 17-17s-7.626-17-17-17zm-37.236 18-2 1h-3.764v-4h3.764l2 1h10.236v2zm12.236 2v-6h8.281c-.174.976-.281 1.975-.281 3s.107 2.024.281 3zm14-8c0-1.654 1.346-3 3-3s3 1.346 3 3-1.346 3-3 3-3-1.346-3-3zm16 0c0-1.654 1.346-3 3-3s3 1.346 3 3-1.346 3-3 3-3-1.346-3-3zm.621 13c-.68-.547-1.436-.998-2.251-1.331.995-.914 1.63-2.214 1.63-3.669 0-.74-.172-1.436-.461-2.068 1.051-.603 2.228-.932 3.461-.932 2.804 0 5.273 1.643 6.391 4.198-.397 1.358-.983 2.632-1.724 3.802zm-2.621-5c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm-6.37 3.669c-.815.333-1.571.784-2.251 1.331h-7.046c-.741-1.17-1.328-2.444-1.724-3.802 1.118-2.555 3.587-4.198 6.391-4.198 1.233 0 2.41.329 3.461.932-.289.632-.461 1.328-.461 2.068 0 1.455.635 2.755 1.63 3.669zm-7.779 3.331h3.68c-.47.699-.841 1.471-1.101 2.294-.947-.663-1.808-1.436-2.579-2.294zm4.355 3.356c.747-3.097 3.555-5.356 6.794-5.356s6.047 2.259 6.794 5.356c-2.042 1.043-4.347 1.644-6.794 1.644s-4.752-.601-6.794-1.644zm15.364-1.062c-.26-.823-.631-1.594-1.101-2.294h3.68c-.771.858-1.632 1.631-2.579 2.294zm6.365-11.019c-.953-1.163-2.182-2.045-3.569-2.603.997-.915 1.634-2.216 1.634-3.672 0-2.757-2.243-5-5-5s-5 2.243-5 5c0 1.45.63 2.746 1.619 3.66-.442.179-.869.395-1.281.645-.887-.802-2.051-1.305-3.338-1.305s-2.451.503-3.338 1.305c-.411-.25-.839-.466-1.281-.645.989-.914 1.619-2.21 1.619-3.66 0-2.757-2.243-5-5-5s-5 2.243-5 5c0 1.456.637 2.757 1.633 3.672-1.387.558-2.616 1.44-3.569 2.603-.035-.422-.064-.845-.064-1.275 0-8.271 6.729-15 15-15s15 6.729 15 15c0 .43-.029.853-.065 1.275z"/><path d="m9 23h2v2h-2z"/><path d="m9 19h2v2h-2z"/></g></svg>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd2);?></div>
													<div class="stat-panel-title text-uppercase">Operation</div>
												</div>
											</div>
											<a href="operationlist.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">

                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve" width="128px" height="128px" class=""><g><g>
	<path d="M165,0C74.019,0,0,74.02,0,165.001C0,255.982,74.019,330,165,330s165-74.018,165-164.999C330,74.02,255.981,0,165,0z    M165,300c-74.44,0-135-60.56-135-134.999C30,90.562,90.56,30,165,30s135,60.562,135,135.001C300,239.44,239.439,300,165,300z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#F30202"/>
	<path d="M164.998,70c-11.026,0-19.996,8.976-19.996,20.009c0,11.023,8.97,19.991,19.996,19.991   c11.026,0,19.996-8.968,19.996-19.991C184.994,78.976,176.024,70,164.998,70z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#F30202"/>
	<path d="M165,140c-8.284,0-15,6.716-15,15v90c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15v-90C180,146.716,173.284,140,165,140z   " data-original="#000000" class="active-path" data-old_color="#000000" fill="#F30202"/>
</g></g> </svg>

													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd2);?></div>
													<div class="stat-panel-title text-uppercase">Not Available</div>
												</div>
											</div>
											<a href="#" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">

                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve" width="128px" height="128px" class=""><g><g>
	<path d="M165,0C74.019,0,0,74.02,0,165.001C0,255.982,74.019,330,165,330s165-74.018,165-164.999C330,74.02,255.981,0,165,0z    M165,300c-74.44,0-135-60.56-135-134.999C30,90.562,90.56,30,165,30s135,60.562,135,135.001C300,239.44,239.439,300,165,300z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#F30202"/>
	<path d="M164.998,70c-11.026,0-19.996,8.976-19.996,20.009c0,11.023,8.97,19.991,19.996,19.991   c11.026,0,19.996-8.968,19.996-19.991C184.994,78.976,176.024,70,164.998,70z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#F30202"/>
	<path d="M165,140c-8.284,0-15,6.716-15,15v90c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15v-90C180,146.716,173.284,140,165,140z   " data-original="#000000" class="active-path" data-old_color="#000000" fill="#F30202"/>
</g></g> </svg>

													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd2);?></div>
													<div class="stat-panel-title text-uppercase">Not Available</div>
												</div>
											</div>
											<a href="#" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
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