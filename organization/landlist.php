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

        $sql = "delete from locations WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
        header('location:landlist.php');
    } else {

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $description = $_POST['description'];
            $size = $_POST['size'];
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];
            $user_id = $_SESSION['user_id'];
            $org_id = $_SESSION['org_id'];

            $sql = "INSERT INTO `locations`(`name`, `user`, `description`, `size`, `lat`, `lng`, `org_id`) VALUES (:name, :user, :description, :size, :lat, :lng, :org_id)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':user', $user_id, PDO::PARAM_STR);
            $query->bindParam(':description', $description, PDO::PARAM_STR);
            $query->bindParam(':size', $size, PDO::PARAM_STR);
            $query->bindParam(':lat', $lat, PDO::PARAM_STR);
            $query->bindParam(':lng', $lng, PDO::PARAM_STR);
            $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
            $query->execute();
            $msg = "Rent Updated Successfully";
            header('location:landlist.php');
            // echo $sql;


        }



        if (isset($_POST['edit'])) {
            $id = $_POST['edit'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $size = $_POST['size'];
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];

            $sql = "UPDATE `locations` SET `name`=(:name), `description`=(:description), `size`=(:size), `lat`=(:lat), `lng`=(:lng) WHERE id=(:id)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':description', $description, PDO::PARAM_STR);
            $query->bindParam(':size', $size, PDO::PARAM_STR);
            $query->bindParam(':lat', $lat, PDO::PARAM_STR);
            $query->bindParam(':lng', $lng, PDO::PARAM_STR);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $msg = "Rent Updated Successfully";

            // echo var_dump($id);

            header('location:landlist.php');
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
                        <h2 class="page-title">Manage Lands/Fields</h2>
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
                                    <a class="btn btn-md btn-primary" href="#add2" data-target="#add2" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Items</a>
                                </h1>
                            </div>
                        </div>
                        <!-- button style End -->

                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Land/Field list</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?>
                                    </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb tablePreview" class="display table table-dark table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Size/capacity</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from `locations` WHERE org_id=:org_id";
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
                                                    <td><?php echo htmlentities($result->lat); ?></td>
                                                    <td><?php echo htmlentities($result->lng); ?></td>
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
                                                                        <form action="landlist.php" method="POST" class="forma" id="f_edit">

                                                                            <p>
                                                                                <label for="name">Name</label>
                                                                                <input type="text" name="name" value="<?php echo ($result->name); ?>">
                                                                            </p>


                                                                            <p>
                                                                                <label for="description">Description</label>
                                                                                <input type="text" name="description" value=<?php echo ($result->description); ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="size">Size</label>
                                                                                <input type="text" name="size" value="<?php echo ($result->size); ?>">
                                                                            </p>

                                                                            <iframe src="map.php" frameborder="0" width="100%"></iframe>
                                                                            <input type="button" value="select" class="sel">


                                                                            <p>
                                                                                <label for="lat">Latitude</label>
                                                                                <input type="text" name="lat" value="<?php echo ($result->lat); ?>" class="lat">
                                                                            </p>


                                                                            <p>
                                                                                <label for="lng">Longitude</label>
                                                                                <input type="text" name="lng" value="<?php echo ($result->lng); ?>" class="lng">
                                                                            </p>
                                                                            
                                                                            <p>
                                                                                <button type="submit" name="edit" id="submit" value="<?php echo ($result->id); ?>">
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

                                                        <a href="landlist.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
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
                                            <h4 id='edit' class="modal-title">Add New Lands/Fields</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="landlist.php" method="POST" class="forma" id="f_edit">

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

                                                <iframe src="map.php" frameborder="0" width="100%"></iframe>
                                                <input type="button" value="select" class="sel">


                                                <p>
                                                    <label for="lat">Latitude</label>
                                                    <input type="text" name="lat" value="" class="lat">
                                                </p>


                                                <p>
                                                    <label for="lng">Longitude</label>
                                                    <input type="text" name="lng" value="" class="lng">
                                                </p>
                                                <script>
                                                    $('.sel').click(function() {
                                                        alert('It is working')
                                                        $('.lat').val(localStorage.getItem('lat'))
                                                        $('.lng').val(localStorage.getItem('lng'))
                                                    })
                                                </script>
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