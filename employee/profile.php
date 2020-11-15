<?php
session_start();

error_reporting(0);
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

                    <div class="col-sm-12 col-lg-12">
                        <h2>Profile</h2>
                    </div>
                    <div class="col-sm-12 col-lg-9">
                        <div class="profile_header">
                            <div class="profile_info">
                                <div class="image_circle">

                                    <img alt="image" class="img-profile" src="../images/<?php echo ($_SESSION["images"]); ?>">

                                    <i class="fa fa-pencil"></i>
                                </div>
                                <div class="user_info">
                                    <span><?php echo ($_SESSION["org"]); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="bank_set_up">
                            <div class="circle_bank_icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="util">
                                <h3>Bank Set-up</h3>
                                <p>Set up your bank now to enable smoother transactions with us.</p>
                                <a href="#" class="set_bank_btn">Register</a>
                            </div>
                        </div>
                        <div class="other_info">
                            <div class="user_full_info_wrapper">
                                <h3 class="major_header">YOUR INFO</h3>
                                <ul class="user_full_info">

                                    <?php
                                    $sql = "SELECT * from organization where id = :id";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':id', $_SESSION['id'], PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {

                                        
                                        foreach ($results as $result) {
                                            
                                        ?>

                                    <li><i class="fa fa-envelope"></i><span><?php echo $result->name; ?> </span></li>
                                    <li><i class="fa fa-list-alt"></i><span><?php echo $result->email; ?></span></li>
                                    <li><i class="fa fa-map-marker"></i><span><?php echo $result->password; ?></span></li>
                                    <li> <i class="fa fa-map-marker"></i><span><?php echo $result->gender; ?></span></li>
                                    <li> <i class="fa fa-map-marker"></i><span><?php echo $result->role; ?></span></li>
                                    <li><i class="fa fa-phone"></i><span><?php echo $result->phone; ?></span></li>
                                    <li><span class="edit"><a href="editProfile.php"><i class="fa fa-pencil fa-2x"></i></a></span></li>
                                </ul>
                            </div>

                            <?php
                                    }}?>

                        </div>


                    </div>

                    <div class="col-lg-3">
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

    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

    </html>

<?php } ?>