<?php
session_start();

error_reporting(0);
$error = "";
$msg = "";
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
	
    if (isset($_GET['del'])) {
        $id = $_GET['del'];

        $sql = "delete from documents WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Documents Deleted Successfully";
			
    }
	
	if(isset($_POST['submit']))
  {	
	$file = $_FILES['attachment']['name'];
	$file_loc = $_FILES['attachment']['tmp_name'];
	$folder="attachment/";
	$new_file_name = strtolower($file);
	$final_file=str_replace(' ','-',$new_file_name);
	
	$name=$_POST['name'];
    $description=$_POST['description'];
    $attachment=' '; 
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
		{
			$attachment=$final_file;
		}
	
	$sql="INSERT INTO `documents`(`name`, `description`, `attachment`) VALUES ( :name, :description, :attachment)";
	
    $query = $dbh->prepare($sql);
	$query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
	$query-> bindParam(':attachment', $attachment, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Documents Uploaded Successfully";
   
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
                <div class="row dashboard-header">
                    <div class="panel-heading">
                        <h2 class="page-title">Documents</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <!-- button style Start -->
                        <div class="navbar">
                            <div class="container-fluid" style="padding-left:7px;">
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Documents</a>
                                </h1>
                            </div>
                        </div>
                        <!-- button style End -->
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Documents List</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>

                                <table id="zctb tablePreview" class="display table table-dark table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Attachments</th>  
											<th>Uploaded time</th>  
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
									<tbody>

								<?php 
								$sql = "SELECT * from  documents";
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
                                            <td><?php echo htmlentities($result->name);?></td>
											<td><?php echo htmlentities($result->description);?></td>                                      
                                            <td><a href="../organization/attachment/<?php echo htmlentities($result->attachment);?>" target="_blank" ><?php echo htmlentities($result->attachment);?></a></td>
											<td><?php echo htmlentities($result->time);?></td>    
										<td>
                                                        <!-- <a data-toggle="modal" href="machineryedit.php?s=<?php echo $result->sn; ?>" data-target="#MyModal" data-backdrop="static">&nbsp;<i class="fa fa-pencil"></i></a>   -->                                                 
                                                        <a href="documents.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
                                                    </td>									

										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
                                </table>

                            </div>

                        </div>
                    </div>

                    <div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content" style="height:auto">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                    <h4 id='edit' class="modal-title">Add New Document</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="documents.php" method="POST" class="forma" id="f_edit" enctype="multipart/form-data">

                                        <p>
                                            <label for="name">Name</label>
                                            <input type="text" name="name" value="" required>
                                        </p>


                                        <p>
                                            <label for="description">Description</label>
                                            <textarea class="form-control" rows="5" name="description" required></textarea>
                                        </p>
										
										<p>
											<label for="description">Attachment</label>											
											<input type="file" name="attachment" value="" required>											
										</p>
										
                                        <p>
                                            <button type="submit" name="submit" id="submit">
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
                    <!--end of modal-dialog-->

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

<?php } ?>