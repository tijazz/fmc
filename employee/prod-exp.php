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

        $sql = "delete from expenditure WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
    }

    if (isset($_POST['submit'])) {
        $user_id=$_SESSION['user_id'];
        $org_id=$_SESSION['org_id'];
        $name=$_POST['name'];
        $description=$_POST['description'];
        $supervisor=$_POST['supervisor'];
        $location=$_POST['location'];
        $company=$_POST['company'];
        $date=$_POST['date'];

        $sql = "INSERT INTO `expenditure`(`user_id`, `org_id`, `name`, `description`, `supervisor`, `location`, `company`, `date`) 
                VALUES (:user_id, :org_id, :name, :description: :supervisor, :location, :company, :date)";
        $query = $dbh->prepare($sql);
        $query->bindParam(":user_id",$user_id,PDO::PARAM_STR);
        $query->bindParam(":org_id",$org_id,PDO::PARAM_STR);
        $query->bindParam(":name",$name,PDO::PARAM_STR);
        $query->bindParam(":description",$description,PDO::PARAM_STR);
        $query->bindParam(":supervisor",$supervisor,PDO::PARAM_STR);
        $query->bindParam(":location",$location,PDO::PARAM_STR);
        $query->bindParam(":company",$company,PDO::PARAM_STR);
        $query->bindParam(":date",$date,PDO::PARAM_STR);
        $query->execute();
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
                    <div class="panel-heading" style='padding:0;'>
                        <h2 class="page-title">Manage Expenditure</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <h1><a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i></a></h1>
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">List Users</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb tablePreview" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Project Name</th>
                                            <th>Project Description</th>
                                            <th>Project Supervisor</th>
                                            <th>Project Location</th>
                                            <th>Project Coordinating Company</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from expenditure";
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
                                                    <td><?php echo htmlentities($result->supervisor); ?></td>
                                                    <td><?php echo htmlentities($result->location); ?></td>
                                                    <td><?php echo htmlentities($result->company); ?></td>
                                                    <td><?php echo htmlentities($result->date); ?></td>

                                                    <td>
                                                        <a href="prod-detail.php?edit=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Edit');">&nbsp; <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
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
                                                                        <form action="prod-exp.php" method="POST" class="forma">
                                                                            <p>
                                                                                <label for="name">Project Name</label>
                                                                                <input type="text" name="name">
                                                                            </p>

                                                                            <p>
                                                                                <label for="description">Project Description</label>
                                                                                <input type="text" name="description">
                                                                            </p>

                                                                            <p>
                                                                                <label for="supervisor">Project Supervisor</label>
                                                                                <select name="Supervisor" id="">
                                                                                    <option selected>Select</option>

                                                                                    <?php
                                                                                    $s = "SELECT * FROM `employee` WHERE org_id = :org_id";
                                                                                    $q = $dbh->prepare($s);
                                                                                    $q->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                                                    $q->execute();
                                                                                    $res = $q->fetchAll(PDO::FETCH_OBJ);
                                                                                    if ($q->rowCount() > 0) {
                                                                                        foreach ($res as $re) {                ?>
                                                                                            <option value="<?php echo $re->id; ?>"><?php echo $re->name ?></option>
                                                                                    <?php
                                                                                        }
                                                                                    } ?>


                                                                                </select>
                                                                            </p>


                                                                            <p>
                                                                                <button type="submit" name="edit">
                                                                                    Update
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
                                                        <a href="prod-exp.php?del=<?php echo $result->id; ?>;?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
                                                    </td>
                                                </tr>
                                        <?php $cnt = $cnt + 1;
                                            }
                                        } ?>

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
                                            <form action="prod-exp.php" method="POST" class="forma">
                                                <p>
                                                    <label for="name">Project Name</label>
                                                    <input type="text" name="name">
                                                </p>

                                                <p>
                                                    <label for="description">Project Description</label>
                                                    <input type="text" name="description">
                                                </p>

                                                <p>
                                                    <label for="supervisor">Project Supervisor</label>
                                                    <select name="Supervisor" id="">
                                                        <?php
                                                        $s = "SELECT * FROM `employee` WHERE org_id = :org_id";
                                                        $q = $dbh->prepare($s);
                                                        $q->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                        $q->execute();
                                                        $res = $q->fetchAll(PDO::FETCH_OBJ);
                                                        if ($q->rowCount() > 0) {
                                                            foreach ($res as $re) {                ?>
                                                                <option value="<?php echo $re->id; ?>"><?php echo $re->name ?></option>
                                                        <?php
                                                            }
                                                        } ?>

                                                    </select>
                                                </p>

                                                <p>
                                                    <label for="location">Project location</label>
                                                    <input type="text" name="location">
                                                </p>

                                                <p>
                                                    <label for="company">Project company</label>
                                                    <input type="text" name="company">
                                                </p>

                                                <p>
                                                    <label for="date">Date</label>
                                                    <input type="date" name="date">
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
                                    <!--end of modal-dialog-->
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