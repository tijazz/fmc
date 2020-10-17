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

    <!DOCTYPE html><?php
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
                        require_once "public/config/header.php"; ?>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Title</h4>
            </div>
            <div class="modal-body">

                <?php
                        if (isset($_POST['edit'])) {
                            $sn = $_POST['edit'];
                            $name = $_POST['name'];

                            $ppunit = $_POST['ppunit'];
                            $qitem = $_POST['qitem'];
                            $amount = $_POST['amount'];

                            $sql = "UPDATE `security` SET `name`=(:name), `ppunit`=(:ppunit), `qitem`=(:qitem), `amount`=(:amount) WHERE id=(:sn)";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':name', $name, PDO::PARAM_STR);
                            $query->bindParam(':ppunit', $ppunit, PDO::PARAM_STR);
                            $query->bindParam(':qitem', $qitem, PDO::PARAM_STR);
                            $query->bindParam(':amount', $amount, PDO::PARAM_STR);
                            $query->bindValue(':sn', $sn, PDO::PARAM_STR);
                            $query->execute();
                            $msg = "security Updated Successfully";

                            header('location:securitylist.php');
                        } elseif (isset($_GET['s'])) {
                            $sn = $_GET['s'];


                            $sql = "SELECT * from `security` WHERE id=(:idedit)";
                            $query = $dbh->prepare($sql);
                            $query->bindValue(':idedit', $sn, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetch(PDO::FETCH_OBJ); ?>
                    <form action="securityedit.php" method="POST" class="forma">

                        <p>
                            <label for="full_name">Category</label>
                            <select name="name" id="">
                                <option value="cctv" <?php $results->name == 'cctv' ? "SELECTED" : "1" ?>>CCTV</option>
                                <option value="gatemen" <?php $results->name == 'gateman' ? "SELECTED" : "2" ?>>Gatemen</option>
                                <option value="other" <?php $results->name == 'other' ? "SELECTED" : "3" ?>>Other</option>
                            </select>
                        </p>

                        <p>
                            <label for="sn">Price per Unit of Item</label>
                            <input type="text" name="ppunit" value="<?php echo $results->ppunit ?>" id="ppunit">
                        </p>
                        <p>
                            <label for="full_name">Quantity of Item</label>
                            <input type="text" name="qitem" value="<?php echo $results->qitem ?>" id="qitem">
                        </p>

                        <p>
                            <label for="amount">Cost</label>
                            <input type="text" name="amount" value="<?php echo $results->amount ?>" id="amount">
                        </p>

                        <script>
                            $("#amount").click(function() {
                                var amt = $('#ppunit').val();

                                var qua = $('#qitem').val();

                                var amount = parseInt(amt) * parseInt(qua);

                                $("#amount").val(amount);
                            });
                        </script>


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
                            require_once "public/config/footer.php"; ?>

        </body>

        <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

        </html>


<?php
                        }
                    }
                }

?>