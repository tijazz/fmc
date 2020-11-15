<?php
session_start();

error_reporting(0);
$error = "";
$msg = "";
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['submit'])) {
        $supply = $_POST['supply'];
        $risk = $_POST['risk'];
        $inventory = $_POST['inventory'];
        $monitory = $_POST['monitory'];
        $financial = $_POST['financial'];

        $idedit = $_POST['editid'];

        $sql = "UPDATE employee SET supply=(:supply), risk=(:risk), inventory=(:inventory), monitory=(:monitory), financial=(:financial) WHERE id=(:idedit)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':supply', $supply, PDO::PARAM_STR);
        $query->bindParam(':risk', $risk, PDO::PARAM_STR);
        $query->bindParam(':inventory', $inventory, PDO::PARAM_STR);
        $query->bindParam(':monitory', $monitory, PDO::PARAM_STR);
        $query->bindParam(':financial', $financial, PDO::PARAM_STR);
        $query->bindParam(':idedit', $idedit, PDO::PARAM_STR);
        $query->execute();
        $msg = "Information Updated Successfully";

        header('location:employeeaccess.php');
    }

?>

    <!DOCTYPE html>
    <html>


    <?php
    require_once "public/config/header.php";
    ?>

    <head>
        <link rel="stylesheet" href="public/css/new_styles.css">
        <script type="text/javascript">
            function validate() {
                var extensions = new Array("jpg", "jpeg");
                var image_file = document.regform.image.value;
                var image_length = document.regform.image.value.length;
                var pos = image_file.lastIndexOf('.') + 1;
                var ext = image_file.substring(pos, image_length);
                var final_ext = ext.toLowerCase();
                for (i = 0; i < extensions.length; i++) {
                    if (extensions[i] == final_ext) {
                        return true;

                    }
                }
                alert("Image Extension Not Valid (Use Jpg,jpeg)");
                return false;
            }
        </script>
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
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="panel-heading">
                        <h2 class="page-title">Employee Access</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">


                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Employees Appraisal list</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow">
                                        <?php echo htmlentities($error); ?>
                                    </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow">
                                        <?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb tablePreview" class="display table table-dark table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Supply</th>
                                            <th>Risk</th>
                                            <th>Inventory</th>
                                            <th>Monitory</th>
                                            <th>Financial</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from employee WHERE user_id = :user_id";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {                ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><img src="../images/<?php echo htmlentities($result->image); ?>" style="width:50px; border-radius:50%;" /></td>
                                                    <td><?php echo htmlentities($result->name); ?></td>
                                                    <td><?php echo htmlentities($result->email); ?></td>
                                                    <td><?php echo htmlentities($result->gender); ?></td>
                                                    <td><?php echo htmlentities($result->role); ?></td>
                                                    <td><?php echo htmlentities($result->phone); ?></td>
                                                    <td><?php echo $result->supply == 1 ? 'YES' : 'NO'; ?></td>
                                                    <td><?php echo $result->risk == 1 ? 'YES' : 'NO'; ?></td>
                                                    <td><?php echo $result->inventory == 1 ? 'YES' : 'NO'; ?></td>
                                                    <td><?php echo $result->monitory == 1 ? 'YES' : 'NO'; ?></td>
                                                    <td><?php echo $result->financial == 1 ? 'YES' : 'NO'; ?></td>
                                                    <td>
                                                        <a data-toggle="modal" href="#edit<?= $cnt ?>" data-toggle="modal" data-target="#edit<?= $cnt ?>">&nbsp;
                                                            <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;

                                                        <div class="modal fade" id="edit<?= $cnt ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content" style="height:auto">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span></button>
                                                                        <h4 class="modal-title">Add Detail</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="employeeaccess.php" method="post" class="form-horizontal" enctype="multipart/form-data">

                                                                            <div class="form-group">
                                                                                <label class="col-sm-2 control-label">Profile Photo<span style="color:red">*</span></label>
                                                                                <div class="col-sm-4 text-center">
                                                                                    <img src="../images/<?php echo htmlentities($result->image); ?>" style="width:200px; border-radius:50%; margin:10px;" readonly>
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
                                                                                <label class="col-sm-2 control-label">Supply<span style="color:red">*</span></label>
                                                                                <div class="col-sm-4">
                                                                                    <select name="supply" class="form-control" required>
                                                                                        <option value="0" selected>No</option>
                                                                                        <option value="1">Yes</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="col-sm-2 control-label">Risk<span style="color:red">*</span></label>
                                                                                <div class="col-sm-4">
                                                                                    <select name="risk" class="form-control" required>
                                                                                        <option value="0" selected>No</option>
                                                                                        <option value="1">Yes</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="col-sm-2 control-label">Inventory<span style="color:red">*</span></label>
                                                                                <div class="col-sm-4">
                                                                                    <select name="inventory" class="form-control" required>
                                                                                        <option value="0" selected>No</option>
                                                                                        <option value="1">Yes</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="col-sm-2 control-label">Monitory<span style="color:red">*</span></label>
                                                                                <div class="col-sm-4">
                                                                                    <select name="monitory" class="form-control" required>
                                                                                        <option value="0" selected>No</option>
                                                                                        <option value="1">Yes</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="col-sm-2 control-label">financial<span style="color:red">*</span></label>
                                                                                <div class="col-sm-4">
                                                                                    <select name="financial" class="form-control" required>
                                                                                        <option value="0" selected>No</option>
                                                                                        <option value="1">Yes</option>
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
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!--end of modal-dialog-->
                                                    </td>

                                                    <!-- Action Button End -->
                                                </tr>
                                        <?php $cnt = $cnt + 1;
                                            }
                                        } ?>
                                    </tbody>
                                </table>
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
            $(document).ready(function() {
                setTimeout(function() {
                    $('.succWrap').slideUp("slow");
                }, 3000);
            });
        </script>

    </body>

    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

    </html>

<?php
}
?>