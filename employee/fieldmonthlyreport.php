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

        $sql = "delete from monthlyreport WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
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
                        <h2 class="page-title">Manage Monthly Fields Reports</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <!-- button style Start -->
                        <div class="navbar">
                            <div class="container-fluid" style="padding-left:7px;">
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Report</a>
                                </h1>
                            </div>
                        </div>
                        <!-- button style End -->
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">List Reports</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb tablePreview" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Month</th>
                                            <th>Field</th>
                                            <th>Usage Hours</th>
                                            <th>Activity</th>
                                            <th>Activity Status</th>
                                            <th>Field Status</th>
                                            <th>Manager</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from monthlyreport WHERE org_id = (:org_id) AND type = 'field' AND user_id = :user_id";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                        $query->bindParam(':user_id', $_SESSION['id'], PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {                ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->month); ?></td>
                                                    <td><?php
                                                        $s = "SELECT * FROM `locations` WHERE id = (:id)";
                                                        $q = $dbh->prepare($s);
                                                        $q->bindParam(':id', $result->name, PDO::PARAM_STR);
                                                        $q->execute();
                                                        $res = $q->fetch(PDO::FETCH_OBJ);
                                                        echo htmlentities($res->name); ?></td>
                                                    <td><?php echo htmlentities($result->hours); ?></td>
                                                    <td><?php echo htmlentities($result->activity); ?></td>
                                                    <td><?php echo htmlentities($result->activity_status); ?></td>
                                                    <td><?php echo htmlentities($result->field_status); ?></td>
                                                    <td><?php
                                                        $s = "SELECT * FROM `organization` WHERE id = (:id)";
                                                        $q = $dbh->prepare($s);
                                                        $q->bindParam(':id', $result->manager, PDO::PARAM_STR);
                                                        $q->execute();
                                                        $res = $q->fetch(PDO::FETCH_OBJ);
                                                        echo htmlentities($res->username); ?></td>
                                                    <td>
                                                        <a data-toggle="modal" href="fieldmonthlyreportedit.php?s=<?php echo $result->id; ?>" data-target="#MyModal" data-backdrop="static">&nbsp;
                                                            <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                                                        <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog model-sm">
                                                                <div class="modal-content"> </div>
                                                            </div>
                                                        </div>

                                                        <a href="fieldmonthlyreport.php?del=<?php echo $result->sn; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;

                                                    </td>

                                                    <!-- Action Button End -->
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
                                            <h4 class="modal-title">Create Report</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="fieldmonthlyreportform.php" method="POST" class="forma">
                                                <p>
                                                    <label for="month">month</label>
                                                    <input type="month" name="month">
                                                </p>

                                                <p>
                                                    <label for="name">Field</label>
                                                    <select name="name" id="">
                                                        <?php


                                                        $sql = "SELECT * FROM `locations` WHERE data_type = 'field' AND org_id = (:org_id)";
                                                        $query = $dbh->prepare($sql);
                                                        $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);

                                                        $query->execute();
                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt = 1;
                                                        if ($query->rowCount() > 0) {
                                                            foreach ($results as $result) {                ?>
                                                                <option value="<?php echo htmlentities($result->id); ?>">
                                                                    <?php echo htmlentities($result->name); ?></option>
                                                        <?php $cnt = $cnt + 1;
                                                            }
                                                        } ?>
                                                    </select>
                                                </p>


                                                <p>
                                                    <label for="hour">Hours</label>
                                                    <input type="number" name="hours">

                                                </p>

                                                <p>
                                                    <label for="activity">Activity</label>
                                                    <textarea name="activity" id="" cols="30" rows="10"></textarea>
                                                </p>

                                                <p>
                                                    <label for="activity_status">Activity Status</label>
                                                    <select name="activity_status" id="">
                                                        <option value="Completed">Completed</option>
                                                        <option value="On Going">On Going</option>
                                                    </select>
                                                </p>

                                                <p>
                                                    <label for="field_status">Field Status</label>
                                                    <input type="range" name="field_status" id="" min="1" max="5" step="1">
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