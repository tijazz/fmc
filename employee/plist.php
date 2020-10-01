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
                        <h2 class="page-title">Manage Pens</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <div class="navbar">
                            <div class="container-fluid" style='padding-left:7px;'>
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Pen</a>
                                </h1>

                            </div>
                        </div>
                        <!-- button style End -->


                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Pen List</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow">
                                        <?php echo htmlentities($error); ?>
                                    </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow">
                                        <?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb tablePreview" class="display table table-dark table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Size</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Capacity</th>
                                            <th>Type</th>
                                            <th>Purpose</th>
                                            <th>Active Crops/Pens</th>
                                            <th>Current Utilization</th>
                                            <th>Start Season</th>
                                            <th>End Season</th>
                                            <th>Ownership</th>
                                            <th>Fallow Period</th>
                                            <th>Manager</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from `locations` WHERE org_id=(:org_id) AND data_type='pen' AND user = :user_id";
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
                                                    <td><?php echo htmlentities($result->name); ?></td>
                                                    <td><?php echo htmlentities($result->size); ?></td>
                                                    <td><?php echo htmlentities($result->lat); ?></td>
                                                    <td><?php echo htmlentities($result->lng); ?></td>
                                                    <td><?php echo htmlentities($result->soil_type); ?></td>
                                                    <td><?php echo htmlentities($result->pH); ?></td>
                                                    <td><?php echo htmlentities($result->chemical); ?></td>
                                                    <td><?php echo htmlentities($result->active); ?></td>
                                                    <td><?php echo htmlentities($result->utilization); ?></td>
                                                    <td><?php echo htmlentities($result->start_season); ?></td>
                                                    <td><?php echo htmlentities($result->end_season); ?></td>
                                                    <td><?php echo htmlentities($result->ownership); ?></td>
                                                    <td><?php echo htmlentities($result->fallow); ?></td>
                                                    <td><?php echo htmlentities($result->manager); ?></td>

                                                    <!-- Action Button Start -->
                                                    <td>
                                                        <a data-toggle="modal" href="pedit.php?s=<?php echo $result->id; ?>" data-target="#MyModal" data-backdrop="static">&nbsp;
                                                            <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                                                        <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog model-sm">
                                                                <div class="modal-content"> </div>
                                                            </div>
                                                        </div>

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
                                            <h4 class="modal-title">Add New Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="pedit.php" method="POST" class="forma">


                                                <p>
                                                    <label for="name">Name</label>
                                                    <select name="pen" id="">
                                                        <?php
                                                        $sql = "SELECT * FROM `locations` WHERE data_type = 'data'";
                                                        $query = $dbh->prepare($sql);
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
                                                    <button type="submit" name="submit" value="<?php echo $sn; ?>">
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