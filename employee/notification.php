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
            <div class="row  border-bottom white-bg dashboard-header">
                <div class="panel-heading">
                    <h2 class="page-title">Notifications</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-8">

                    <h2 class="page-title"></h2>

                    <!-- Zero Configuration Table -->
                    <div class="panel panel-default" style="
                        background: #b3f3e677;
                        border-radius: 5px;
                        box-shadow: 1px 1px 4px 2px rgba(110, 104, 104, 0.335);
                    ">
                        <div class="panel-heading">Users Activity log</div>
                        <div class="panel-body notification-table>
								<?php if ($error) { ?><div class=" errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div>
                        <?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?>
                        </div><?php } ?>

                        <?php
                        $reciver = 'Admin';
                        $sql = "SELECT * from  notification where notireciver = (:reciver) order by time DESC";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':reciver', $reciver, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) {                ?>
                        <h5
                            style="background:#e7f8f1;padding:20px;border-radius:10px;box-shadow: 1px 1px 3px 1px rgba(255, 255, 255, 0.315);">
                            <i class="fa fa-bell "></i>&nbsp;&nbsp;<b><?php echo htmlentities($result->time); ?></b>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlentities($result->notiuser); ?> ----->
                            <?php echo htmlentities($result->notitype); ?></h5>
                        <?php $cnt = $cnt + 1;
                            }
                        } ?>


                    </div>
                </div>

            </div>


            <div class="col-lg-4">
                <?php
                    require_once "public/config/right-sidebar.php";
                    ?>

            </div>
        </div>








    </div>


    </div>

    </div>

    <?php
        require_once "public/config/footer.php";
        ?>

</body>
<style>
h5 {
    color: #000;
}
</style>
<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

</html>

<?php } ?>