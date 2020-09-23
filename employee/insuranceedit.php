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
            <h4 class="modal-title">Edit Building</h4>
        </div>
        <div class="modal-body">

            <?php
            if (isset($_POST['edit'])) {
                $name = $_POST['name'];
                $item = $_POST['item'];
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
                $amount = $_POST['amount'];
                $amount_paid = $_POST['amount_paid'];
                $period = $_POST['period'];
                $company = $_POST['company'];
                $id = $_POST['edit'];

                $sql = "UPDATE `insurance` SET `name`=(:name), `item`=(:item), `start_date`=(:start_date), `end_date`=(:end_date), `amount`=(:amount), `amount_paid`=(:amount_paid), `period`=(:period), `company`=(:company) WHERE id=(:id)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':name', $name, PDO::PARAM_STR);
                $query->bindParam(':item', $item, PDO::PARAM_STR);
                $query->bindParam(':start_date', $start_date, PDO::PARAM_STR);
                $query->bindParam(':end_date', $end_date, PDO::PARAM_STR);
                $query->bindParam(':amount', $amount, PDO::PARAM_STR);
                $query->bindParam(':amount_paid', $amount_paid, PDO::PARAM_STR);
                $query->bindParam(':period', $period, PDO::PARAM_STR);
                $query->bindParam(':company', $company, PDO::PARAM_STR);
                $query->bindValue(':id', $id, PDO::PARAM_STR);
                $query->execute();
                $msg = "Rent Updated Successfully";

                header('location:insurancelist.php');
            } elseif (isset($_GET['s'])) {
                $sn = $_GET['s'];


                $sql = "SELECT * from `insurance` WHERE id=(:idedit)";
                $query = $dbh->prepare($sql);
                $query->bindValue(':idedit', $sn, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetch(PDO::FETCH_OBJ);


            ?>
                <form action="insuranceedit.php" method="POST" class="forma" id="f_edit">

                    <p>
                        <label for="name">Name of Insurance</label>
                        <input type="text" name="name" value="<?php echo $results->name?>">
                    </p>


                    <p>
                        <label for="item">Item Insured</label>
                        <input type="text" name="item" value="<?php echo $results->item?>">
                    </p>

                    <p>
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" value="<?php echo $results->start_date?>">
                    </p>

                    <p>
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" value="<?php echo $results->end_date?>">
                    </p>

                    <p>
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" value="<?php echo $results->amount?>">
                    </p>

                    <p>
                        <label for="amount_paid">Amount Paid</label>
                        <input type="text" name="amount_paid" value="<?php echo $results->amount_paid?>">
                    </p>

                    <p>
                        <label for="size">Period</label>
                        <input type="text" name="period" value="<?php echo $results->period?>">
                    </p>

                    <p>
                        <label for="size">Company</label>
                        <input type="text" name="company" value="<?php echo $results->company?>">
                    </p>

                    <p>
                        <button type="submit" name="edit" value="<?php echo $results->id?>">
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