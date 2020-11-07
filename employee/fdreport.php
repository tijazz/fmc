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

                <div class="row">

                    <div class="col-lg-12">


                        <!-- Zero Configuration Table -->

                        <div class="container-fluid" style="margin-top: 10px;">
                            <div class="bs-example">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="#field" class="nav-link" id="field-tab" data-toggle="tab" role="tab" aria-controls="field" aria-selected="true">Field</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#pen" class="nav-link" id="pen-tab" data-toggle="tab" role="tab" aria-controls="pen" aria-selected="false">Pen</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#facility" class="nav-link" id="facility-tab" data-toggle="tab" role="tab" aria-controls="facility" aria-selected="false">Facility</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active" id="field" role="tabpanel" aria-labelledby="field-tab">
                                        <div class="panel panel-default" style="background:#b3f3e677;border-radius:5px;box-shadow:1px 1px 4px 2px rgba(110, 104, 104, 0.335);">
                                            <div class="panel-heading">Field Panel</div>
                                            <div class="panel-body">


                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body bg-success text-light">
                                                                <div class="stat-panel text-center">
                                                                    <div class="stat-panel-number h1 ">Weekly</div>
                                                                    <div class="stat-panel-title text-uppercase">Report</div>
                                                                </div>
                                                            </div>
                                                            <a href="fieldweeklyreport.php" class="block-anchor btn-info panel-footer text-center">Full Detail <i class="fa fa-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body bg-success text-light">
                                                                <div class="stat-panel text-center">
                                                                    <div class="stat-panel-number h1 ">Monthly</div>
                                                                    <div class="stat-panel-title text-uppercase">Report</div>
                                                                </div>
                                                            </div>
                                                            <a href="fieldmonthlyreport.php" class="block-anchor btn-default panel-footer text-center text-light">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="pen" role="tabpanel" aria-labelledby="pen-tab">
                                        <div class="panel panel-default" style="background:#b3f3e677;border-radius:5px;box-shadow:1px 1px 4px 2px rgba(110, 104, 104, 0.335);">
                                            <div class="panel-heading">Pen Panel</div>
                                            <div class="panel-body">
                                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body bg-success text-light">
                                                                <div class="stat-panel text-center">
                                                                    <div class="stat-panel-number h1 ">Weekly</div>
                                                                    <div class="stat-panel-title text-uppercase">Report</div>
                                                                </div>
                                                            </div>
                                                            <a href="penweeklyreport.php" class="block-anchor btn-info panel-footer text-center">Full Detail <i class="fa fa-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body bg-success text-light">
                                                                <div class="stat-panel text-center">
                                                                    <div class="stat-panel-number h1 ">Monthly</div>
                                                                    <div class="stat-panel-title text-uppercase">Report</div>
                                                                </div>
                                                            </div>
                                                            <a href="penmonthlyreport.php" class="block-anchor btn-default panel-footer text-center text-light">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="facility" role="tabpanel" aria-labelledby="facility-tab">
                                        <div class="panel panel-default" style="background:#b3f3e677;border-radius:5px;box-shadow:1px 1px 4px 2px rgba(110, 104, 104, 0.335);">
                                            <div class="panel-heading">Facility Panel</div>
                                            <div class="panel-body">
                                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body bg-success text-light">
                                                                <div class="stat-panel text-center">
                                                                    <div class="stat-panel-number h1 ">Weekly</div>
                                                                    <div class="stat-panel-title text-uppercase">Report</div>
                                                                </div>
                                                            </div>
                                                            <a href="facilityweeklyreport.php" class="block-anchor btn-info panel-footer text-center">Full Detail <i class="fa fa-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body bg-success text-light">
                                                                <div class="stat-panel text-center">
                                                                    <div class="stat-panel-number h1 ">Monthly</div>
                                                                    <div class="stat-panel-title text-uppercase">Report</div>
                                                                </div>
                                                            </div>
                                                            <a href="facilitymonthlyreport.php" class="block-anchor btn-default panel-footer text-center text-light">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
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

            </div>

            <?php
            require_once "public/config/footer.php";
            ?>
    </body>

    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

    </html>

<?php } ?>