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
        $sn = $_POST['edit'];
        $type = $_POST['type'];
        $item_id = $_POST['item_id'];
        $description = $_POST['description'];
        $amount = $_POST['amount'];
        $date = $_POST['date'];

        $bind = $sql = "UPDATE `maintenance` SET `item_id`=(:item_id), `type`=(:type), `description`=(:description), `amount`=(:amount), `date`=(:date) WHERE id=(:sn)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':item_id', $item_id, PDO::PARAM_STR);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindValue(':sn', $sn, PDO::PARAM_STR);
        $query->execute();
        $msg = "Rent Updated Successfully";

       

        header('location:maintenancelist.php');
    } elseif (isset($_GET['s'])) {
        $sn = $_GET['s'];
        $type = $_GET['type'];


        $sql = "SELECT * from `maintenance` WHERE id=(:idedit)";
        $query = $dbh->prepare($sql);
        $query->bindValue(':idedit', $sn, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);

?>

        <!DOCTYPE html>
        <html>

        <body>

            <?php
            require_once "public/config/header.php";
            ?>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Edit Maintenance</h4>
            </div>
            <div class="modal-body">


                <form action="maintenanceedit.php" method="POST" class="forma">
                    <input type="text" name="type" value="<?php echo $type ?>" hidden>
                    <p>
                        <label for="name">Name</label>
                        <select name="item_id" id="">
                            <?php
                            $s = "SELECT * from " . $type . " WHERE org_id = :org_id";
                            $q = $dbh->prepare($s);
                            $q->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                            $q->execute();
                            $res = $q->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($res as $re) { ?>
                                    <option value="<?php echo $re->sn ?>" <?php echo $result->item_id == $re->sn ? 'SELECTED' : 'nothing'; ?>><?php echo $re->name ?></option>

                            <?php }
                            }             ?>

                        </select>
                    </p>

                    <p>
                        <?echo var_dump($result) ?>
                    </p>

                    <p>
                        <label for="description">Description</label>
                        <input type="text" name="description" value="<?php echo $result->description ?>">
                    </p>

                    <p>
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" value="<?php echo $result->amount ?>">
                    </p>

                    <p>
                        <label for="date">Date</label>
                        <input type="date" name="date" value="<?php echo $result->date ?>">
                    </p>

                    <p>
                        <button type="submit" name="edit" value="<?php echo $result->id ?>">
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