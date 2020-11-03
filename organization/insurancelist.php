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

        $sql = "delete from insurance WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
        header('location:insurancelist.php');
    }

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $item = $_POST['item'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $amount = $_POST['amount'];
        $amount_paid = $_POST['amount_paid'];
        $period = $_POST['period'];
        $company = $_POST['company'];
        $user_id = $_SESSION['user_id'];
        $org_id = $_SESSION['org_id'];


        $sql = "INSERT INTO `insurance`(`user_id`, `org_id`, `name`, `item`, `start_date`, `end_date`, `amount`, `amount_paid`, `period`, `company`) VALUES (:user_id, :org_id, :name, :item, :start_date, :end_date, :amount, :amount_paid, :period, :company)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':item', $item, PDO::PARAM_STR);
        $query->bindParam(':start_date', $start_date, PDO::PARAM_STR);
        $query->bindParam(':end_date', $end_date, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->bindParam(':amount_paid', $amount_paid, PDO::PARAM_STR);
        $query->bindParam(':period', $period, PDO::PARAM_STR);
        $query->bindParam(':company', $company, PDO::PARAM_STR);
        $query->execute();
        $msg = "Rent Updated Successfully";
        header('location:insurancelist.php');
    }

    if (isset($_POST['edit'])) {
        $name = $_POST['name'];
        $item = $_POST['item'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $amount = $_POST['amount'];
        $amount_paid = $_POST['amount_paid'];
        $period = $_POST['period'];
        $company = $_POST['company'];
        $id = $_POST['edit'];

        $sql = "UPDATE `insurance` SET `name`=(:name), `item`=(:item), `start_date`=(:start_date), `end_date`=(:end_date), `amount`=(:amount), `amount_paid`=(:amount_paid), `period`=(:period), `company`=(:company) WHERE id=(:id)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':item', $item, PDO::PARAM_STR);
        $query->bindParam(':start_date', $start_date, PDO::PARAM_STR);
        $query->bindParam(':end_date', $end_date, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->bindParam(':amount_paid', $amount_paid, PDO::PARAM_STR);
        $query->bindParam(':period', $period, PDO::PARAM_STR);
        $query->bindParam(':company', $company, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Rent Updated Successfully";

        header('location:insurancelist.php');
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
                        <h2 class="page-title">Manage Insurance</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">


                        <!-- button style Start -->
                        <div class="navbar">
                            <div class="container-fluid" style="padding-left:7px;">
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Insurance</a>
                                </h1>
                            </div>
                        </div>
                        <!-- button style End -->

                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Insurance list</div>
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
                                            <th>Item Insured</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Duration Left</th>
                                            <th>Duration Covered</th>
                                            <th>Amount</th>
                                            <th>Amount Paid</th>
                                            <th>Balance</th>
                                            <th>Insurance Rate</th>
                                            <th>Period Currently Insured</th>
                                            <th>Insurance Company</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from `insurance` WHERE `org_id` = :org_id";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {                ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->name); ?></td>
                                                    <td><?php echo htmlentities($result->item); ?></td>
                                                    <td><?php echo htmlentities($result->start_date); ?></td>
                                                    <td><?php echo htmlentities($result->end_date); ?></td>
                                                    <td><?php echo htmlentities(date("Y-m-d") - $result->end_date); ?></td>
                                                    <td><?php echo htmlentities($result->start_date - date("Y-m-d")); ?></td>
                                                    <td><?php echo htmlentities($result->amount); ?></td>
                                                    <td><?php echo htmlentities($result->amount_paid); ?></td>
                                                    <td><?php echo htmlentities($result->amount - $result->amount_paid); ?></td>
                                                    <td><?php echo htmlentities($result->amount / 12); ?></td>
                                                    <td><?php echo htmlentities($result->period); ?></td>
                                                    <td><?php echo htmlentities($result->company); ?></td>

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
                                                                        <form action="insurancelist.php" method="POST" class="forma" id="f_edit">

                                                                            <p>
                                                                                <label for="name">Name of Insurance</label>
                                                                                <input type="text" name="name" value="<?php echo $result->name ?>">
                                                                            </p>


                                                                            <p>
                                                                                <label for="item">Item Insured</label>
                                                                                <input type="text" name="item" value="<?php echo $result->item ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="start_date">Start Date</label>
                                                                                <input type="date" name="start_date" value="<?php echo $result->start_date ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="end_date">End Date</label>
                                                                                <input type="date" name="end_date" value="<?php echo $result->end_date ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="amount">Amount</label>
                                                                                <input type="text" name="amount" value="<?php echo $result->amount ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="amount_paid">Amount Paid</label>
                                                                                <input type="text" name="amount_paid" value="<?php echo $result->amount_paid ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="size">Period</label>
                                                                                <input type="text" name="period" value="<?php echo $result->period ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="size">Company</label>
                                                                                <input type="text" name="company" value="<?php echo $result->company ?>">
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

                                                        <a href="insurancelist.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
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
                                            <h4 id='edit' class="modal-title">Add New Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="insurancelist.php" method="POST" class="forma" id="f_edit">

                                                <p>
                                                    <label for="name">Name of Insurance</label>
                                                    <input type="text" name="name" value="">
                                                </p>


                                                <p>
                                                    <label for="item">Item Insured</label>
                                                    <input type="text" name="item" value="">
                                                </p>

                                                <p>
                                                    <label for="start_date">Start Date</label>
                                                    <input type="date" name="start_date" value="">
                                                </p>

                                                <p>
                                                    <label for="end_date">End Date</label>
                                                    <input type="date" name="end_date" value="">
                                                </p>

                                                <p>
                                                    <label for="amount">Amount</label>
                                                    <input type="text" name="amount" value="">
                                                </p>

                                                <p>
                                                    <label for="amount_paid">Amount Paid</label>
                                                    <input type="text" name="amount_paid" value="">
                                                </p>

                                                <p>
                                                    <label for="size">Period</label>
                                                    <input type="text" name="period" value="">
                                                </p>

                                                <p>
                                                    <label for="size">Company</label>
                                                    <input type="text" name="company" value="">
                                                </p>

                                                <p>
                                                    <button type="submit" name="submit" id="submit">
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


            </div>

        </div>

        <?php
        require_once "public/config/footer.php";
        ?>
    </body>

    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

    </html>

<?php } ?>