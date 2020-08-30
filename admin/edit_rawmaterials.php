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
                if(isset($_POST['submit']))
				{
					$id_rawmaterials = $_POST['id_rawmaterials'];
					$qty_rawmaterials = $_POST['qty_rawmaterials'];
					$cost_unit = $_POST['cost_unit'];
					$tot_cost_qty = $_POST['tot_cost_qty'];	
					$tot_cost_rawmaterials = $_POST['tot_cost_rawmaterials'];										
					$per_rawmaterials_cost =$_POST['per_rawmaterials_cost'];
					$add_parameters =$_POST['add_parameters'];
					$idedit=$_POST['editid']; 
					
					$sql="UPDATE rawmaterials SET id_rawmaterials=(:id_rawmaterials), qty_rawmaterials=(:qty_rawmaterials), cost_unit=(:cost_unit),
						tot_cost_qty=(:tot_cost_qty), tot_cost_rawmaterials=(:tot_cost_rawmaterials), per_rawmaterials_cost=(:per_rawmaterials_cost), add_parameters=(:add_parameters) WHERE id=(:idedit)";
					
					$query = $dbh->prepare($sql);
					$query-> bindParam(':id_rawmaterials', $id_rawmaterials, PDO::PARAM_STR);
					$query-> bindParam(':qty_rawmaterials', $qty_rawmaterials, PDO::PARAM_STR);
					$query-> bindParam(':cost_unit', $cost_unit, PDO::PARAM_STR);
					$query-> bindParam(':tot_cost_qty', $tot_cost_qty, PDO::PARAM_STR);	
					$query-> bindParam(':tot_cost_rawmaterials', $tot_cost_rawmaterials, PDO::PARAM_STR);
					$query-> bindParam(':per_rawmaterials_cost', $per_rawmaterials_cost, PDO::PARAM_STR);						
					$query-> bindParam(':add_parameters', $add_parameters, PDO::PARAM_STR);
					$query-> bindParam(':idedit', $idedit, PDO::PARAM_STR);
					$query->execute(); 
					$msg="Security Updated Successfully";  
				}

?>

        <!DOCTYPE html>
        <html>


        <?php
        require_once "public/config/header.php";
        ?>

<body>
<?php
		 if(isset($_GET['edit']))
         {
           $editid=$_GET['edit'];
         }

		$sql = "SELECT * from rawmaterials where id = :editid";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':editid',$editid,PDO::PARAM_INT);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>
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
                <div class="panel-heading">	<h2 class="page-title">Edit Raw Materials  : <?php echo htmlentities($result->name); ?></h2></div>
				</div>
            <div class="row">
                       
                <div class="col-lg-8">
                       <div class="panel panel-default">
                               <div class="panel-heading">Edit Raw Materials Info <a href="rawmaterials.php" style="float:right; color:black">Back to Raw Materials</a></div>
							 
                            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                            else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                            <div class="panel-body">
                               <form method="post" class="form-horizontal" action="edit_rawmaterials.php">
							  

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Name/ID Raw Materials<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                        <input type="text" name="id_rawmaterials" class="form-control" value="<?php echo htmlentities($result->id_rawmaterials);?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Quantity of Raw Materials per month(Kg/L)<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                        <input type="text" name="qty_rawmaterials" class="form-control"  value="<?php echo htmlentities($result->qty_rawmaterials);?>"  id="qty_rawmaterials" onChange="fun(this.value)">
                                        </div>
                                    </div>								
								
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Cost per Unit (Kg/L)<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                        <input type="text" name="cost_unit" class="form-control"  value="<?php echo htmlentities($result->cost_unit);?>"  id="cost_unit" onChange="fun(this.value)">
                                        </div>
                                    </div> 
									---
									<div class="form-group">
                                        <label class="col-sm-2 control-label">Total Cost of Quantity<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                        <input type="text" name="tot_cost_qty" class="form-control" value="<?php echo htmlentities($result->tot_cost_qty);?>" id="tot_cost_qty"  onChange="funPer(this.value)" readonly >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Total Cost of All raw materials<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                        <input type="text" name="tot_cost_rawmaterials" class="form-control"  value="<?php echo htmlentities($result->tot_cost_rawmaterials);?>" id="tot_cost_rawmaterials" onChange="funPer(this.value)">
                                        </div>
                                    </div>								
								
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Percentage of raw materials cost<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                        <input type="text" name="per_rawmaterials_cost" class="form-control"  value="<?php echo htmlentities($result->per_rawmaterials_cost);?>" id="per_rawmaterials_cost" readonly>
                                        </div>
                                    </div> 
								
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Add parameter<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                        <input type="text" name="add_parameters" class="form-control"  value="<?php echo htmlentities($result->add_parameters);?>">
                                        </div>
                                    </div>                                 
									
                                    <input type="hidden" name="editid" class="form-control" required value="<?php echo htmlentities($result->id);?>">

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn btn-primary" name="submit" type="submit">Save Changes</button>
                                        </div>
                                    </div>

                               </form>
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