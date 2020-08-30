<!-- calculate the number of unit and roi based on category-->
    <script language="javascript">
    
   function fun(cate)
        {
           var cost_unit_var = document.getElementById("cost_unit").value;
		   var qty_rawmaterials_var = document.getElementById("qty_rawmaterials").value;
		   
		   var tot_cost_qty_var = cost_unit_var * qty_rawmaterials_var;
		   
           document.getElementById("tot_cost_qty").value = tot_cost_qty_var;
        }
		
	function funPer()
        {
           var tot_cost_qty_var = document.getElementById("tot_cost_qty").value;
		   var tot_cost_rawmaterials_var = document.getElementById("tot_cost_rawmaterials").value;
		   
		   var per_rawmaterials_cost_var = (tot_cost_qty_var / tot_cost_rawmaterials_var) * 100;
		   
           document.getElementById("per_rawmaterials_cost").value = per_rawmaterials_cost_var;
        }
</script>
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

                    $sql = "delete from rawmaterials WHERE id=:id";
                    $query = $dbh->prepare($sql);
                    $query -> bindParam(':id',$id, PDO::PARAM_STR);
                    $query -> execute();                

                    $msg="Data Deleted successfully";
                }
			if(isset($_POST['submit']))
				{
					$id_rawmaterials = $_POST['id_rawmaterials'];
					$qty_rawmaterials = $_POST['qty_rawmaterials'];
					$cost_unit = $_POST['cost_unit'];
					$tot_cost_qty = $_POST['tot_cost_qty'];		
					$tot_cost_rawmaterials = $_POST['tot_cost_rawmaterials'];
					$per_rawmaterials_cost = $_POST['per_rawmaterials_cost'];
					$add_parameters =$_POST['add_parameters'];
					
					$sql="INSERT INTO rawmaterials (id_rawmaterials, qty_rawmaterials, cost_unit, tot_cost_qty, tot_cost_rawmaterials, per_rawmaterials_cost, add_parameters) 
					VALUES 
					(:id_rawmaterials, :qty_rawmaterials, :cost_unit, :tot_cost_qty, :tot_cost_rawmaterials, :per_rawmaterials_cost, :add_parameters)";
					$query = $dbh->prepare($sql);
					$query-> bindParam(':id_rawmaterials', $id_rawmaterials, PDO::PARAM_STR);
					$query-> bindParam(':qty_rawmaterials', $qty_rawmaterials, PDO::PARAM_STR);
					$query-> bindParam(':cost_unit', $cost_unit, PDO::PARAM_STR);
					$query-> bindParam(':tot_cost_qty', $tot_cost_qty, PDO::PARAM_STR);	
					$query-> bindParam(':tot_cost_rawmaterials', $tot_cost_rawmaterials, PDO::PARAM_STR);
					$query-> bindParam(':per_rawmaterials_cost', $per_rawmaterials_cost, PDO::PARAM_STR);						
					$query-> bindParam(':add_parameters', $add_parameters, PDO::PARAM_STR);
					$query->execute(); 
					$msg="Raw Materials Updated Successfully";  
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
                <div class="end_placer apart_placer">
                    <h2>Raw Materials</h2>
                    <a class="green_btn plus_btn btn btn-md" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"> Add Raw materials</i></a>
                    </div>  <!-- Zero Configuration Table -->
				<div class="panel panel-default" style="border-radius:10px;">
                <div class="panel-heading">Raw Materials List</div>
							<div class="panel-body" style="background:#fff;border-radius:3px;">
											<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
								else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
                                                <th>Name/ID of Raw Materials</th>
                                                <th>Quantity of Raw Materials per Month(Kg/L)</th>
												<th>Cost per Unit(Kg/L)</th>                                                
                                                <th>Total Cost of Quantity (Cost per unit * Quantity of Materials)</th>
												<th>Total Cost of All Raw Materials</th>
												<th>Percentage of Raw Materials Cost</th>
												<th>Add Parameter</th>
												<th>Action</th>
													
										</tr>
									</thead>
									
									<tbody>

										<?php $sql = "SELECT * from rawmaterials";
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
										    <td><?php echo htmlentities($result->id_rawmaterials);?></td>
                                            <td><?php echo htmlentities($result->qty_rawmaterials);?></td>
                                            <td><?php echo htmlentities($result->cost_unit);?></td>
                                            <td><?php echo htmlentities($result->tot_cost_qty);?></td>	
											<td><?php echo htmlentities($result->tot_cost_rawmaterials);?></td>
                                            <td><?php echo htmlentities($result->per_rawmaterials_cost);?></td>	
										    <td><?php echo htmlentities($result->add_parameters);?></td>	
											<td>
											<a href="edit_rawmaterials.php?edit=<?php echo $result->id;?>" onclick="return confirm('Do you want to Edit');">&nbsp; <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
											<a href="rawmaterials.php?del=<?php echo $result->id;?>;?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
											</td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									<?php	$totaly = $dbh->prepare("SELECT SUM(qty_rawmaterials) AS qty_raw, 
											SUM(tot_cost_rawmaterials) AS tot_cost_raw											
											FROM rawmaterials 
											WHERE YEAR(date)=YEAR(CURDATE())");
	
											$totaly->execute();
											
											$resultly = $totaly->fetch(PDO::FETCH_ASSOC);
											$qty_raw = $resultly['qty_raw'];
											$tot_cost_raw = $resultly['tot_cost_raw'];										
											
											echo "
												<tr>
													<th></th>										
												<th colspan=''>Total</th>
												<th>$qty_raw</th>
												<th></th>
												<th></th><th>$tot_cost_raw</th><th></th><th></th>
												
												</tr>
												"; ?>
										
									</tbody>
								</table>
                            </div>
<div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Raw Materials</h4>
              </div>
              <div class="modal-body">
              <form action="rawmaterials.php" method="POST" class="forma">
                    
					<p>
                        <label for="sn">Name/ID of raw materials</label>
                        <input type="text" name="id_rawmaterials">
                    </p>
					<p>
                        <label for="sn">Quantity of Raw Materials per month(Kg/L)</label>
                        <input type="text" name="qty_rawmaterials" id="qty_rawmaterials" onChange="fun(this.value)">
                    </p>
					
					<p>
                        <label for="sn">Cost per Unit (Kg/L)</label>
                        <input type="text" name="cost_unit" id="cost_unit" onChange="fun(this.value)">
                    </p>
					<p>
                        <label for="sn">Total Cost of Quantity</label>
                        <input type="text" name="tot_cost_qty" id="tot_cost_qty"  onChange="funPer(this.value)" readonly>
                    </p>
					<p>
                        <label for="sn">Total Cost of All raw materials</label>
                        <input type="text" name="tot_cost_rawmaterials" id="tot_cost_rawmaterials" onChange="funPer(this.value)">
                    </p>
					<p>
                        <label for="sn">Percentage of raw materials cost</label>
                        <input type="text" name="per_rawmaterials_cost" id="per_rawmaterials_cost" readonly>
                    </p>
					<p>
                        <label for="sn">Add Parameter</label>
                        <input type="text" name="add_parameters">
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
      
        </div>
 </div>
						</div>	

                </div>
                  
            </div>       
                                                        
                </div>

                
            </div>
            
        </div>
       
        <?php
                require_once "public/config/footer.php";
                ?>
				<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
					
	</script>

    </body>
    
    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->
    </html>
    
    <?php } ?>