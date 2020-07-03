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
            if(isset($_GET['del']) && isset($_GET['name']))
                {
                    $id=$_GET['del'];
                    $name=$_GET['name'];

                    $sql = "delete from member WHERE id=:id";
                    $query = $dbh->prepare($sql);
                    $query -> bindParam(':id',$id, PDO::PARAM_STR);
                    $query -> execute();

                    $sql2 = "insert into deleteduser (email) values (:name)";
                    $query2 = $dbh->prepare($sql2);
                    $query2 -> bindParam(':name',$name, PDO::PARAM_STR);
                    $query2 -> execute();

                    $msg="Data Deleted successfully";
                }

                    if(isset($_REQUEST['unconfirm']))
                        {
                            $aeid=intval($_GET['unconfirm']);
                            $memstatus=1;
                            $sql = "UPDATE member SET status=:status WHERE  id=:aeid";
                            $query = $dbh->prepare($sql);
                            $query -> bindParam(':status',$memstatus, PDO::PARAM_STR);
                            $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
                            $query -> execute();
                            $msg="Changes Sucessfully";
                       }

                    if(isset($_REQUEST['confirm']))
                        {
                            $aeid=intval($_GET['confirm']);
                            $memstatus=0;
                            $sql = "UPDATE member SET status=:status WHERE  id=:aeid";
                            $query = $dbh->prepare($sql);
                            $query -> bindParam(':status',$memstatus, PDO::PARAM_STR);
                            $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
                            $query -> execute();
                            $msg="Changes Sucessfully";
                        }

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
                <div class="panel-heading"><h2 class="page-title">Manage Users</h2></div>
				</div>
            <div class="row">
                       
                <div class="col-lg-12">

                    <h2 class="page-title">Configure Users Details</h2>

                  <!-- Zero Configuration Table -->
				<div class="panel panel-default">
                <div class="panel-heading">List Users</div>
							<div class="panel-body">
											<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
								else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
												<th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
												<th>Phone</th>												
                                                <th>Investment Category</th>
                                                <th>Investment Amount</th>
                                                <th>Expected ROI</th>
                                                <th>Account</th>
											<th>Action</th>	
										</tr>
									</thead>
									
									<tbody>

										<?php $sql = "SELECT * from member ";
										$query = $dbh -> prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
										foreach($results as $result)
										{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><img src="../images/<?php echo htmlentities($result->images);?>" style="width:50px; border-radius:50%;"/></td>
                                            <td><?php echo htmlentities($result->fullname);?></td>
                                            <td><?php echo htmlentities($result->email);?></td>
											<td><?php echo htmlentities($result->phone);?></td>
											<td><?php echo htmlentities($result->category);?></td>
                                            <td><?php echo htmlentities($result->unit_value);?></td>
                                            <td><?php echo htmlentities($result->roi);?></td>
                                            <td>
                                            
                                            <?php if($result->status == 1)
                                                    {?>
                                                    <a href="userlist.php?confirm=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Un-Confirm the Account')">Confirmed <i class="fa fa-check-circle"></i></a> 
                                                    <?php } else {?>
                                                    <a href="userlist.php?unconfirm=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Confirm the Account')">Un-Confirmed <i class="fa fa-times-circle"></i></a>
                                                    <?php } ?>
											</td>                                  
																						
											<td>
											<a href="edit-user.php?edit=<?php echo $result->id;?>" onclick="return confirm('Do you want to Edit');">&nbsp; <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
											<a href="userlist.php?del=<?php echo $result->id;?>&name=<?php echo htmlentities($result->email);?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
											</td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>
							</div>
						</div>	

                </div>
                   
                <!---
                <div class="col-lg-4">
                        <?php
            //    require_once "public/config/right-sidebar.php";
                ?>

                            </div>
                                                    -->
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