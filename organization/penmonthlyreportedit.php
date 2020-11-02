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
            <h4 class="modal-title">Edit Reports</h4>
        </div>
        <div class="modal-body">

            <?php
            if (isset($_POST['edit'])) {
                $sn = $_POST['edit'];

                $month = $_POST['month'];
                $hours = $_POST['hours'];
                $name = $_POST['name'];
                $activity = $_POST['activity'];
                $activity_status = $_POST['activity_status'];
                $field_status = $_POST['field_status'];
                $manager = $_SESSION['org_id'];
                $type = "pen";

                $sql = "UPDATE `monthlyreport` SET `month`=:month,`name`=:name,`hours`=:hours,`activity`=:activity,`activity_status`=:activity_status,`field_status`=:field_status WHERE id=(:sn)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':month', $month, PDO::PARAM_STR);
                $query->bindParam(':name', $name, PDO::PARAM_STR);
                $query->bindParam(':hours', $hours, PDO::PARAM_STR);
                $query->bindParam(':activity', $activity, PDO::PARAM_STR);
                $query->bindParam(':activity_status', $activity_status, PDO::PARAM_STR);
                $query->bindParam(':field_status', $field_status, PDO::PARAM_STR);
                $query->bindValue(':sn', $sn, PDO::PARAM_STR);
                $query->execute();
                $msg = "Rent Updated Successfully";

                header('location:penmonthlyreport.php');
            } elseif (isset($_GET['s'])) {
                $sn = $_GET['s'];


                $sql = "SELECT * from `monthlyreport` WHERE id=(:idedit)";
                $query = $dbh->prepare($sql);
                $query->bindValue(':idedit', $sn, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetch(PDO::FETCH_OBJ);


            ?>
                <form action="penmonthlyreportedit.php" method="POST" class="forma">
                    <p>
                        <label for="month">month</label>
                        <input type="month" name="month" value="<?php echo $results->month ?>">
                    </p>

                    <p>
                        <label for="name">pen</label>
                        <select name="name" id="">
                            <?php
                            $s = "SELECT * FROM `locations` WHERE data_type = 'pen' AND org_id = org_id";
                            $q = $dbh->prepare($s);
                            $q->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                            $q->execute();
                            $res = $q->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($q->rowCount() > 0) {
                                foreach ($res as $re) {                ?>
                                    <option value="<?php echo htmlentities($re->id); ?>">
                                        <?php echo htmlentities($re->name); ?></option>
                            <?php $cnt = $cnt + 1;
                                }
                            } ?>
                        </select>
                    </p>


                    <p>
                        <label for="hour">Hours</label>
                        <input type="number" name="hours" value="<?php echo $results->hours ?>">

                    </p>

                    <p>
                        <label for="activity">Activity</label>
                        <textarea name="activity" id="" cols="30" rows="10"><?php echo $results->activity ?></textarea>
                    </p>

                    <p>
                        <label for="activity_status">Activity Status</label>
                        <select name="activity_status" id="">
                            <option value="Completed">Completed</option>
                            <option value="On Going">On Going</option>
                        </select>
                    </p>

                    <p>
                        <label for="field_status">pen Status</label>
                        <input type="range" name="field_status" id="" min="1" max="5" step="1" value="<?php echo $result->field_status ?>">
                    </p>

                    <p>
                        <button type="submit" name="edit" value="<?php echo $results->id ?>">
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