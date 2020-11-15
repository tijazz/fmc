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

        $sql = "delete from operation WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
    }
    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $manufacturer = $_POST['manufacturer'];
        $amount = $_POST['amount'];
        $status = $_POST['status'];
        $location = $_POST['location'];
        $user_id = $_SESSION['user_id'];
        $org_id = $_SESSION['org_id'];

        $sql = "INSERT INTO `other_asset`(`user_id`, `name`, `description`, `amount`, `quantity`, `manufacturer`, `status`, `location`, `org_id`) VALUES (:user_id, :name, :description, :amount, :quantity, :manufacturer, :status, :location, :org_id)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':quantity', $quantity, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':location', $location, PDO::PARAM_STR);
        $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Rent Updated Successfully";

        header('location:otassetlist.php');
    }
    if (isset($_POST['edit'])) {
        $id = $_POST['edit'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $manufacturer = $_POST['manufacturer'];
        $amount = $_POST['amount'];
        $status = $_POST['status'];
        $location = $_POST['location'];

        $sql = "UPDATE `other_asset` SET `name`=(:name), `description`=(:description), `quantity`=(:quantity), `amount`=(:amount), `manufacturer`=(:manufacturer), `status`=(:status),`location`=(:location) WHERE id=(:id)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':quantity', $quantity, PDO::PARAM_STR);
        $query->bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':location', $location, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Rent Updated Successfully";

        header('location:otassetlist.php');
    }

    if (isset($_POST['update'])) {
        $id = $_POST['update'];
        $state = $_POST['state'];

        $sql = "UPDATE `other_asset` SET `state`=(:state) WHERE id=(:id)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':state', $state, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Updated Successfully";

        header('location:otassetlist.php');
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
                        <h2 class="page-title">Manage Other Tangible Asset</h2>
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
                            <div class="panel-heading">List \other Assets</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow">
                                        <?php echo htmlentities($error); ?>
                                    </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow">
                                        <?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb tablePreview" class="display table table-dark table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Manufacturer</th>
                                            <th>Location</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from `other_asset`  Where user_id=:user_id";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {                ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
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
                                                    <td><?php echo htmlentities($result->quantity); ?></td>
                                                    <td><?php echo htmlentities($result->manufacturer); ?></td>
                                                    <td><?php echo htmlentities($result->location); ?></td>
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

                                                                        <form action="otassetlist.php" method="POST" class="forma">


                                                                            <p>
                                                                                <label for="name">Name</label>
                                                                                <input type="text" name="name" value="<?php echo ($result->name); ?>">
                                                                            </p>


                                                                            <p>
                                                                                <label for="description">Description</label>
                                                                                <input type="text" name="description" value="<?php echo ($result->description); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="quantity">Quantity</label>
                                                                                <input type="text" name="quantity" value="<?php echo ($result->quantity); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="amount">Manufacturer</label>
                                                                                <input type="text" name="manufacturer" value="<?php echo ($result->manufacturer); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="amount">Amount</label>
                                                                                <input type="text" name="amount" value="<?php echo ($result->amount); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="status">Status</label>
                                                                                <select name="status">
                                                                                    <option value="in storage" <?= $result->status == 'in storage' ? 'SELECTED' : '' ?>>in storage</option>
                                                                                    <option value="in use" <?= $result->status == 'in use' ? 'SELECTED' : '' ?>>in use</option>
                                                                                </select>
                                                                            </p>

                                                                            <p>
                                                                                <label for="location">Location</label>
                                                                                <input type="text" name="location" value="<?php echo ($result->location); ?>">
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

                                                        <a href="operationlist.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
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
                                            <form action="otassetlist.php" method="POST" class="forma">


                                                <p>
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" value="">
                                                </p>


                                                <p>
                                                    <label for="description">Description</label>
                                                    <input type="text" name="description" value="">
                                                </p>

                                                <p>
                                                    <label for="quantity">Quantity</label>
                                                    <input type="text" name="quantity" value="">
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
                                                    <label for="status">Status</label>
                                                    <select name="status">
                                                        <option value="in storage">in storage</option>
                                                        <option value="in use">in use</option>
                                                    </select>
                                                </p>

                                                <p>
                                                    <label for="location">Location</label>
                                                    <input type="text" name="location" value="">
                                                </p>

                                                <p>
                                                    <button type="submit" name="submit" value="">
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
                                                <p hidden>
                                                    <label for="full_name">Item</label>
                                                    <input type="text" name="item" value="operation">
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