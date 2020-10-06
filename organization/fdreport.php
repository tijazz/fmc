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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


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

                <div class="row">

                    <div class="col-lg-12">


                        <!-- Zero Configuration Table -->

                        <div class="bs-example">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#field" class="nav-link active" data-toggle="tab">Field</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#pen" class="nav-link" data-toggle="tab">Pen</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#facility" class="nav-link" data-toggle="tab">Facility</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="field" style="width:content-width;">
                                    <div class="panel panel-default" style="background:#b3f3e677;border-radius:5px;box-shadow:1px 1px 4px 2px rgba(110, 104, 104, 0.335);">
                                        <div class="panel-heading">View Panel</div>
                                        <div class="panel-body">
                                            <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-primary text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Weekly</div>
                                                                <div class="stat-panel-title text-uppercase">Report</div>
                                                            </div>
                                                        </div>
                                                        <a href="fieldweeklyreport.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-success text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Monthly</div>
                                                                <div class="stat-panel-title text-uppercase">Report</div>
                                                            </div>
                                                        </div>
                                                        <a href="fieldmonthlyreport.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show active" id="pen" style="width:content-width;">
                                    <div class="panel panel-default" style="background:#b3f3e677;border-radius:5px;box-shadow:1px 1px 4px 2px rgba(110, 104, 104, 0.335);">
                                        <div class="panel-heading">View Panel</div>
                                        <div class="panel-body">
                                            <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-primary text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Weekly</div>
                                                                <div class="stat-panel-title text-uppercase">Report</div>
                                                            </div>
                                                        </div>
                                                        <a href="penweeklyreport.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-success text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Monthly</div>
                                                                <div class="stat-panel-title text-uppercase">Report</div>
                                                            </div>
                                                        </div>
                                                        <a href="penmonthlyreport.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>



                                <div class="tab-pane fade show active" id="facility" style="width:content-width;">
                                    <div class="panel panel-default" style="background:#b3f3e677;border-radius:5px;box-shadow:1px 1px 4px 2px rgba(110, 104, 104, 0.335);">
                                        <div class="panel-heading">View Panel</div>
                                        <div class="panel-body">
                                            <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-primary text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Weekly</div>
                                                                <div class="stat-panel-title text-uppercase">Report</div>
                                                            </div>
                                                        </div>
                                                        <a href="facilityweeklyreport.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-success text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Monthly</div>
                                                                <div class="stat-panel-title text-uppercase">Report</div>
                                                            </div>
                                                        </div>
                                                        <a href="facilitymonthlyreport.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
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
<style>
.tab-pane{
    position:absolute;
    top:5rem;
    left:0;
    width:100%;
}
.nav-tabs > li > a,.active{color:#fff;}
.nav-tabs > li > a:hover{
    background:transparent;
}
</style>
    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

    </html>

<?php } ?>