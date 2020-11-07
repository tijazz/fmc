<?php
session_start();

error_reporting(0);
$error = "";
$msg = "";
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {


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
                    <h1>Purchases</h1>
                </div>
                <div class="row">

                    <div class="col-lg-12">


                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Farm Organizations</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?>
                                    </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb" class="display table table-dark table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Organization Name</th>
                                            <th>Interest</th>
                                            <th>Profit</th>
                                            <th>Loss</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from organization";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {                ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><img src="../images/<?= $result->image ??  'user.png' ?>" alt="Farm Image" width="24px" height="24px"></td>
                                                    <td><?php echo htmlentities($result->organization); ?></td>
                                                    <td><?php echo htmlentities($result->interest); ?></td>
                                                    <td><?php echo htmlentities($result->profit); ?></td>
                                                    <td><?php echo htmlentities($result->loss); ?></td>

                                                    <!-- Action Button Start -->
                                                    <td>
                                                        <a href="#"  class="btn btn-success btn-sm" role="button" aria-disabled="true" name="submit" value="<?= $result->id ?>">View Details</a>
                                                    </td>

                                                    <!-- Action Button End -->
                                                </tr>
                                        <?php $cnt = $cnt + 1;
                                            }
                                        } ?>

                                    </tbody>
                                </table>
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