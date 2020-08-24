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
            if(isset($_GET['del']) && isset($_GET['email']))
                {
                    $id=$_GET['del'];
                    $name=$_GET['name'];

                    $sql = "delete from employeeappraisal WHERE id=:id";
                    $query = $dbh->prepare($sql);
                    $query -> bindParam(':id',$id, PDO::PARAM_STR);
                    $query -> execute();

                    $msg="Employee Appraisal Deleted successfully";
                }              
		}    
?>

        <!DOCTYPE html>
        <html>


        <?php
        require_once "public/config/header.php";
        ?>
<head>
</head>
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
                <div class="panel-heading" style='padding:0;'><h2 class="page-title">Manage Employee Appraisal</h2></div>
				</div>
            <div class="row">
                       
                <div class="col-lg-12">

			
                  <!-- Zero Configuration Table -->
				<div class="panel panel-default">
                <div class="panel-heading">List Employee Appraisal</div>
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
												<th>Gender</th>
												<th>Role</th>
												<th>Phone</th>
												<th>Quality of work</th>
												<th>Team work Ability</th>
												<th>Punctuality</th>												
                                               
											<th>Action</th>	
										</tr>
									</thead>
									
									<tbody>

										<?php $sql = "SELECT * from employee ";
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
											<td><img src="employee/<?php echo htmlentities($result->image);?>" style="width:50px; border-radius:50%;"/></td>
                                            <td><?php echo htmlentities($result->name);?></td>
                                            <td><?php echo htmlentities($result->email);?></td>
											<td><?php echo htmlentities($result->gender);?></td>
											<td><?php echo htmlentities($result->role);?></td>
											<td><?php echo htmlentities($result->phone);?></td> 
											<td><?php echo htmlentities($result->qualityofwork);?></td>
											<td><?php echo htmlentities($result->teamwork);?></td>
											<td><?php echo htmlentities($result->punctuality);?></td>
											<td>
											<a href="editempappraisal.php?edit=<?php echo $result->id;?>" onclick="return confirm('Do you want to Edit');">&nbsp; <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
											<!--<a href="employee.php?del=<?php echo $result->id;?>&email=<?php echo htmlentities($result->email);?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
											--></td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>
							</div>		 
						</div>  
						<!-- form 2 here -->
						
                  <!-- Zero Configuration Table -->
                  <div class="panel panel-default" style='border:none'>
				<div id="edit" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">						
				<div class="modal-dialog">
				<div class="modal-content" style="height:auto">
				<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Employee Appraisal</h4>
              </div>
              <div class="modal-body">
              <form action="employeeappraisal.php?edit" method="POST" class="forma" enctype="multipart/form-data">
              
					<p>
						
                        <label for="empname">Employee Name</label>
                        <input type="text" name="name" value="<?php echo htmlentities($result->name);?>" readonly>
                    </p>

                    <p>
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo htmlentities($result->email);?>" readonly>
                    </p>
					<p>
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo htmlentities($result->email);?>" readonly>
                    </p>
                   
					<p>
                        <label for="Role">role</label>
                        <input type="role" name="role" value="<?php echo htmlentities($result->role);?>" readonly>
                    </p>
                    <p>
                        <label for="Number">Number</label>
                        <input type="number" name="phone" value="<?php echo htmlentities($result->phone);?>" readonly>
                    </p>
					<p>
                        <label for="gender">Quality of Work</label>
                        <select name="qualityofwork" class="form-control" required >
                            <option value="" selected disabled>Select</option>
                            <option value="satisfactory">Satisfactory</option>
                            <option value="notsatisfactory">Not Satisfactory</option>
							<option value="rejected">Rejected</option>
                            </select>
                    </p>
                   
					<p>
                        <label for="gender">Team Work Ability</label>
						<select name="teamwork" class="form-control" required >
                        <option value="" selected disabled>Select</option>
                            <option value="satisfactory">Satisfactory</option>
                            <option value="notsatisfactory">Not Satisfactory</option>
							<option value="rejected">Rejected</option>
                            </select>
                    </p>
                    <p>
                        <label for="gender">Punctuality</label>
                        <select name="punctuality" class="form-control" required >
                            <option value="punctuality" selected disabled>Select</option>
                            <option value="always">Always</option>
                            <option value="sometime">Sometime</option>
							<option value="notpunctual">Not Punctual</option>
                            </select>
                    </p>
                    
					<input type="hidden" name="editid" class="form-control" required value="<?php echo htmlentities($result->id);?>">
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
						<!-- form 2 ends here -->
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
    
    <?php //} ?>