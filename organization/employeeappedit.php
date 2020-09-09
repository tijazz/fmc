<?php
session_start();

error_reporting(0);
$error = "";
$msg = "";
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {



?>

    <!DOCTYPE html>
    <html>

    <body>
    <?php
            if (isset($_POST['submit'])) {
                $qualityofwork = $_POST['qualityofwork'];
                $teamwork = $_POST['teamwork'];
                $punctuality = $_POST['punctuality'];
                $idedit = $_POST['editid'];

                $sql = "UPDATE employee SET quality_of_work=(:qualityofwork), team_work=(:teamwork), punctuality=(:punctuality) WHERE id=(:idedit)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':qualityofwork', $qualityofwork, PDO::PARAM_STR);
                $query->bindParam(':teamwork', $teamwork, PDO::PARAM_STR);
                $query->bindParam(':punctuality', $punctuality, PDO::PARAM_STR);
                $query->bindParam(':idedit', $idedit, PDO::PARAM_STR);
                $query->execute();
                $msg = "Information Updated Successfully";

                header('location:employeeappraisal.php');
                
            } elseif (isset($_GET['s'])) {
                $sn = $_GET['s'];


                $sql = "SELECT * from employee where id=:editid";
                $query = $dbh->prepare($sql);
                $query->bindParam(':editid', $sn, PDO::PARAM_INT);
                $query->execute();
                $result = $query->fetch(PDO::FETCH_OBJ);
                $cnt = 1;


            ?>
        

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Edit Building</h4>
        </div>
        <div class="modal-body">

            
                <form action="employeeappedit.php" method="post" class="form-horizontal" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Profile Photo<span style="color:red">*</span></label>
                        <div class="col-sm-4 text-center">
                            <img src="employee/<?php echo htmlentities($result->image); ?>" style="width:200px; border-radius:50%; margin:10px;" readonly>
                            <input type="file" name="image" class="form-control" readonly>
                            <input type="hidden" name="image" class="form-control" value="<?php echo htmlentities($result->image); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name<span style="color:red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" name="name" class="form-control" readonly value="<?php echo htmlentities($result->name); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
                        <div class="col-sm-4">
                            <input type="email" name="email" class="form-control" readonly value="<?php echo htmlentities($result->email); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Gender<span style="color:red">*</span></label>
                        <div class="col-sm-4">
                            <select name="gender" class="form-control" readonly>
                                <option value="" selected disabled>
                                    <?php echo htmlentities($result->gender); ?></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Role<span style="color:red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" name="role" class="form-control" readonly value="<?php echo htmlentities($result->role); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Mobile<span style="color:red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" name="phone" class="form-control" readonly value="<?php echo htmlentities($result->phone); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Quality of Work<span style="color:red">*</span></label>
                        <div class="col-sm-4">
                            <select name="qualityofwork" class="form-control" required>
                                <option value="qualityofwork" selected disabled>Select</option>
                                <option value="satisfactory">Satisfactory</option>
                                <option value="notsatisfactory">Not Satisfactory</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Team Work Ability<span style="color:red">*</span></label>
                        <div class="col-sm-4">
                            <select name="teamwork" class="form-control" required>
                                <option value="teamwork" selected disabled>Select</option>
                                <option value="satisfactory">Satisfactory</option>
                                <option value="notsatisfactory">Not Satisfactory</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Punctuality<span style="color:red">*</span></label>
                        <div class="col-sm-4">
                            <select name="punctuality" class="form-control" required>
                                <option value="punctuality" selected disabled>Select</option>
                                <option value="satisfactory">Satisfactory</option>
                                <option value="notsatisfactory">Not Satisfactory</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                    </div>


                    <input type="hidden" name="editid" class="form-control" required value="<?php echo htmlentities($result->id); ?>">

                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            
                            <input class="btn btn-primary" name="submit" type="submit">
                        </div>
                    </div>

                </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">OK</button>
        </div>

    <?php
            }
            require_once "public/config/footer.php";
    ?>

    </body>

    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

    </html>


<?php

}


?>