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

        $sql = "delete from building WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
        header('location:buildinglist.php');
    } else {

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $description = $_POST['description'];
            $size = $_POST['size'];
            $amount = $_POST['amount'];
            $location = $_POST['location'];
            $category = $_POST['category'];
            $user_id = $_SESSION['user_id'];
            $org_id = $_SESSION['org_id'];


            $sql = "INSERT INTO `building`(`name`, `user_id`, `description`, `amount`, `size`, `location`, `category`, `org_id`) VALUES (:name, :user_id, :description, :amount, :size, :location, :category, :org_id)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $query->bindParam(':description', $description, PDO::PARAM_STR);
            $query->bindParam(':amount', $amount, PDO::PARAM_STR);
            $query->bindParam(':size', $size, PDO::PARAM_STR);
            $query->bindParam(':location', $location, PDO::PARAM_STR);
            $query->bindParam(':category', $category, PDO::PARAM_STR);
            $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
            $query->execute();
            $msg = "Rent Updated Successfully";
            header('location:buildinglist.php');
            // echo var_dump($bind);


        }

        if (isset($_POST['edit'])) {
            $id = $_POST['edit'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $size = $_POST['size'];
            $amount = $_POST['amount'];
            $location = $_POST['location'];
            $category = $_POST['category'];

            $sql = "UPDATE `building` SET `name`=(:name), `description`=(:description), `amount`=(:amount), `size`=(:size), `location`=(:location), `category`=(:category) WHERE id=(:id)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':description', $description, PDO::PARAM_STR);
            $query->bindParam(':size', $size, PDO::PARAM_STR);
            $query->bindParam(':amount', $amount, PDO::PARAM_STR);
            $query->bindParam(':location', $location, PDO::PARAM_STR);
            $query->bindParam(':category', $category, PDO::PARAM_STR);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $msg = "Rent Updated Successfully";

            header('location:buildinglist.php');
        }
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
                        <h2 class="page-title">Manage Buildings</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">


                        <!-- button style Start -->
                        <div class="navbar">
                            <div class="container-fluid" style="padding-left:7px;">
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
                            <div class="panel-heading">Building list</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?>
                                    </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb" class="display table table-dark table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Size/capacity</th>
                                            <th>Amount</th>
                                            <th>Location</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from `building` WHERE org_id = :org_id";
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
                                                    <td><?php echo htmlentities($result->description); ?></td>
                                                    <td><?php echo htmlentities($result->size); ?></td>
                                                    <td><?php echo htmlentities($result->amount); ?></td>
                                                    <td><?php echo htmlentities($result->location); ?></td>
                                                    <td><?php echo htmlentities($result->category); ?></td>
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
                                                                        <form action="buildinglist.php" method="POST" class="forma">
                                                                            <p>
                                                                                <label for="name">Name</label>
                                                                                <input type="text" name="name" value="<?php echo ($result->name); ?>">
                                                                            </p>


                                                                            <p>
                                                                                <label for="description">Description</label>
                                                                                <input type="text" name="description" value="<?php echo ($result->description); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="size">Size</label>
                                                                                <input type="text" name="size" value="<?php echo ($result->size); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="size">Amount</label>
                                                                                <input type="text" name="amount" value="<?php echo ($result->amount); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="location">Location</label>
                                                                                <input type="text" name="location" value="<?php echo ($result->location); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <select name="category">
                                                                                    <?php
                                                                                    $s = "SELECT DISTINCT * FROM `asset` WHERE item LIKE 'building'";
                                                                                    $q = $dbh->prepare($s);
                                                                                    $q->execute();
                                                                                    $res = $q->fetchAll(PDO::FETCH_OBJ);
                                                                                    if ($q->rowCount() > 0) {
                                                                                        foreach ($res as $re) {                ?>
                                                                                            <option value="<?php echo htmlentities($re->category); ?>" <?= $result->category == $re->category? 'SELECTED' : ''   ?>>
                                                                                                <?php echo htmlentities($re->category); ?></option>
                                                                                    <?php 
                                                                                        }
                                                                                    } ?>
                                                                                </select>
                                                                            </p>

                                                                            <p>
                                                                                <button type="submit" name="edit" value="<?php echo $result->id; ?>">
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

                                                        <a href="buildinglist.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
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
                                            <form action="buildinglist.php" method="POST" class="forma" id="f_edit">

                                                <p>
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" value="">
                                                </p>


                                                <p>
                                                    <label for="description">Description</label>
                                                    <input type="text" name="description" value="">
                                                </p>

                                                <p>
                                                    <label for="size">Size</label>
                                                    <input type="text" name="size" value="">
                                                </p>

                                                <p>
                                                    <label for="size">Amount</label>
                                                    <input type="text" name="amount" value="">
                                                </p>

                                                <p>
                                                    <label for="location">Location</label>
                                                    <input type="text" name="location" value="">
                                                </p>

                                                <p>
                                                    <select name="category" id="">
                                                        <option selected disabled>Select</option>
                                                        <?php
                                                        $sql = "SELECT * FROM `asset` WHERE item LIKE 'building'";
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
                                                    <input type="text" name="item" value="Building">
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