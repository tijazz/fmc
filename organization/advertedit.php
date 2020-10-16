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
            <h4 class="modal-title">Title</h4>
        </div>
        <div class="modal-body">

            <?php
            if (isset($_POST['edit'])) {
                $sn = $_POST['edit'];
                $type = $_POST['type'];
                $name = $_POST['name'];
                $description = $_POST['description'];
                $amount = $_POST['amount'];

                $sql = "UPDATE `advert` SET `type`=(:type), `name`=(:name), `description`=(:description), `amount`=(:amount) WHERE id=(:sn)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':type', $type, PDO::PARAM_STR);
                $query->bindParam(':name', $name, PDO::PARAM_STR);
                $query->bindParam(':description', $description, PDO::PARAM_STR);
                $query->bindParam(':amount', $amount, PDO::PARAM_STR);
                $query->bindValue(':sn', $sn, PDO::PARAM_STR);
                $query->execute();
                $msg = "Rent Updated Successfully";

                header('location:advertlist.php');
            } elseif (isset($_GET['s'])) {
                $sn = $_GET['s'];


                $sql = "SELECT * from `advert` WHERE id=(:idedit)";
                $query = $dbh->prepare($sql);
                $query->bindValue(':idedit', $sn, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetch(PDO::FETCH_OBJ);


            ?>
                <form action="advertedit.php" method="POST" class="forma">
                    <p>
                        <select name="type">
                            <option value="tv" <?php $results->type == 'tv' ? 'SELECTED' : '' ?>>TV</option>
                            <option value="radio" <?php $results->type == 'radio' ? 'SELECTED' : '' ?>>Radio</option>
                            <option value="social media" <?php $results->type == 'social media' ? 'SELECTED' : '' ?>>Social Media</option>
                            <option value="print" <?php $results->type == 'print' ? 'SELECTED' : '' ?>>Print</option>
                            <option value="others" <?php $results->type == 'others' ? 'SELECTED' : '' ?>>Others</option>
                        </select>
                    </p>

                    <p>
                        <label for="full_name">Name</label>
                        <input type="text" name="name" value="<?php echo $results->name ?>">
                    </p>
                    <p>
                        <label for="full_name">Description of Advert</label>
                        <input type="text" name="description" value="<?php echo $results->description ?>">
                    </p>

                    <p>
                        <label for="amount">Amount of Advert</label>
                        <input type="text" name="amount" value="<?php echo $results->amount ?>">
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