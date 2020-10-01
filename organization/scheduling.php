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

        $sql = "delete from alarm WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Alarm Deleted Successfully";
		
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
                        <h2 class="page-title">Schedulling</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <!-- button style Start -->
                        <div class="navbar">
                            <div class="container-fluid" style="padding-left:7px;">
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add</a>
                                </h1>

                            <!--    <h1 class="nav navbar-nav navbar-right">
                                    <a class="btn btn-md btn-primary" href="#add2" data-target="#add2" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add category</a>
                                </h1> -->
                            </div>
                        </div>
                        <!-- button style End -->
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Alarms</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>

                                <table id="zctb tablePreview" class="display table table-dark table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from `alarm`";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {                ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->name); ?></td>
                                                    <td><?php echo htmlentities($result->description); ?></td>
                                                    <td><?php echo htmlentities($result->start); ?></td>
                                                    <td><?php echo htmlentities($result->end); ?></td>
													
                                                    <!-- Action Button Start -->
                                                    <td>
                                                        <!-- <a data-toggle="modal" href="machineryedit.php?s=<?php echo $result->sn; ?>" data-target="#MyModal" data-backdrop="static">&nbsp;<i class="fa fa-pencil"></i></a>   -->                                                 
                                                        <a href="scheduling.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
                                                    </td>
                                                    <!-- Action Button End -->
                                                </tr>
                                        <?php $cnt = $cnt + 1;											
										
										echo '<script type="text/javascript">										
													var currentDate = new Date();
													if(currentDate == <?php $result->start ?>){
													alert("you");
													}												
												</script>';				
										
                                            }
                                        } ?>

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
                                    <h4 id='edit' class="modal-title">Add New Alarms</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="schedulingform.php" method="POST" class="forma" id="f_edit">

                                        <p>
                                            <label for="name">Name</label>
                                            <input type="text" name="name" value="">
                                        </p>


                                        <p>
                                            <label for="description">Description</label>
                                            <input type="text" name="description" value="">
                                        </p>
										<p>
                                            <label for="size">Start</label>
                                            <input type="datetime-local"  name="start" value="">
                                        </p>

                                        <p>
                                            <label for="size">End</label>
                                            <input type="datetime-local"  name="end" value="">
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