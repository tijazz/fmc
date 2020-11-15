<?php
session_start();

error_reporting(0);
$error = "";
$msg = "";
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['edit'])) {
        $id = $_POST['edit'];
        $capacity = $_POST['capacity'];
        $type = $_POST['type'];
        $purpose = $_POST['purpose'];
        $status = $_POST['status'];
        $utilization = $_POST['utilization'];
        $start_season = $_POST['start_season'];
        $end_season = $_POST['end_season'];
        $ownership = $_POST['ownership'];
        $manager = $_POST['manager'];
        $fallow = $_POST['fallow'];

        $sql = "UPDATE `building` SET `capacity`=:capacity,`type`=:type,`purpose`=:purpose,`status`=:status,`utilization`=:utilization,`start_season`=:start_season,`end_season`=:end_season,`ownership`=:ownership,`fallow`=:fallow,`manager`=:manager WHERE id=(:id)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':capacity', $capacity, PDO::PARAM_STR);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->bindParam(':purpose', $purpose, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':utilization', $utilization, PDO::PARAM_STR);
        $query->bindParam(':start_season', $start_season, PDO::PARAM_STR);
        $query->bindParam(':end_season', $end_season, PDO::PARAM_STR);
        $query->bindParam(':ownership', $ownership, PDO::PARAM_STR);
        $query->bindParam(':manager', $manager, PDO::PARAM_STR);
        $query->bindParam(':fallow', $fallow, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Rent Updated Successfully";
        // echo var_dump($_POST);
        header('location:ftlist.php');
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
                        <h2 class="page-title">Manage Facilities</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">


                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Facilities List</div>
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
                                            <th>Dimension</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>capacity</th>
                                            <th>Type</th>
                                            <th>Purpose</th>
                                            <th>Status</th>
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

                                        <?php $sql = "SELECT * from `building`  Where user_id=:user_id";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
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
                                                    <td><?php echo htmlentities($result->capacity); ?></td>
                                                    <td><?php echo htmlentities($result->type); ?></td>
                                                    <td><?php echo htmlentities($result->purpose); ?></td>
                                                    <td><?php echo htmlentities($result->status); ?></td>
                                                    <td><?php echo htmlentities($result->utilization); ?></td>
                                                    <td><?php echo htmlentities($result->start_season); ?></td>
                                                    <td><?php echo htmlentities($result->end_season); ?></td>
                                                    <td><?php echo htmlentities($result->ownership); ?></td>
                                                    <td><?php echo htmlentities($result->fallow); ?></td>
                                                    <td><?php echo htmlentities($result->manager); ?></td>

                                                    <!-- Action Button Start -->
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
                                                                        <form action="ftlist.php" method="POST" class="forma">
                                                                            <p>
                                                                                <label for="name">Name</label>
                                                                                <input type="text" name="name" value="<?php echo ($result->name); ?>" disabled>
                                                                            </p>


                                                                            <p>
                                                                                <label for="size">Size</label>
                                                                                <input type="text" name="size" value="<?php echo ($result->size); ?>" disabled>
                                                                            </p>

                                                                            <p>
                                                                                <label for="latitude">Latitude</label>
                                                                                <input type="text" name="latitude" value="<?php echo ($result->lat); ?>" disabled>
                                                                            </p>

                                                                            <p>
                                                                                <label for="longitude">Longitude</label>
                                                                                <input type="text" name="longitude" value="<?php echo ($result->lng); ?>" disabled>
                                                                            </p>

                                                                            <p>
                                                                                <label for="capacity">Capacity</label>
                                                                                <input type="text" name="capacity" value="<?php echo ($result->capacity); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="type">Type</label>
                                                                                <input type="text" name="type" value="<?php echo ($result->type); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="purpose">Purpose</label>
                                                                                <input type="text" name="purpose" value="<?php echo ($result->purpose); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="status">Status</label>
                                                                                <select name="status">
                                                                                    <option value="full">Active</option>
                                                                                    <option value="lease">Inactive</option>
                                                                                </select>
                                                                            </p>

                                                                            <p>
                                                                                <label for="utilization">Utilization</label>
                                                                                <input type="text" name="utilization" value="<?php echo ($result->utilization); ?>">
                                                                            </p>


                                                                            <p>
                                                                                <label for="start_season">Start Season</label>
                                                                                <input type="date" name="start_season" value="<?php echo ($result->start_season); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="end_season">End Season</label>
                                                                                <input type="date" name="end_season" value="<?php echo ($result->end_season); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="ownership">OwnerShip</label>
                                                                                <select name="ownership">
                                                                                    <option value="full">Full</option>
                                                                                    <option value="lease">Lease</option>
                                                                                    <option value="rent">Rent</option>
                                                                                </select>
                                                                            </p>

                                                                            <p>
                                                                                <label for="fallow">Fallow Period</label>
                                                                                <input type="text" name="fallow" value="<?php echo ($result->fallow); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="manager">Manager</label>
                                                                                <input type="text" name="manager" value="">
                                                                            </p>

                                                                            <p>
                                                                                <button type="submit" name="edit" value="<?php echo $result->id; ?>">
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

            <?php
            require_once "public/config/footer.php";
            ?>
    </body>

    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

    </html>

<?php } ?>