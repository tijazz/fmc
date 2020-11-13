<?php
session_start();

error_reporting(0);
$error = "";
$msg = "";
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['del'])) {
        $id = $_GET['del'];

        $sql = "delete from warehouse WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
    }

    if (isset($_POST['submit'])) {


        $product = $_POST['product'];
        $user_id = $_SESSION['user_id'];
        $org_id = $_SESSION['org_id'];
        $warehouse = $_POST['warehouse'];
        $quantity = $_POST['quantity'];
        $status = $_POST['status'];

        $sql = "INSERT INTO `warehouse`(`product_id`, `user_id`, `org_id`, `warehouse`, `quantity`, `status`)
	VALUES (:product, :user_id, :org_id, :warehouse, :quantity, :status)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':product', $product, PDO::PARAM_STR);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
        $query->bindParam(':warehouse', $warehouse, PDO::PARAM_STR);
        $query->bindParam(':quantity', $quantity, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();

        echo var_dump($sql);
        $msg = "Product Updated Successfully";
        header('location:warehouselist.php');
    }

    if (isset($_POST['edit'])) {
        $id = $_POST['edit'];
        $product = $_POST['product'];
        $warehouse = $_POST['warehouse'];
        $quantity = $_POST['quantity'];
        $status = $_POST['status'];

        $sql = "UPDATE `warehouse` SET `product_id`=(:product), `warehouse`=(:warehouse), `quantity`=(:quantity), `status`=(:status) WHERE id=(:id)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':product', $product, PDO::PARAM_STR);
        $query->bindParam(':warehouse', $warehouse, PDO::PARAM_STR);
        $query->bindParam(':quantity', $quantity, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Product Updated Successfully";

        header('location:warehouselist.php');
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
                        <h2 class="page-title">Manage WareHouse</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <!-- button style Start -->
                        <div class="navbar">
                            <div class="container-fluid" style='padding-left:7px;'>
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add to Warehouse</a>
                                </h1>
                            </div>
                        </div>
                        <!-- button style End -->
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">List Warehouses</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?>
                                    </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb" class="display table table-dark table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Warehouse</th>
                                            <th>Location</th>
                                            <th>Status of Stock</th>
                                            <th>Status of Ware House</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        $sql = "SELECT * from `warehouse` WHERE org_id=:org_id ORDER BY id DESC";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {                ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <?php
                                                    $s = "SELECT * FROM `product` WHERE id=:id";
                                                    $q = $dbh->prepare($s);
                                                    $q->bindParam(':id', $result->product_id, PDO::PARAM_STR);
                                                    $q->execute();
                                                    $res = $q->fetch(PDO::FETCH_OBJ);

                                                    ?>
                                                    <td><?php echo htmlentities($res->name);; ?></td>
                                                    <td><?php echo htmlentities($result->quantity); ?></td>
                                                    <?php
                                                    $s = "SELECT * FROM `building` WHERE id=:id";
                                                    $q = $dbh->prepare($s);
                                                    $q->bindParam(':id', $result->warehouse, PDO::PARAM_STR);
                                                    $q->execute();
                                                    $res = $q->fetch(PDO::FETCH_OBJ);

                                                    ?>
                                                    <td><?php echo htmlentities($res->name); ?></td>
                                                    <td><?php echo htmlentities($res->location); ?></td>
                                                    <td><?php echo htmlentities($result->stock_status); ?></td>
                                                    <td><?php echo htmlentities($result->status); ?></td>
                                                    <td><?php echo htmlentities($result->date); ?></td>

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

                                                                        <form action="warehouselist.php" method="POST" class="forma">

                                                                            <p>
                                                                                <label for="product">Products</label>
                                                                                <select name="product" id="">
                                                                                    <?php
                                                                                    $sq = "SELECT * FROM `product` WHERE org_id=:org_id";
                                                                                    $qu = $dbh->prepare($sq);
                                                                                    $qu->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                                                    $qu->execute();
                                                                                    $res = $qu->fetchAll(PDO::FETCH_OBJ);

                                                                                    if ($query->rowCount() > 0) {
                                                                                        foreach ($res as $re) {                ?>
                                                                                            <option value="<?php echo htmlentities($re->id); ?>">
                                                                                                <?php echo htmlentities($re->name); ?></option>
                                                                                    <?php
                                                                                        }
                                                                                    } ?>
                                                                                </select>
                                                                            </p>

                                                                            <p>
                                                                                <label for="warehouse">WareHouse</label>
                                                                                <select name="warehouse" id="">
                                                                                    <?php
                                                                                    $s = "SELECT * FROM `building` WHERE org_id=:org_id";
                                                                                    $q = $dbh->prepare($s);
                                                                                    $q->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                                                    $q->execute();
                                                                                    $rs = $q->fetchAll(PDO::FETCH_OBJ);
                                                                                    if ($query->rowCount() > 0) {
                                                                                        foreach ($rs as $r) {                ?>
                                                                                            <option value="<?php echo htmlentities($rt->id); ?>">
                                                                                                <?php echo htmlentities($r->name); ?></option>
                                                                                    <?php
                                                                                        }
                                                                                    } ?>
                                                                                </select>
                                                                            </p>

                                                                            <p>
                                                                                <label for="quantity">Quantity</label>
                                                                                <input type="text" name="quantity" value="<?php echo $result->quantity; ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="status">Status</label>
                                                                                <select name="status">
                                                                                    <option value="closed">Closed</option>
                                                                                    <option value="open">Open</option>
                                                                                </select>
                                                                            </p>


                                                                            <p>
                                                                                <button type="submit" name="edit" value="<?php echo ($result->id); ?>">
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

                                                        <a href="warehouselist.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
                                                    </td>

                                                    <!-- Action Button End -->
                                                </tr>
                                        <?php $cnt = $cnt + 1;
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>

                            <div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Add New Warehouse</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="warehouselist.php" method="POST" class="forma">

                                                <p>
                                                    <label for="product">Products</label>
                                                    <select name="product" id="">
                                                        <option selected disabled>Select</option>
                                                        <?php
                                                        $sql = "SELECT * FROM `product` WHERE org_id=:org_id";
                                                        $query = $dbh->prepare($sql);
                                                        $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                        $query->execute();
                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        if ($query->rowCount() > 0) {
                                                            foreach ($results as $result) {                ?>
                                                                <option value="<?php echo htmlentities($result->id); ?>">
                                                                    <?php echo htmlentities($result->name); ?></option>
                                                        <?php
                                                            }
                                                        } ?>
                                                    </select>
                                                </p>

                                                <p>
                                                    <label for="warehouse">WareHouse</label>
                                                    <select name="warehouse" id="">
                                                        <option selected disabled>Select</option>
                                                        <?php
                                                        $sql = "SELECT * FROM `building` WHERE org_id=:org_id";
                                                        $query = $dbh->prepare($sql);
                                                        $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                        $query->execute();
                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt = 1;
                                                        if ($query->rowCount() > 0) {
                                                            foreach ($results as $result) {                ?>
                                                                <option value="<?php echo htmlentities($result->id); ?>">
                                                                    <?php echo htmlentities($result->name); ?></option>
                                                        <?php $cnt = $cnt + 1;
                                                            }
                                                        } ?>
                                                    </select>
                                                </p>

                                                <p>
                                                    <label for="quantity">Quantity</label>
                                                    <input type="text" name="quantity" value="">
                                                </p>

                                                <p>
                                                    <label for="status">Status</label>
                                                    <select name="status">
                                                        <option value="closed">Closed</option>
                                                        <option value="open">Open</option>
                                                    </select>
                                                </p>

                                                <p>
                                                    <button type="submit" name="submit">
                                                        Submit
                                                    </button>
                                                </p>

                                            </form>
                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                    <!--end of modal-dialog-->
                                </div>

                                <!---
                <div class="col-lg-4">
                        <?php
                        //    require_once "public/config/right-sidebar.php";
                        ?>

                            </div>
                                                    -->
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