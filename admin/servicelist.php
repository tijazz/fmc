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
                <div class="row border-bottom">
            
                <?php
                require_once "public/config/topbar.php";
                ?>
                            
                </div>
                <div class="row  dashboard-header">
                <div class="panel-heading" style='padding:0;'><h2 class="page-title">Manage Services</h2></div>
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
								<table id="zctb tablePreview" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
                                                <th>Transaction</th>
                                                <th>Sales Name</th>
												<th>Date</th>										
                                                <th>Product Name</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Discount</th>
                                                <th>Total Amount</th>
                                                <th>Total Quantity</th>
                                                <th>Method</th>
                                                <th>Customer Name</th>
                                                <th>Phone</th>
                                                <th>Type</th>
                                                <th>Add Parameter</th>
                                                <th>Action</th>	
										</tr>
									</thead>
									
									<tbody>

										<?php $sql = "SELECT * from `service`";
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
										    <td><?php echo htmlentities($result->transaction);?></td>
                                            <td><?php echo htmlentities($result->salename);?></td>
                                            <td><?php echo htmlentities($result->date);?></td>
                                            <td><?php echo htmlentities($result->productname);?></td>
                                            <td><?php echo htmlentities($result->description);?></td>
                                            <td><?php echo htmlentities($result->price);?></td>
                                            <td><?php echo htmlentities($result->quantity);?></td>
                                            <td><?php echo htmlentities($result->discount);?></td>
                                            <td><?php echo htmlentities($result->amount);?></td>
                                            <td><?php echo htmlentities($result->totalquantity);?></td>
                                            <td><?php echo htmlentities($result->method);?></td>
                                            <td><?php echo htmlentities($result->customername);?></td>
                                            <td><?php echo htmlentities($result->phone);?></td>
                                            <td><?php echo htmlentities($result->type);?></td>
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
              <form action="service.php" method="POST" class="forma">
                 <p>
                        <select name="type">
                        <option selected>Daily</option>
                        <option >Weekly</option>
                        <option >Yearly</option>  
                        </select>
                    </p>
					<p>
                        <label for="transaction">Transaction number</label>
                        <input type="text" name="transaction">
                    </p>
                    <p>
                        <label for="salename">Service employee name</label>
                        <input type="text" name="salename" value="">
                    </p>
        

                    <p>
                        <label for="date">Business transaction date</label>
                        <input type="date" name="date" value="">
                    </p>

                    <p>
                        <label for="productname">Service name</label>
                        <input type="text" name="productname" value="">
                    </p>

                    <p>
                        <label for="description">Service description</label>
                        <input type="text" name="description" value="">
                    </p>
                    <p>
                        <label for="price">Price of Service per hour/day</label>
                        <input type="text" name="price" value="">
                    </p>
					<p>
                        <label for="quantity">Number of hours for Service sold</label>
                        <input type="name" name="quantity" value="">
                    </p>
					<p>
                        <label for="discount">Discount</label>
                        <input type="text" name="discount" value="">
                    </p>

                    <p>
                        <label for="totalamount">Total income for Service sold</label>
                        <input type="text" name="totalamount" value="">
                    </p>

                    <p>
                        <label for="totalquantity">Total number of hours for Service sold</label>
                        <input type="text" name="totalquantity" value="">
                    </p>

                    <p>
                        <label for="method">Payment method</label>
                        <input type="text" name="method" value="">
                    </p>

                    <p>
                        <label for="type">Customer’s name</label>
                        <input type="text" name="customername" value="">
                    </p>

                    <p>
                        <label for="type">Phone number</label>
                        <input type="tel" name="phone" value="">
                    </p>

                    <p>
                        <label for="add_parameters">(Add parameter)</label>
                        <input type="textarea" name="add_parameter" value="">
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