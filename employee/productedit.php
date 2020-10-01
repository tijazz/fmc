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
            <h4 class="modal-title">Edit Product</h4>
        </div>
        <div class="modal-body">

            <?php
            if (isset($_POST['edit'])) {
                $sn = $_POST['edit'];
                $name = $_POST['name'];
                $amount = $_POST['amount'];


                $sql = "UPDATE `product` SET `name`=(:name), `amount`=(:amount) WHERE id=(:sn)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':amount', $amount, PDO::PARAM_STR);
                $query->bindParam(':name', $name, PDO::PARAM_STR);
                $query->bindValue(':sn', $sn, PDO::PARAM_STR);
                $query->execute();
                $msg = "Product Updated Successfully";

                header('location:productlist.php');
            } elseif (isset($_GET['s'])) {
                $sn = $_GET['s'];


                $sql = "SELECT * from `product` WHERE id=(:idedit)";
                $query = $dbh->prepare($sql);
                $query->bindValue(':idedit', $sn, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetch(PDO::FETCH_OBJ);


            ?>
                <form action="productedit.php" method="POST" class="forma">


                    <p>
                        <label for="name">Product Name</label>
                        <input type="text" name="name" value="<?php echo $results->name ?>">
                    </p>

                    <p>
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" value="<?php echo $results->amount ?>">
                    </p>

                    <p>
                        <button type="submit" name="edit" value="<?php echo ($results->id); ?>">
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