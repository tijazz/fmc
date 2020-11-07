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

        $sql = "delete from advert WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
        header('location:advertlist.php');
    }

    if (isset($_POST['submit'])) {
        $user_id = $_SESSION['user_id'];
        $org_id = $_SESSION['org_id'];
        $type = $_POST['type'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $amount = $_POST['amount'];

        $sql = "INSERT INTO advert (user_id, org_id, type, name, description, amount) VALUES (:user_id, :org_id, :type, :name, :description, :amount)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->execute();
        $msg = "Advert Updated Successfully";

        header('location:advertlist.php');
    }

    if (isset($_POST['edit'])) {
        $id = $_POST['edit'];
        $type = $_POST['type'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $amount = $_POST['amount'];

        $sql = "UPDATE `advert` SET `type`=(:type), `name`=(:name), `description`=(:description), `amount`=(:amount) WHERE id=(:id)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Rent Updated Successfully";

        header('location:advertlist.php');
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
                    <h1>Adverts</h1>
                </div>
                <div class="row">

                    <div class="col-lg-12">
                        <!-- button style Start -->
                        <div class="navbar">
                            <div class="container-fluid" style='padding-left:7px;'>
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Category</a>
                                </h1>
                            </div>
                        </div>
                        <!-- button style End -->


                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default" style="border-radius:10px;">
                            <div class="panel-heading">List Users</div>
                            <div class="panel-body" style="background:#fff;border-radius:3px;">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb tablePreview" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from advert WHERE org_id = :org_id";
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
                                                                        <form action="advertlist.php" method="POST" class="forma">
                                                                            <p>
                                                                                <select name="type">
                                                                                    <option value="tv" <?php $result->type == 'tv' ? 'SELECTED' : '' ?>>TV</option>
                                                                                    <option value="radio" <?php $result->type == 'radio' ? 'SELECTED' : '' ?>>Radio</option>
                                                                                    <option value="social media" <?php $result->type == 'social media' ? 'SELECTED' : '' ?>>Social Media</option>
                                                                                    <option value="print" <?php $result->type == 'print' ? 'SELECTED' : '' ?>>Print</option>
                                                                                    <option value="others" <?php $result->type == 'others' ? 'SELECTED' : '' ?>>Others</option>
                                                                                </select>
                                                                            </p>

                                                                            <p>
                                                                                <label for="full_name">Name</label>
                                                                                <input type="text" name="name" value="<?php echo $result->name ?>">
                                                                            </p>
                                                                            <p>
                                                                                <label for="full_name">Description of Advert</label>
                                                                                <input type="text" name="description" value="<?php echo $result->description ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="amount">Amount of Advert</label>
                                                                                <input type="text" name="amount" value="<?php echo $result->amount ?>">
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

                                                        <a href="advertlist.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
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
                                            <form action="advertlist.php" method="POST" class="forma">
                                                <p>
                                                    <select name="type">
                                                        <option value="tv">TV</option>
                                                        <option value="radio">Radio</option>
                                                        <option value="social media">Social Media</option>
                                                        <option value="print">Print</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                </p>

                                                <p>
                                                    <label for="full_name">Name</label>
                                                    <input type="text" name="name">
                                                </p>
                                                <p>
                                                    <label for="full_name">Description of Advert</label>
                                                    <input type="text" name="description" value="">
                                                </p>

                                                <p>
                                                    <label for="amount">Amount of Advert</label>
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
                                    <!--end of modal-dialog-->
                                </div>
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