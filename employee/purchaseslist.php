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
                <link rel="stylesheet" href="public/css/new_styles.css">

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
                <div class="row  white-bg dashboard-header">
				</div>
            <div class="row">
                       
                <div class="col-lg-12">
                    <div class="apart_placer end_placer">
                    <h2 class="page-title">Purchases List</h2>
                    <h1><a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i></a></h1>
                </div>
                    <!-- Zero Configuration Table -->
				<div class="panel-default">
                <div class="panel-heading">List Users</div>
							<div class="table-body" style='background:#fff;'>
											<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
								else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb tablePreview" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
                                                <th>Serial Number</th>
                                                <th>Name</th>
												<th>Description</th>										
                                                <th>Price per Unit</th>
                                                <th>Quantity of item</th>
                                                <th>Amount</th>
                                                <th>Time</th>
                                                <th>Date</th>
                                                <th>Add Parameters</th>
                                                <th>Action</th>	
										</tr>
									</thead>
									
									<tbody>

										<?php $sql = "SELECT * from purchases";
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
										    <td><?php echo htmlentities($result->sn);?></td>
                                            <td><?php echo htmlentities($result->name);?></td>
                                            <td><?php echo htmlentities($result->description);?></td>
                                            <td><?php echo htmlentities($result->ppunit);?></td>
                                            <td><?php echo htmlentities($result->qitem);?></td>
                                            <td><?php echo htmlentities($result->amount);?></td>
                                            <td><?php echo htmlentities($result->time);?></td>
                                            <td><?php echo htmlentities($result->date);?></td>
                                            <td><?php echo htmlentities($result->add_parameter);?></td>

																						
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
              <form action="purchases.php" method="POST" class="forma">
				
					<p>
                        <label for="sn">Serial Number</label>
                        <input type="text" name="sn">
                    </p>
					<p>
                        <label for="full_name">Name of Item</label>
                        <input type="text" name="name">
                    </p> 
                    <p>
                        <label for="full_name">Description</label>
                        <input type="text" name="description" value="">
                    </p>
					<p>
                        <label for="sn">Price per Unit of Item</label>
                        <input type="text" name="ppunit">
                    </p>
					<p>
                        <label for="full_name">Quantity of Item</label>
                        <input type="text" name="qitem">
                    </p>

                    <p>
                        <label for="amount">Cost</label>
                        <input type="text" name="amount" value="">
                    </p>
					<p>
                        <label for="time">Time</label>
                        <input type="time" name="time" value="13:30">
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