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

        $sql = "delete from building WHERE sn=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
        header('location:buildinglist.php');
    } else {
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
                        <h2 class="page-title">Investors</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">


                

                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Investor list</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?>
                                    </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>

                                <?php
                                $sql = "SELECT * from member";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $result) { ?>
                                        <div class="panel" style="width:200px">
                                            <img class="panel-heading" src="https://www.w3schools.com/howto/img_avatar.png" alt="Card image" style="width:100%">
                                            <div class="panel-body">
                                                <h4 class="card-title">Name: <?php echo $result->fullname ?></h4>
                                                <p class="card-text">Email: <?php echo $result->email ?> <?php echo $result->organization ?></p>
                                                <a href="na.php?id=<?php echo $result->id; ?>" class="btn btn-primary">View Details</a>
                                            </div>
                                        </div>
                                <?php }
                                } ?>



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