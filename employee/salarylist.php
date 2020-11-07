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

        $sql = "delete from testimonial WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
    }

    if (isset($_POST['submit'])) {

        $employee_id = $_POST['submit'];
        $type = $_POST['type'];
        $category = $_POST['category'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $amount = $_POST['amount'];
        $allowance = $_POST['allowance'];
        $eligibility = $_POST['eligibility'];
        $method = $_POST['method'];
        $add_parameters = $_POST['add_parameters'];

        $sql = "INSERT INTO `salary`(`type`, `name`, `amount payable`, `employee status`, `description`, `eligibility`, `method`, `allowance to be debited`, `Add parameter`, `employee_id`) VALUES (:type, :name, :amount, :category, :description, :eligibility, :method, :allowance, :add_parameters, :employee_id)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->bindParam(':category', $category, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->bindParam(':allowance', $allowance, PDO::PARAM_STR);
        $query->bindParam(':method', $method, PDO::PARAM_STR);
        $query->bindParam(':eligibility', $eligibility, PDO::PARAM_STR);
        $query->bindParam(':add_parameters', $add_parameters, PDO::PARAM_STR);
        $query->bindParam(':employee_id', $employee_id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Maintenance Updated";
        header('location:salarylist.php');
    }

    if (isset($_POST['edit'])) {
        $id = $_POST['edit'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $serial_no = $_POST['snum'];
        $manufacturer = $_POST['manufacturer'];
        $category = $_POST['category'];

        $sql = "UPDATE `machinery` SET `name`=(:name), `description`=(:description), `serial_no`=(:serial_no), `manufacturer`=(:manufacturer), `category`=(:category) WHERE id=(:id)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':serial_no', $serial_no, PDO::PARAM_STR);
        $query->bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
        $query->bindParam(':category', $category, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Rent Updated Successfully";

        header('location:salarylist.php');
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
                        <h2 class="page-title">Salary List</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <h1><a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i></a></h1>
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">List Users</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow">
                                        <?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb tablePreview" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Employee</th>
                                            <th>Description</th>
                                            <th>Eligibility</th>
                                            <th>method</th>
                                            <th>allowance</th>
                                            <th>Date</th>
                                            <th>Add Parameters</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from employee";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {                ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->table_name); ?></td>
                                                    <td><?php echo htmlentities($result->name); ?></td>
                                                    <td><?php echo htmlentities($result->amount); ?></td>
                                                    <td><?php echo htmlentities($result->employee); ?></td>
                                                    <td><?php echo htmlentities($result->description); ?></td>
                                                    <td><?php echo htmlentities($result->eligibility); ?></td>
                                                    <td><?php echo htmlentities($result->method); ?></td>
                                                    <td><?php echo htmlentities($result->allowance); ?></td>
                                                    <td><?php echo htmlentities($result->date); ?></td>
                                                    <td><?php echo htmlentities($result->add_parameter); ?></td>


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

                                                                        <form action="salarylist.php" method="POST" class="forma">
                                                                            <p>
                                                                                <select name="type">
                                                                                    <option selected>Salary</option>
                                                                                    <option>Allowance</option>
                                                                                    <option>Bonus</option>
                                                                                </select>
                                                                            </p>
                                                                            <p>
                                                                                <label for="name">Name</label>
                                                                                <input type="text" name="name" value="<?php echo $result->name ?>">
                                                                            </p>
                                                                            <p>
                                                                                <label for="amount">Amount Payable</label>
                                                                                <input type="text" name="amount" value="">
                                                                            </p>
                                                                            <p>
                                                                                <select name="category">
                                                                                    <option disabled selected>Employee status</option>
                                                                                    <option>contract</option>
                                                                                    <option>permanent</option>
                                                                                </select>
                                                                            </p>

                                                                            <p>
                                                                                <label for="full_name">Description</label>
                                                                                <input type="text" name="description" value="">
                                                                            </p>

                                                                            <p>
                                                                                <label for="full_name">Eligibity</label>
                                                                                <input type="text" name="eligibility" value="">
                                                                            </p>

                                                                            <p>
                                                                                <label for="amount">Allowance</label>
                                                                                <input type="text" name="allowance" value="">
                                                                            </p>
                                                                            <p>
                                                                                <label for="amount">Method</label>
                                                                                <input type="text" name="method" value="">
                                                                            </p>
                                                                            <p>
                                                                                <label for="date">Date</label>
                                                                                <input type="date" name="date" value="2017-06-01">
                                                                            </p>
                                                                            <p>
                                                                                <label for="add_parameters">Add Parameter</label>
                                                                                <input type="textarea" name="add_parameters" value="<?php echo $result->table_name ?>">
                                                                            </p>

                                                                            <p>
                                                                                <button type="submit" name="submit" value="<?php echo $result->id ?>">
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

                                                        <a href="salarylist.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
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

                                            <form action="salary.php" method="POST" class="forma">
                                                <p>
                                                    <select name="type">
                                                        <option selected>Salary</option>
                                                        <option>Allowance</option>
                                                        <option>Bonus</option>
                                                    </select>
                                                </p>
                                                <p>
                                                    <label for="full_name">Name</label>
                                                    <input type="text" name="name">
                                                </p>
                                                <p>
                                                    <label for="amount">Amount Payable</label>
                                                    <input type="text" name="amount" value="">
                                                </p>
                                                <p>
                                                    <select name="category">
                                                        <option disabled selected>Employee status</option>
                                                        <option>contract</option>
                                                        <option>permanent</option>
                                                    </select>
                                                </p>

                                                <p>
                                                    <label for="full_name">Description</label>
                                                    <input type="text" name="description" value="">
                                                </p>

                                                <p>
                                                    <label for="full_name">Eligibity</label>
                                                    <input type="text" name="eligibility" value="">
                                                </p>

                                                <p>
                                                    <label for="amount">Allowance</label>
                                                    <input type="text" name="allowance" value="">
                                                </p>
                                                <p>
                                                    <label for="amount">Method</label>
                                                    <input type="text" name="method" value="">
                                                </p>
                                                <p>
                                                    <label for="date">Date</label>
                                                    <input type="date" name="date" value="2017-06-01">
                                                </p>
                                                <p>
                                                    <label for="add_parameters">Add Parameter</label>
                                                    <input type="textarea" name="add_parameters" value="">
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