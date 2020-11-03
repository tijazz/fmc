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
    if (isset($_POST['edit'])) {
        $id = $_POST['edit'];
        $type = $_POST['type'];
        $item_id = $_POST['item_id'];
        $description = $_POST['description'];
        $amount = $_POST['amount'];
        $date = $_POST['date'];

        $bind = $sql = "UPDATE `maintenance` SET `item_id`=(:item_id), `type`=(:type), `description`=(:description), `amount`=(:amount), `date`=(:date) WHERE id=(:id)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':item_id', $item_id, PDO::PARAM_STR);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Rent Updated Successfully";



        header('location:maintenancelist.php');
    }

    if (isset($_POST['submit'])) {
        $user_id = $_SESSION['user_id'];
        $org_id = $_SESSION['org_id'];
        $type = $_POST['type'];
        $item_id = $_POST['item_id'];
        $description = $_POST['description'];
        $amount = $_POST['amount'];
        $date = $_POST['date'];


        $sql = "INSERT INTO `maintenance` (`org_id`, `user_id`, `item_id`, `type`, `description`, `amount`, `date`) VALUES (:org_id, :user_id, :item_id, :type, :description, :amount, :date)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':item_id', $item_id, PDO::PARAM_STR);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->execute();
        $msg = "Maintenance Updated";

        header('location:maintenancelist.php');
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
                <div class="row">

                    <?php
                    require_once "public/config/topbar.php";
                    ?>

                </div>
                <div class="row dashboard-header">
                    <div class="panel-heading" style='padding:0;'>
                        <h2 class="page-title">Manage Maintenance</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <!-- button style Start -->
                        <div class="navbar">
                            <div class="container-fluid" style="padding-left:7px;">
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Building</a>
                                </h1>

                                <h1 class="nav navbar-nav" style="padding-left:7px;">
                                    <a class="btn btn-md btn-primary" href="#add2" data-target="#add2" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Machinery</a>
                                </h1>

                                <h1 class="nav navbar-nav" style="padding-left:7px;">
                                    <a class="btn btn-md btn-primary" href="#add2" data-target="#add3" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Vehicle</a>
                                </h1>
                            </div>
                        </div>
                        <!-- button style End -->
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">List Maintenance</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow">
                                        <?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb tablePreview" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Serial no</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        $sql = "SELECT * from maintenance WHERE org_id = :org_id";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {
                                                $type = $result->type;
                                                $s = "SELECT * from " . $type . " WHERE id = :id";
                                                $q = $dbh->prepare($s);
                                                $q->bindParam(':id', $result->item_id, PDO::PARAM_STR);
                                                $q->execute();
                                                $res = $q->fetch(PDO::FETCH_OBJ);         ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($res->id); ?></td>
                                                    <td><?php echo htmlentities($result->description); ?></td>
                                                    <td><?php echo htmlentities($result->type); ?></td>
                                                    <td><?php echo htmlentities($res->name); ?></td>
                                                    <td><?php echo htmlentities($result->amount); ?></td>
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

                                                                        <form action="maintenancelist.php" method="POST" class="forma">
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
                                                                                            <option value="<?php echo $re->id ?>" <?php echo $result->item_id == $re->id ? 'SELECTED' : 'nothing'; ?>><?php echo $re->name ?></option>

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
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!--end of modal-dialog-->

                                                        <a href="maintenancelist.php?del=<?php echo $result->id; ?>;?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
                                                    </td>

                                                    <!-- Action Button End -->
                                                </tr>
                                        <?php $cnt = $cnt + 1;
                                            }
                                        } ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- Building -->
                            <div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Building</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="maintenanceform.php" method="POST" class="forma">
                                                <input type="text" name="type" value="building" hidden>
                                                <p>
                                                    <label for="name">Name</label>
                                                    <select name="item_id" id="">


                                                        <?php $sql = "SELECT * from building WHERE org_id = :org_id";
                                                        $query = $dbh->prepare($sql);
                                                        $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                        $query->execute();
                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt = 1;
                                                        if ($query->rowCount() > 0) {
                                                            foreach ($results as $result) { ?>
                                                                <option value="<?php echo $result->id ?>"><?php echo $result->name ?></option>

                                                        <?php }
                                                        }             ?>

                                                    </select>
                                                </p>

                                                <p>
                                                    <label for="full_name">Description</label>
                                                    <input type="text" name="description" value="">
                                                </p>

                                                <p>
                                                    <label for="amount">Amount</label>
                                                    <input type="text" name="amount" value="">
                                                </p>

                                                <p>
                                                    <label for="date">Date</label>
                                                    <input type="date" name="date" value="">
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
                            <!-- Machinery -->
                            <div id="add2" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Machinery</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="maintenancelist.php" method="POST" class="forma">
                                                <input type="text" name="type" value="machinery" hidden>
                                                <p>
                                                    <label for="name">Name</label>
                                                    <select name="item_id" id="">


                                                        <?php $sql = "SELECT * from machinery WHERE org_id = :org_id";
                                                        $query = $dbh->prepare($sql);
                                                        $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                        $query->execute();
                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt = 1;
                                                        if ($query->rowCount() > 0) {
                                                            foreach ($results as $result) { ?>
                                                                <option value="<?php echo $result->id ?>"><?php echo $result->name ?></option>

                                                        <?php }
                                                        }             ?>

                                                    </select>
                                                </p>

                                                <p>
                                                    <label for="full_name">Description</label>
                                                    <input type="text" name="description" value="">
                                                </p>

                                                <p>
                                                    <label for="amount">Amount</label>
                                                    <input type="text" name="amount" value="">
                                                </p>

                                                <p>
                                                    <label for="date">Date</label>
                                                    <input type="date" name="date" value="2017-06-01">
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

                            <!-- Vehicle -->
                            <div id="add3" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Vehicle</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="maintenancelist.php" method="POST" class="forma">
                                                <input type="text" name="type" value="vehicle" hidden>
                                                <p>
                                                    <label for="name">Name</label>
                                                    <select name="item_id" id="">


                                                        <?php $sql = "SELECT * from vehicle WHERE org_id = :org_id";
                                                        $query = $dbh->prepare($sql);
                                                        $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                        $query->execute();
                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt = 1;
                                                        if ($query->rowCount() > 0) {
                                                            foreach ($results as $result) { ?>
                                                                <option value="<?php echo $result->id ?>"><?php echo $result->name ?></option>

                                                        <?php }
                                                        }             ?>

                                                    </select>
                                                </p>

                                                <p>
                                                    <label for="description">Description</label>
                                                    <input type="text" name="description" value="">
                                                </p>

                                                <p>
                                                    <label for="amount">Amount</label>
                                                    <input type="text" name="amount" value="">
                                                </p>

                                                <p>
                                                    <label for="date">Date</label>
                                                    <input type="date" name="date" value="2017-06-01">
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