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

        $sql = "delete from rent WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
    }
    if (isset($_POST['edit'])) {
        $id = $_POST['edit'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $ppunit = $_POST['ppunit'];
        $qitem = $_POST['qitem'];
        $amount = $_POST['amount'];

        $sql = "UPDATE `rent` SET `name`=(:name), `description`=(:description), `ppunit`=(:ppunit), `qitem`=(:qitem), `amount`=(:amount) WHERE id=(:id)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':ppunit', $ppunit, PDO::PARAM_STR);
        $query->bindParam(':qitem', $qitem, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Rent Updated Successfully";

        header('location:rentlist.php');
    }

    if (isset($_POST['submit'])) {
        $user_id = $_SESSION['user_id'];
        $org_id = $_SESSION['org_id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $ppunit = $_POST['ppunit'];
        $qitem = $_POST['qitem'];
        $amount = $_POST['amount'];

        $sql = "INSERT INTO rent (user_id, org_id, name, description, ppunit, qitem, amount) VALUES (:user_id, :org_id, :name, :description, :ppunit, :qitem, :amount)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':ppunit', $ppunit, PDO::PARAM_STR);
        $query->bindParam(':qitem', $qitem, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->execute();
        $msg = "rent Updated Successfully";
        header('location:rentlist.php');
    }


?>

    <!DOCTYPE html>
    <html>
    <link rel="stylesheet" href="public/css/new_styles.css">

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
                <div class="row  white-bg dashboard-header">
                    <h1>Rent</h1>
                </div>
                <div class="row">

                    <div class="col-lg-12">
                        <!-- button style Start -->
                        <div class="navbar">
                            <div class="container-fluid" style="padding-left:7px;">
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Category</a>
                                </h1>

                            </div>
                        </div>
                        <!-- button style End -->

                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">rent list</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?>
                                    </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb tablePreview" class="display table table-dark table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price per Unit</th>
                                            <th>Quantity of item</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from rent WHERE user_id = :user_id";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {                ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->name); ?></td>
                                                    <td><?php echo htmlentities($result->description); ?></td>
                                                    <td><?php echo htmlentities($result->ppunit); ?></td>
                                                    <td><?php echo htmlentities($result->qitem); ?></td>
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
                                                                        <form action="rentedit.php" method="POST" class="forma">

                                                                            <p>
                                                                                <label for="full_name">Name of Item</label>
                                                                                <input type="text" name="name" value="<?php echo $result->name ?>">
                                                                            </p>
                                                                            <p>
                                                                                <label for="full_name">Description</label>
                                                                                <input type="text" name="description" value="<?php echo $result->description ?>">
                                                                            </p>
                                                                            <p>
                                                                                <label for="id">Price per Unit of Item</label>
                                                                                <input type="text" name="ppunit" value="<?php echo $result->ppunit ?>" id="ppunit">
                                                                            </p>
                                                                            <p>
                                                                                <label for="full_name">Quantity of Item</label>
                                                                                <input type="text" name="qitem" value="<?php echo $result->qitem ?>" id="qitem">
                                                                            </p>

                                                                            <p>
                                                                                <label for="amount">Cost</label>
                                                                                <input type="text" name="amount" value="<?php echo $result->amount ?>" id="amount">
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

                                                        <a href="rentlist.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
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
                                            <form action="rent.php" method="POST" class="forma">

                                                <p>
                                                    <label for="full_name">Name of Item</label>
                                                    <input type="text" name="name">
                                                </p>
                                                <p>
                                                    <label for="full_name">Description</label>
                                                    <input type="text" name="description" value="">
                                                </p>
                                                <p>
                                                    <label for="id">Price per Unit of Item</label>
                                                    <input type="text" name="ppunit" value="0" id="ppunit">
                                                </p>
                                                <p>
                                                    <label for="full_name">Quantity of Item</label>
                                                    <input type="text" name="qitem" value="0" id="qitem">
                                                </p>

                                                <p>
                                                    <label for="amount">Cost</label>
                                                    <input type="text" name="amount" value="0" id="amount">
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
                            </div>

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