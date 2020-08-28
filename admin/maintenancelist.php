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
            if(isset($_GET['del']))
                {
                    $id=$_GET['del'];

                    $sql = "delete from testimonial WHERE id=:id";
                    $query = $dbh->prepare($sql);
                    $query -> bindParam(':id',$id, PDO::PARAM_STR);
                    $query -> execute();                

                    $msg="Data Deleted successfully";
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
                <div class="row">
            
                <?php
                require_once "public/config/topbar.php";
                ?>
                            
                </div>
                <div class="row dashboard-header">
                <div class="panel-heading" style='padding:0;'><h2 class="page-title">Manage Maintenance</h2></div>
				</div>
            <div class="row">
                       
                <div class="col-lg-12">

                    <h1><a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i></a></h1>
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
                                                <th>Serial no</th>
                                                <th>Description</th>
                                                <th>Type</th>
                                                <th>Name</th>
												<th>Amount</th>										
                                                <th>Date</th>
                                                <th>Action</th>	
										</tr>
									</thead>
									
									<tbody>

										<?php $sql = "SELECT * from maintenance";
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
										    <td><?php echo htmlentities($result->serial_no);?></td>
                                            <td><?php echo htmlentities($result->description);?></td>
                                            <td><?php echo htmlentities($result->type);?></td>
                                            <td><?php echo htmlentities($result->name);?></td>
                                            <td><?php echo htmlentities($result->amount);?></td>
                                            <td><?php echo htmlentities($result->created_at);?></td>
																						
											<td>
											<a href="edit-testimo.php?edit=<?php echo $result->id;?>" onclick="return confirm('Do you want to Edit');">&nbsp; <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
											<a href="testimolist.php?del=<?php echo $result->id;?>;?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
											</td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>
                            </div>
                            <div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add New Product</h4>
              </div>
              <div class="modal-body">
              <form action="maintenanceform.php" method="POST" class="forma">
                    <p>
                        <select name="type">
                        <option disabled selected>Maintenance type</option>
						<option >Building</option>
						<option >Machines</option>
						<option >Vehicles</option>    
                        </select>
                    </p>
					<p>
                        <label for="sn">Serial Number</label>
                        <input type="text" name="sn">
                    </p>
					<p>
                        <label for="full_name">Name</label>
                        <input type="text" name="name">
                    </p>

                    <p>
                        <label for="full_name">Description</label>
                        <input type="text" name="description" value="">
                    </p>

                    <p>
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" value="">
                    </p>
					<p>
                        <label for="time">Time</label>
                        <input type="time" name="time" value="12:30:12">
					<p>
					<p>
                        <label for="date">Date</label>
                        <input type="date" name="date" value="2017-06-01">
                    </p>
					
                        <label for="add_parameters">Add Parameter</label>
                        <input type="textarea" name="add_parameters" value="">
                    </p>
                    
                    <p>
                        <button type="submit" name="submit">
                            Submit
                        </button>
                    </p>

                </form>

                    
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
      
        </div><!--end of modal-dialog-->
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