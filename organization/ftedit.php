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
        require_once "public/config/header.php";
        ?>

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Edit Facilities</h4>
        </div>
        <div class="modal-body">

            <?php
            if (isset($_POST['edit'])) {
                $sn = $_POST['edit'];
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

                $sql = "UPDATE `building` SET `capacity`=:capacity,`type`=:type,`purpose`=:purpose,`status`=:status,`utilization`=:utilization,`start_season`=:start_season,`end_season`=:end_season,`ownership`=:ownership,`fallow`=:fallow,`manager`=:manager WHERE sn=(:sn)";
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
                $query->bindValue(':sn', $sn, PDO::PARAM_STR);
                $query->execute();
                $msg = "Rent Updated Successfully";

                header('location:ftlist.php');
            } elseif (isset($_GET['s'])) {
                $sn = $_GET['s'];


                $sql = "SELECT * from `building` WHERE sn=(:idedit)";
                $query = $dbh->prepare($sql);
                $query->bindValue(':idedit', $sn, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetch(PDO::FETCH_OBJ);


            ?>
                <form action="ftedit.php" method="POST" class="forma">
                    <p>
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?php echo ($results->name); ?>" disabled>
                    </p>


                    <p>
                        <label for="size">Size</label>
                        <input type="text" name="size" value="<?php echo ($results->size); ?>" disabled>
                    </p>

                    <p>
                        <label for="latitude">Latitude</label>
                        <input type="text" name="latitude" value="<?php echo ($results->lat); ?>" disabled>
                    </p>

                    <p>
                        <label for="longitude">Longitude</label>
                        <input type="text" name="longitude" value="<?php echo ($results->lng); ?>" disabled>
                    </p>

                    <p>
                        <label for="capacity">Capacity</label>
                        <input type="text" name="capacity" value="<?php echo ($results->capacity); ?>">
                    </p>

                    <p>
                        <label for="type">Type</label>
                        <input type="text" name="type" value="<?php echo ($results->type); ?>">
                    </p>

                    <p>
                        <label for="purpose">Purpose</label>
                        <input type="text" name="purpose" value="<?php echo ($results->purpose); ?>">
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
                        <input type="text" name="utilization" value="<?php echo ($results->utilization); ?>">
                    </p>


                    <p>
                        <label for="start_season">Start Season</label>
                        <input type="date" name="start_season" value="<?php echo ($results->start_season); ?>">
                    </p>

                    <p>
                        <label for="end_season">End Season</label>
                        <input type="date" name="end_season" value="<?php echo ($results->end_season); ?>">
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
                        <input type="text" name="fallow" value="<?php echo ($results->fallow); ?>">
                    </p>

                    <p>
                        <label for="manager">Manager</label>
                        <input type="text" name="manager" value="">
                    </p>

                    <p>
                        <button type="submit" name="edit" value="<?php echo $sn; ?>">
                            Submit
                        </button>
                    </p>

                </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">OK</button>
        </div>

        <?php
                require_once "public/config/footer.php";
        ?>

    </body>

    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

    </html>


<?php
            }
        }


?>