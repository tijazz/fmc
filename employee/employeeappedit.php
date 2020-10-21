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
            $idedit = $_POST['submit'];
            $empwor_id = $_POST['empwor_id'];
            $manager = $_POST['manager'];
            $resp = $_POST['resp'];
            $manager_rating = $_POST['manager_rating'];
            $date = $_POST['date'];


            $sql = "UPDATE appraisal SET empwor_id=(:empwor_id), manager=(:manager), resp=(:resp), manager_rating=(:manager_rating), date=(:date) WHERE id=(:idedit)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':empwor_id', $empwor_id, PDO::PARAM_STR);
            $query->bindParam(':manager', $manager, PDO::PARAM_STR);
            $query->bindParam(':resp', $resp, PDO::PARAM_STR);
            $query->bindParam(':manager_rating', $manager_rating, PDO::PARAM_STR);
            $query->bindParam(':date', $date, PDO::PARAM_STR);
            $query->bindParam(':idedit', $idedit, PDO::PARAM_STR);
            $query->execute();
            $msg = "Information Updated Successfully";
            
            header('location:employeeappraisal.php');
        } elseif (isset($_GET['s'])) {
            $sn = $_GET['s'];



        ?>


            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Edit Building</h4>
            </div>
            <div class="modal-body">


                <form action="employeeappedit.php" method="POST" class="forma" enctype="multipart/form-data" onSubmit="return validate()">
                    <?php
                    $sql = "SELECT * FROM `appraisal` WHERE id = :id";
                    $query = $dbh->prepare($sql);
                    $query->bindValue(":id", $sn, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetch(PDO::FETCH_OBJ);
                    ?>

                    <p>
                        <label for="date">Date</label>
                        <input type="date" name="date" value="<?php echo $results->date ?>">
                    </p>

                    <p>
                        <label for="empwor_id">Name</label>
                        <select name="empwor_id" id="">
                            <?php
                            $s = "SELECT * FROM `employee` WHERE org_id = :org_id";
                            $q = $dbh->prepare($s);
                            $q->bindValue(":org_id", $_SESSION['id'], PDO::PARAM_STR);
                            $q->execute();
                            $rs = $q->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($q->rowCount() > 0) {
                                foreach ($rs as $r) { ?>
                                    <option value="<?php echo $r->id ?>" <?= ($results->empwor_id == $r->id) ? "SELECTED" : "" ?>><?php echo $r->name ?></option>
                            <?php  }
                            } ?>

                        </select>
                    </p>

                    <p>
                        <label for="manager">Manager</label>
                        <select name="manager" id="">
                            <?php
                            $s = "SELECT * FROM `employee` WHERE org_id = :org_id";
                            $q = $dbh->prepare($s);
                            $q->bindValue(":org_id", $_SESSION['org_id'], PDO::PARAM_STR);
                            $q->execute();
                            $rs = $q->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($q->rowCount() > 0) {
                                foreach ($rs as $r) { ?>
                                    <option value="<?php echo $r->id ?>" <?= ($results->manager == $r->id) ? "SELECTED" : "" ?>><?php echo $r->name ?></option>
                            <?php  }
                            } ?>

                        </select>
                    </p>


                    <p>
                        <label for="resp">Responsibilities</label>
                        <textarea name="resp" id="resp" cols="30" rows="10"><?php echo $results->resp ?></textarea>


                    </p>

                    <p>
                        <label for="manager_rating">Manager's Rating</label>
                        <input type="range" name="manager_rating" min="1" max="5" value="<?php echo $results->manager_rating ?>">


                    </p>

                    <p>
                        <button type="submit" name="submit" value="<?php echo $results->id ?>">
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
        }
        require_once "public/config/footer.php";
        ?>

    </body>

    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

    </html>


<?php

}


?>