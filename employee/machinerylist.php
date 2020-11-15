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

        $sql = "delete from machinery WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Data Deleted successfully";
        header('location:machinerylist.php');
    }
    if (isset($_POST['submit'])) {

        $category = $_POST['category'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $snum = $_POST['snum'];
        $amount = $_POST['amount'];
        $manufacturer = $_POST['manufacturer'];
        $user_id = $_SESSION['user_id'];
        $org_id = $_SESSION['org_id'];

        $sql = "INSERT INTO `machinery`(`category`, `name`, `user_id`, `description`, `amount`, `serial_no`, `manufacturer`, `org_id`) VALUES (:category, :name, :user_id, :description, :amount, :serial_no, :manufacturer, :org_id)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':category', $category, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->bindParam(':serial_no', $snum, PDO::PARAM_STR);
        $query->bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
        $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Rent Updated Successfully";
        header('location:machinerylist.php');
    }

    if (isset($_POST['edit'])) {
        $id = $_POST['edit'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $amount = $_POST['amount'];
        $serial_no = $_POST['snum'];
        $manufacturer = $_POST['manufacturer'];
        $category = $_POST['category'];

        $sql = "UPDATE `machinery` SET `name`=(:name), `description`=(:description), `serial_no`=(:serial_no), `amount`=(:amount), `manufacturer`=(:manufacturer), `category`=(:category) WHERE id=(:id)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->bindParam(':serial_no', $serial_no, PDO::PARAM_STR);
        $query->bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
        $query->bindParam(':category', $category, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Updated Successfully";

        header('location:machinerylist.php');
    }

    if (isset($_POST['update'])) {
        $id = $_POST['update'];
        $state = $_POST['state'];

        $sql = "UPDATE `machinery` SET `state`=(:state) WHERE id=(:id)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':state', $state, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Updated Successfully";

        header('location:machinerylist.php');
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
                <div class="row  dashboard-header">
                    <div class="panel-heading" style='padding:0;'>
                        <h2 class="page-title">Manage Machinery</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">


                        <!-- button style Start -->
                        <div class="navbar">
                            <div class="container-fluid" style='padding-left:7px;'>
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Category</a>
                                </h1>

                                <h1 class="nav navbar-nav navbar-right">
                                    <a class="btn btn-md btn-primary" href="#add2" data-target="#add2" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Item</a>
                                </h1>
                            </div>
                        </div>
                        <!-- button style End -->

                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">List Users</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?>
                                    </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb" class="display table table-dark table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>Manufacturer</th>
                                            <th>Item Serial Number</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from `machinery` where user_id = :user_id";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {                ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->category); ?></td>
                                                    <td>
                                                        <a data-toggle="modal" href="#status<?= $cnt ?>" data-toggle="modal" data-target="#status<?= $cnt ?>">&nbsp;
                                                            <?php echo htmlentities($result->name); ?></a>&nbsp;&nbsp;

                                                        <div class="modal fade" id="status<?= $cnt ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content" style="height:auto">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span></button>
                                                                        <h4 class="modal-title">Status</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row shop-tracking-status">

                                                                            <div class="col-md-12">
                                                                                <div class="well">

                                                                                    <form action="<?= $_SERVER['PHP_SELF'] ?>" class="form-horizontal" method="POST">
                                                                                        <div class="form-group">
                                                                                            <label for="inputOrderTrackingID" class="col-sm-2 control-label">Status </label>
                                                                                            <div class="col-sm-10">
                                                                                                <select name="state" id="inputOrderTrackingID" class="form-control">
                                                                                                    <option value="1" <?= $result->state == 1 ? 'SELECTED' : '' ?>>Accepted</option>
                                                                                                    <option value="2" <?= $result->state == 2 ? 'SELECTED' : '' ?>>In Progress</option>
                                                                                                    <option value="3" <?= $result->state == 3 ? 'SELECTED' : '' ?>>Shipped</option>
                                                                                                    <option value="4" <?= $result->state == 4 ? 'SELECTED' : '' ?>>Delivered</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <div class="col-sm-offset-2 col-sm-10">
                                                                                                <button type="submit" id="shopGetOrderStatusID" class="btn btn-success" name="update" value="<?= $result->id ?>">Update Status</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>

                                                                                    <h4>Your order status:</h4>

                                                                                    <ul class="list-group">
                                                                                        <li class="list-group-item">
                                                                                            <span class="prefix">Item Name:</span>
                                                                                            <span class="label label-success"><?php echo htmlentities($result->name); ?></span>
                                                                                        </li>
                                                                                        <li class="list-group-item">
                                                                                            <span class="prefix">Date created:</span>
                                                                                            <span class="label label-success"><?php echo htmlentities($result->date); ?></span>
                                                                                        </li>
                                                                                        <li class="list-group-item">
                                                                                            <span class="prefix">Last update:</span>
                                                                                            <span class="label label-success"><?php echo htmlentities($result->updated_at); ?></span>
                                                                                        </li>
                                                                                    </ul>

                                                                                    <div class="order-status">

                                                                                        <div class="order-status-timeline">
                                                                                            <!-- class names: c0 c1 c2 c3 and c4 -->
                                                                                            <?php
                                                                                            switch ($result->state) {
                                                                                                case 1:
                                                                                                    $state = 'c0';
                                                                                                    break;
                                                                                                case 2:
                                                                                                    $state = 'c1';
                                                                                                    break;
                                                                                                case 3:
                                                                                                    $state = 'c2';
                                                                                                    break;
                                                                                                case 4:
                                                                                                    $state = 'c3';
                                                                                                    break;
                                                                                                default:
                                                                                                    $state = 'c4';
                                                                                                    break;
                                                                                            }
                                                                                            ?>
                                                                                            <div class="order-status-timeline-completion <?= $state ?>"></div>
                                                                                        </div>

                                                                                        <div class="image-order-status image-order-status-new active img-circle">
                                                                                            <span class="status">Accepted</span>
                                                                                            <div class="icon"></div>
                                                                                        </div>
                                                                                        <div class="image-order-status image-order-status-active active img-circle">
                                                                                            <span class="status">In progress</span>
                                                                                            <div class="icon"></div>
                                                                                        </div>
                                                                                        <div class="image-order-status image-order-status-intransit active img-circle">
                                                                                            <span class="status">Shipped</span>
                                                                                            <div class="icon"></div>
                                                                                        </div>
                                                                                        <div class="image-order-status image-order-status-delivered active img-circle">
                                                                                            <span class="status">Delivered</span>
                                                                                            <div class="icon"></div>
                                                                                        </div>
                                                                                        <div class="image-order-status image-order-status-completed active img-circle">
                                                                                            <span class="status">Completed</span>
                                                                                            <div class="icon"></div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">

                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!--end of modal-dialog-->
                                                    </td>
                                                    <td><?php echo htmlentities($result->description); ?></td>
                                                    <td><?php echo htmlentities($result->amount); ?></td>
                                                    <td><?php echo htmlentities($result->manufacturer); ?></td>
                                                    <td><?php echo htmlentities($result->serial_no); ?></td>
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
                                                                        <form action="machinerylist.php" method="POST" class="forma">

                                                                            <p>
                                                                                <select name="category" id="">
                                                                                    <option selected disabled>Select</option>
                                                                                    <?php
                                                                                    $s = "SELECT * FROM `asset` WHERE item LIKE 'Machinery'";
                                                                                    $q = $dbh->prepare($s);
                                                                                    $q->execute();
                                                                                    $res = $q->fetchAll(PDO::FETCH_OBJ);

                                                                                    if ($q->rowCount() > 0) {
                                                                                        foreach ($res as $re) { ?>
                                                                                            <option value="<?php echo htmlentities($re->category); ?>" <?= $re->category == $result->category ? 'SELECTED' : '' ?>>
                                                                                                <?php echo htmlentities($re->category); ?></option>
                                                                                    <?php
                                                                                        }
                                                                                    } ?>
                                                                                </select>
                                                                            </p>

                                                                            <p>
                                                                                <label for="name">Name</label>
                                                                                <input type="text" name="name" value="<?php echo ($result->name); ?>">
                                                                            </p>


                                                                            <p>
                                                                                <label for="description">Description</label>
                                                                                <input type="text" name="description" value="<?php echo ($result->description); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="snum">Item Serial Number</label>
                                                                                <input type="text" name="snum" value="<?php echo ($result->serial_no); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="Manufacturer">Manufacturer</label>
                                                                                <input type="text" name="manufacturer" value="<?php echo ($result->manufacturer); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="amount">Amount</label>
                                                                                <input type="text" name="amount" value="<?php echo ($result->amount); ?>">
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

                                                        <a href="machinerylist.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
                                                    </td>

                                                    <!-- Action Button End -->


                                                </tr>
                                        <?php $cnt = $cnt + 1;
                                            }
                                        } ?>

                                    </tbody>
                                </table>
                            </div>

                            <div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Add New Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="machinerylist.php" method="POST" class="forma">
                                                <p>
                                                    <select name="category" id="">
                                                        <?php
                                                        $sql = "SELECT * FROM `asset` WHERE item LIKE 'Machinery'";
                                                        $query = $dbh->prepare($sql);
                                                        $query->execute();
                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt = 1;
                                                        if ($query->rowCount() > 0) {
                                                            foreach ($results as $result) {                ?>
                                                                <option value="<?php echo htmlentities($result->category); ?>">
                                                                    <?php echo htmlentities($result->category); ?></option>
                                                        <?php $cnt = $cnt + 1;
                                                            }
                                                        } ?>
                                                    </select>
                                                </p>


                                                <p>
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" value="">
                                                </p>


                                                <p>
                                                    <label for="description">Description</label>
                                                    <input type="text" name="description" value="">
                                                </p>

                                                <p>
                                                    <label for="snum">Item Serial Number</label>
                                                    <input type="text" name="snum" value="">
                                                </p>

                                                <p>
                                                    <label for="amount">Manufacturer</label>
                                                    <input type="text" name="manufacturer" value="">
                                                </p>

                                                <p>
                                                    <label for="amount">Amount</label>
                                                    <input type="text" name="amount" value="">
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

                                </div>
                            </div>
                            <!--end of modal-dialog-->

                            <div id="add2" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Add New Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="assetcat.php" method="POST" class="forma">
                                                <p>
                                                    <label for="full_name">Item</label>
                                                    <input type="text" name="item" value="Machinery">
                                                </p>

                                                <p>
                                                    <label for="amount">Category</label>
                                                    <input type="text" name="category" value="">
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

                                </div>

                            </div>
                            <!--end of modal-dialog-->


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