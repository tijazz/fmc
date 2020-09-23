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
                                    <a href="#supply" class="nav-link active" data-toggle="tab">Supply Chain Management</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#risk" class="nav-link" data-toggle="tab">Risk Management</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#monitory" class="nav-link" data-toggle="tab">Monitory And Evaluation</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#inventory" class="nav-link" data-toggle="tab">Inventory Management</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#financial" class="nav-link" data-toggle="tab">Financial Management</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="supply" style="width:content-width;">
                                    <div class="panel panel-default" style="background:#b3f3e677;border-radius:5px;box-shadow:1px 1px 4px 2px rgba(110, 104, 104, 0.335);">
                                        <div class="panel-heading">View Panel</div>
                                        <div class="panel-body">
                                            <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-primary text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Total Users</div>
                                                            </div>
                                                        </div>
                                                        <a href="userlist.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-success text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Feedback Messages</div>
                                                            </div>
                                                        </div>
                                                        <a href="feedback.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-danger text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Notifications</div>
                                                            </div>
                                                        </div>
                                                        <a href="notification.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-info text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Deleted Users</div>
                                                            </div>
                                                        </div>
                                                        <a href="deleteduser.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show active" id="risk" style="width:content-width;">
                                    <div class="panel panel-default" style="background:#b3f3e677;border-radius:5px;box-shadow:1px 1px 4px 2px rgba(110, 104, 104, 0.335);">
                                        <div class="panel-heading">View Panel</div>
                                        <div class="panel-body">
                                            <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-primary text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Total Users</div>
                                                            </div>
                                                        </div>
                                                        <a href="userlist.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-success text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Feedback Messages</div>
                                                            </div>
                                                        </div>
                                                        <a href="feedback.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-danger text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Notifications</div>
                                                            </div>
                                                        </div>
                                                        <a href="notification.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-info text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Deleted Users</div>
                                                            </div>
                                                        </div>
                                                        <a href="deleteduser.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                                <div class="tab-pane fade show active" id="monitory" style="width:content-width;">
                                    <div class="panel panel-default" style="background:#b3f3e677;border-radius:5px;box-shadow:1px 1px 4px 2px rgba(110, 104, 104, 0.335);">
                                        <div class="panel-heading">View Panel</div>
                                        <div class="panel-body">
                                            <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-primary text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Total Users</div>
                                                            </div>
                                                        </div>
                                                        <a href="userlist.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-success text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Feedback Messages</div>
                                                            </div>
                                                        </div>
                                                        <a href="feedback.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-danger text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Notifications</div>
                                                            </div>
                                                        </div>
                                                        <a href="notification.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-info text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Deleted Users</div>
                                                            </div>
                                                        </div>
                                                        <a href="deleteduser.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade show active" id="inventory" style="width:content-width;">
                                    <div class="panel panel-default" style="background:#b3f3e677;border-radius:5px;box-shadow:1px 1px 4px 2px rgba(110, 104, 104, 0.335);">
                                        <div class="panel-heading">View Panel</div>
                                        <div class="panel-body">
                                            <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-primary text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Total Users</div>
                                                            </div>
                                                        </div>
                                                        <a href="userlist.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-success text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Feedback Messages</div>
                                                            </div>
                                                        </div>
                                                        <a href="feedback.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-danger text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Notifications</div>
                                                            </div>
                                                        </div>
                                                        <a href="notification.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-info text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Deleted Users</div>
                                                            </div>
                                                        </div>
                                                        <a href="deleteduser.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show active" id="financial" style="width:content-width;">
                                    <div class="panel panel-default" style="background:#b3f3e677;border-radius:5px;box-shadow:1px 1px 4px 2px rgba(110, 104, 104, 0.335);">
                                        <div class="panel-heading">View Panel</div>
                                        <div class="panel-body">
                                            <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-primary text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Total Users</div>
                                                            </div>
                                                        </div>
                                                        <a href="userlist.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-success text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Feedback Messages</div>
                                                            </div>
                                                        </div>
                                                        <a href="feedback.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-danger text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Notifications</div>
                                                            </div>
                                                        </div>
                                                        <a href="notification.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body bk-info text-light">
                                                            <div class="stat-panel text-center">
                                                                <div class="stat-panel-number h1 ">Testing</div>
                                                                <div class="stat-panel-title text-uppercase">Deleted Users</div>
                                                            </div>
                                                        </div>
                                                        <a href="deleteduser.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
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