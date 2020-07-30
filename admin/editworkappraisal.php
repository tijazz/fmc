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
               
                $qualityofwork=$_POST['qualityofwork'];
                $teamwork=$_POST['teamwork'];
                $punctuality=$_POST['punctuality'];               
                $idedit=$_POST['editid'];                

                $sql="UPDATE worker SET qualityofwork=(:qualityofwork), teamwork=(:teamwork), punctuality=(:punctuality) WHERE id=(:idedit)";
                $query = $dbh->prepare($sql);
                $query-> bindParam(':qualityofwork', $qualityofwork, PDO::PARAM_STR);
                $query-> bindParam(':teamwork', $teamwork, PDO::PARAM_STR);
                $query-> bindParam(':punctuality', $punctuality, PDO::PARAM_STR);               
                $query-> bindParam(':idedit', $idedit, PDO::PARAM_STR);
                $query->execute();
                $msg="Information Updated Successfully";
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

		$sql = "SELECT * from worker where id = :editid";
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
                <div class="panel-heading">	<h2 class="page-title">Edit Worker : <?php echo htmlentities($result->name); ?></h2></div>
				</div>
            <div class="row">
                       
                <div class="col-lg-8">
                       <div class="panel panel-default">
                               <div class="panel-heading">Edit Worker Info</div>
                            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                            else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                            <div class="panel-body">
                               <form method="post" class="form-horizontal" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Profile Photo<span style="color:red">*</span></label>	
                                        <div class="col-sm-4 text-center">
                                            <img src="worker/<?php echo htmlentities($result->image);?>" style="width:200px; border-radius:50%; margin:10px;" readonly>
                                            <input type="file" name="image" class="form-control" readonly>
                                            <input type="hidden" name="image" class="form-control" value="<?php echo htmlentities($result->image);?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Name<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                        <input type="text" name="name" class="form-control" readonly value="<?php echo htmlentities($result->name);?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                        <input type="email" name="email" class="form-control" readonly value="<?php echo htmlentities($result->email);?>" readonly>
                                        </div>
                                    </div>
									<div class="form-group"> 
									 <label class="col-sm-2 control-label">Gender<span style="color:red">*</span></label>
								<div class="col-sm-4">
								<select name="gender" class="form-control" readonly >
									<option value="" selected disabled> <?php echo htmlentities($result->gender);?></option>
									<option value="male">Male</option>
									<option value="female">Female</option>
									
								</select> </div>
								</div>
								
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Role<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                        <input type="text" name="role" class="form-control" readonly value="<?php echo htmlentities($result->role);?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Mobile<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                        <input type="text" name="phone" class="form-control" readonly value="<?php echo htmlentities($result->phone);?>">
                                        </div> 
									</div>	
                                   							
									<div class="form-group"> 
									 <label class="col-sm-2 control-label">Quality of Work<span style="color:red">*</span></label>
								<div class="col-sm-4">
								<select name="qualityofwork" class="form-control" required >
									<option value="qualityofwork" selected disabled>Select</option>
									<option value="satisfactory">Satisfactory</option>
									<option value="notsatisfactory">Not Satisfactory</option>
									<option value="rejected">Rejected</option>
								</select> </div>
								</div>
								
								<div class="form-group"> 
									 <label class="col-sm-2 control-label">Team Work Ability<span style="color:red">*</span></label>
								<div class="col-sm-4">
								<select name="teamwork" class="form-control" required >
									<option value="teamwork" selected disabled>Select</option>
									<option value="satisfactory">Satisfactory</option>
									<option value="notsatisfactory">Not Satisfactory</option>
									<option value="rejected">Rejected</option>
								</select> </div>
								</div>
								
								<div class="form-group"> 
									 <label class="col-sm-2 control-label">Punctuality<span style="color:red">*</span></label>
								<div class="col-sm-4">
								<select name="punctuality" class="form-control" required >
									<option value="punctuality" selected disabled>Select</option>
									<option value="satisfactory">Satisfactory</option>
									<option value="notsatisfactory">Not Satisfactory</option>
									<option value="rejected">Rejected</option>
								</select> </div>
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