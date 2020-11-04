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
        $quantity = $_POST['quantity'];

        $sql = "UPDATE `product` SET `quantity`=(:quantity) WHERE id=(:id)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':quantity', $quantity, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Quantity Updated Successfully";

        header('location:quantity.php');
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
                        <h2 class="page-title">Manage Quantity</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">




                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Quantity list</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?>
                                    </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb tablePreview" class="display table table-dark table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Id</th>
                                            <th>User Id</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from `product`";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {                ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->product_id); ?></td>
                                                    <td><?php echo htmlentities($result->user_id); ?></td>
                                                    <td><?php echo htmlentities($result->product_name); ?></td>
                                                    <td><?php echo htmlentities($result->quantity); ?></td>

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

                                                                        <form action="quantityedit.php" method="POST" class="forma">
                                                                            <p>
                                                                                <label for="name">Product id</label>
                                                                                <input type="text" name="product_id" value="<?php echo ($result->product_id); ?>" readonly>
                                                                            </p>


                                                                            <p>
                                                                                <label for="description">User Id</label>
                                                                                <input type="text" name="user_id" value="<?php echo ($result->user_id); ?>" readonly>
                                                                            </p>

                                                                            <p>
                                                                                <label for="size">Product Name</label>
                                                                                <input type="text" name="product_name" value="<?php echo ($result->product_name); ?>" readonly>
                                                                            </p>
                                                                            <p>
                                                                                <label for="size">Quantity</label>
                                                                                <input type="text" name="quantity" value="">
                                                                            </p>


                                                                            <p>
                                                                                <button type="submit" name="edit" value="<?php echo $id; ?>">
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

        </div>

        <?php
        require_once "public/config/footer.php";
        ?>
    </body>

    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

    </html>

<?php } ?>