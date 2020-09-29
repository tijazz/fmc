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
                <div class="row dashboard-header">
                <div class="panel-heading" style='padding:0;'><h2>Inquiry and Complaints Messages</h2></div>
				</div>
            <div class="row">
                       
                <div class="col-lg-8">

                    <h2 class="page-title text-white">Configure Messages</h2>

                  <!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Show Messages</div>
							<div class="panel-body">
								<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
								else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
									<table id="zctb tablePreview" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										       <th>#</th>
												<th>User Email</th>
												<th>Title</th>
                                                <th>Feedback</th>
                                                <th>Attachment</th>
											    <th>Action</th>	
										</tr>
									</thead>
									
									<tbody>

														<?php 
														$reciver = 'Admin';
														$sql = "SELECT * from  feedback where reciver = (:reciver)";
														$query = $dbh -> prepare($sql);
														$query-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
														$query->execute();
														$results=$query->fetchAll(PDO::FETCH_OBJ);
														$cnt=1;
														if($query->rowCount() > 0)
														{
														foreach($results as $result)
														{				?>	
																								<tr>
																									<td><?php echo htmlentities($cnt);?></td>
																									<td><?php echo htmlentities($result->sender);?></td>
																									<td><?php echo htmlentities($result->title);?></td>
																									<td><?php echo htmlentities($result->feedbackdata);?></td>
																									<td><a href="../attachment/<?php echo htmlentities($result->attachment);?>" ><?php echo htmlentities($result->attachment);?></a></td>
																									
														<td>
														<a href="sendreply.php?reply=<?php echo $result->sender;//."&id=".$result->id;?>">&nbsp; <i class="fa fa-mail-reply"></i></a>&nbsp;&nbsp;
														</td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>
							</div>
						</div>

                </div>
                   
                
                <div class="col-lg-4">
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