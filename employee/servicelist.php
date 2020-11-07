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

        header('location:machinerylist.php');
    }

    if (isset($_POST['submit'])) {

        $transaction = $_POST['transaction'];
        $salename = $_POST['salename'];
        $date = $_POST['date'];
        $productname = $_POST['productname'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $discount = $_POST['discount'];
        $totalamount = $_POST['totalamount'];
        $totalquantity = $_POST['totalquantity'];
        $method = $_POST['method'];
        $customername = $_POST['customername'];
        $phone = $_POST['phone'];
        $type = $_POST['type'];
        $add_parameter = $_POST['add_parameter'];


        $sql = "INSERT INTO `service` (`transaction`, `salename`, `date`, `productname`, `description`, `price`, `quantity`, `discount`, `amount`, `totalquantity`, `method`, `customername`, `phone`, `type`, `add_parameter`) VALUES (:transaction,:salename,:date,:productname,:description,:price,:quantity,:discount,:amount,:totalquantity,:method,:customername,:phone,:type,:add_parameter)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':transaction', $transaction, PDO::PARAM_STR);
        $query->bindParam(':salename', $salename, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindParam(':productname', $productname, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':price', $price, PDO::PARAM_STR);
        $query->bindParam(':quantity', $quantity, PDO::PARAM_STR);
        $query->bindParam(':discount', $discount, PDO::PARAM_STR);
        $query->bindParam(':amount', $totalamount, PDO::PARAM_STR);
        $query->bindParam(':totalquantity', $totalquantity, PDO::PARAM_STR);
        $query->bindParam(':method', $method, PDO::PARAM_STR);
        $query->bindParam(':customername', $customername, PDO::PARAM_STR);
        $query->bindParam(':phone', $phone, PDO::PARAM_STR);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->bindParam(':add_parameter', $add_parameter, PDO::PARAM_STR);
        $query->execute();
        $msg = "Services Updated";
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
                        <h2 class="page-title">Manage Services</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <h1><a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i></a></h1>
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">List Users</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb tablePreview" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Transaction</th>
                                            <th>Sales Name</th>
                                            <th>Date</th>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Discount</th>
                                            <th>Total Amount</th>
                                            <th>Total Quantity</th>
                                            <th>Method</th>
                                            <th>Customer Name</th>
                                            <th>Phone</th>
                                            <th>Type</th>
                                            <th>Add Parameter</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from `service`";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {                ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->transaction); ?></td>
                                                    <td><?php echo htmlentities($result->salename); ?></td>
                                                    <td><?php echo htmlentities($result->date); ?></td>
                                                    <td><?php echo htmlentities($result->productname); ?></td>
                                                    <td><?php echo htmlentities($result->description); ?></td>
                                                    <td><?php echo htmlentities($result->price); ?></td>
                                                    <td><?php echo htmlentities($result->quantity); ?></td>
                                                    <td><?php echo htmlentities($result->discount); ?></td>
                                                    <td><?php echo htmlentities($result->amount); ?></td>
                                                    <td><?php echo htmlentities($result->totalquantity); ?></td>
                                                    <td><?php echo htmlentities($result->method); ?></td>
                                                    <td><?php echo htmlentities($result->customername); ?></td>
                                                    <td><?php echo htmlentities($result->phone); ?></td>
                                                    <td><?php echo htmlentities($result->type); ?></td>
                                                    <td><?php echo htmlentities($result->add_parameter); ?></td>


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
                                                                        <form action="machineryedit.php" method="POST" class="forma">

                                                                            <p>
                                                                                <select name="category" id="">
                                                                                    <option selected disabled>Select</option>
                                                                                    <?php
                                                                                    $sql = "SELECT * FROM `asset` WHERE item LIKE 'Machinery'";
                                                                                    $query = $dbh->prepare($sql);
                                                                                    $query->execute();
                                                                                    $res = $query->fetchAll(PDO::FETCH_OBJ);
                                                                                    $cnt = 1;
                                                                                    if ($query->rowCount() > 0) {
                                                                                        foreach ($res as $re) { ?>
                                                                                            <option value="<?php echo htmlentities($re->category); ?>">
                                                                                                <?php echo htmlentities($re->category); ?></option>
                                                                                    <?php $cnt = $cnt + 1;
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
                                                                                <label for="amount">Manufacturer</label>
                                                                                <input type="text" name="manufacturer" value="<?php echo ($result->manufacturer); ?>">
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
                                                        <a href="testimolist.php?del=<?php echo $result->id; ?>;?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
                                                    </td>
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
                                            <form action="service.php" method="POST" class="forma">
                                                <p>
                                                    <select name="type">
                                                        <option selected>Daily</option>
                                                        <option>Weekly</option>
                                                        <option>Yearly</option>
                                                    </select>
                                                </p>
                                                <p>
                                                    <label for="transaction">Transaction number</label>
                                                    <input type="text" name="transaction">
                                                </p>
                                                <p>
                                                    <label for="salename">Service employee name</label>
                                                    <input type="text" name="salename" value="">
                                                </p>


                                                <p>
                                                    <label for="date">Business transaction date</label>
                                                    <input type="date" name="date" value="">
                                                </p>

                                                <p>
                                                    <label for="productname">Service name</label>
                                                    <input type="text" name="productname" value="">
                                                </p>

                                                <p>
                                                    <label for="description">Service description</label>
                                                    <input type="text" name="description" value="">
                                                </p>
                                                <p>
                                                    <label for="price">Price of Service per hour/day</label>
                                                    <input type="text" name="price" value="">
                                                </p>
                                                <p>
                                                    <label for="quantity">Number of hours for Service sold</label>
                                                    <input type="name" name="quantity" value="">
                                                </p>
                                                <p>
                                                    <label for="discount">Discount</label>
                                                    <input type="text" name="discount" value="">
                                                </p>

                                                <p>
                                                    <label for="totalamount">Total income for Service sold</label>
                                                    <input type="text" name="totalamount" value="">
                                                </p>

                                                <p>
                                                    <label for="totalquantity">Total number of hours for Service sold</label>
                                                    <input type="text" name="totalquantity" value="">
                                                </p>

                                                <p>
                                                    <label for="method">Payment method</label>
                                                    <input type="text" name="method" value="">
                                                </p>

                                                <p>
                                                    <label for="type">Customer’s name</label>
                                                    <input type="text" name="customername" value="">
                                                </p>

                                                <p>
                                                    <label for="type">Phone number</label>
                                                    <input type="tel" name="phone" value="">
                                                </p>

                                                <p>
                                                    <label for="add_parameters">(Add parameter)</label>
                                                    <input type="textarea" name="add_parameter" value="">
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