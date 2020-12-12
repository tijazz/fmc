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
    <link rel="stylesheet" href="../public/css/inv.css">

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
                        <h2 class="page-title">Inventory Management</h2>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <!-- content -->
                        <div class="backdrop_org"></div>
                        <div class="question">
                            <form action="">
                                <p>Are you sure you want to delete this entry?</p>
                                <p class="del_item"></p>
                                <div class="buttons">
                                    <button type="submit">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    <div class="cancel">
                                        <i class="fa fa-times"></i>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <section class="statistic">
                            <div class="section__content section__content--p30">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3">
                                            <div class="statistic__item">
                                                <?php
                                                $sql = "SELECT count(*) from `machinery` where org_id = :org_id";
                                                $query = $dbh->prepare($sql);
                                                $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                $query->execute();
                                                $machinery = $query->fetchColumn();
                                                ?>
                                                <h2 class="number"><?= $machinery?></h2>
                                                <span class="desc">Machineries</span>
                                                <div class="icon">
                                                    <i class="fa fa-tractor"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="statistic__item">
                                            <?php
                                                $sql = "SELECT count(*) from `building` where org_id = :org_id";
                                                $query = $dbh->prepare($sql);
                                                $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                $query->execute();
                                                $building = $query->fetchColumn();
                                                ?>
                                                <h2 class="number"><?= $building?></h2>
                                                <span class="desc">Buildings</span>
                                                <div class="icon">
                                                    <i class="fa fa-university"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="statistic__item">
                                            <?php
                                                $sql = "SELECT count(*) from `product` where org_id = :org_id";
                                                $query = $dbh->prepare($sql);
                                                $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                $query->execute();
                                                $product = $query->fetchColumn();
                                                ?>
                                                <h2 class="number"><?= $product?></h2>
                                                <span class="desc">Products</span>
                                                <div class="icon">
                                                    <i class="fa fa-money"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="statistic__item">
                                            <?php
                                                $sql = "SELECT count(*) from `vehicle` where org_id = :org_id";
                                                $query = $dbh->prepare($sql);
                                                $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                $query->execute();
                                                $vehicle = $query->fetchColumn();
                                                ?>
                                                <h2 class="number"><?= $vehicle?></h2>
                                                <span class="desc">Vehicle</span>
                                                <div class="icon">
                                                    <i class="fa fa-warehouse"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- END STATISTIC-->
                        <div class="wrapper">
                            <div class="summ">
                                <div class="summary">
                                    <div class="hider"></div>
                                    <div class="summary-left">
                                        <div class="hidden_details">
                                            <ul>
                                                <li>Building</li>
                                                <li>Vehicle</li>
                                                <li>Machiney</li>
                                                <li>Product</li>
                                                
                                            </ul>
                                            <ul>
                                                <li><?= $building?></li>
                                                <li><?= $vehicle?></li>
                                                <li><?= $machinery?></li>
                                                <li><?= $product?></li>
                                                <li><?= $product + $building + $vehicle + $product ?> </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <h1 class="summ_h1">
                                <?= $product + $building + $vehicle + $product ?><span>Total Items</span>
                                </h1>
                            </div>
                            <section>
                                <div class="section__content section__content--p30">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <!-- RECENT REPORT 2-->
                                                <div class="recent-report2">
                                                    <h3 class="title-3">recent reports</h3>
                                                    <div class="chart-info">
                                                        <div class="chart-info__left">
                                                            <div class="chart-note">
                                                                <span class="dot dot--blue"></span>
                                                                <span>products</span>
                                                            </div>
                                                            <div class="chart-note">
                                                                <span class="dot dot--green"></span>
                                                                <span>Services</span>
                                                            </div>
                                                        </div>
                                                        <div class="chart-info-right">
                                                            <div class="rs-select2--dark rs-select2--md m-r-10">
                                                                <select class="js-select2" name="property">
                                                                    <option selected="selected">All Properties</option>
                                                                    <option value="">Products</option>
                                                                    <option value="">Services</option>
                                                                </select>
                                                                <div class="dropDownSelect2"></div>
                                                            </div>
                                                            <div class="rs-select2--dark rs-select2--sm">
                                                                <select class="js-select2 au-select-dark" name="time">
                                                                    <option selected="selected">All Time</option>
                                                                    <option value="">By Month</option>
                                                                    <option value="">By Day</option>
                                                                </select>
                                                                <div class="dropDownSelect2"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="recent-report__chart">
                                                        <canvas id="recent-rep2-chart"></canvas>
                                                    </div>
                                                </div>
                                                <!-- END RECENT REPORT 2             -->

                                            </div>


<!-- THe Php code needs to be rechecked -->
                                            <?php
                                            $sql = "SELECT state FROM building WHERE org_id = :org_id
                                                    UNION
                                                    SELECT state FROM vehicle WHERE org_id = :org_id
                                                    UNION
                                                    SELECT state FROM other_asset WHERE org_id = :org_id
                                                    UNION
                                                    SELECT state FROM machinery WHERE org_id = :org_id
                                                    UNION
                                                    SELECT state FROM building WHERE org_id = :org_id
                                                    UNION
                                                    SELECT state FROM operation WHERE org_id = :org_id
                                                    UNION
                                                    SELECT state FROM administration WHERE org_id = :org_id
                                                    ";
                                            $query = $dbh->prepare($sql);
                                            $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_ASSOC);
                                            $accept = 0;
                                            $progress = 0;
                                            $shipped = 0;
                                            $delivered = 0;
                                            foreach ($results as $result) {
                                                foreach ($result as $key => $value) {
                                                    if ($value == 1) {
                                                        $accept++;
                                                    } elseif ($value == 2) {
                                                        $progress++;
                                                    } elseif ($value == 3) {
                                                        $shipped++;
                                                    } elseif ($value == 4) {
                                                        $delivered++;
                                                    }
                                                    
                                                }
                                            }

                                            ?>

                                            <div class="col-lg-6 col-md-12">
                                                <div class="au-card chart-percent-card recent-report2">
                                                    <div class="au-card-inner">
                                                        <h3 class="title-2 tm-b-5">char by %</h3>
                                                        <div class="row no-gutters">
                                                            <div class="col-xl-6">
                                                                <div class="chart-note-wrap">
                                                                    <div class="chart-note mr-0 d-block">
                                                                        <h2 class="number accepted_no"><?= $accept ?></h2>
                                                                        <span class="dot dot--blue"></span>
                                                                        <span><?= $accept?></span>
                                                                    </div>
                                                                    <div class="chart-note mr-0 d-block">
                                                                        <h2 class="number progress_no"><?= $progress ?></h2>
                                                                        <span class="dot dot--red"></span>
                                                                        <span><?= $progress?></span>
                                                                    </div>
                                                                    <div class="chart-note mr-0 d-block">
                                                                        <h2 class="number shipped_no"><?= $shipped ?></h2>
                                                                        <span class="dot dot--blue"></span>
                                                                        <span><?= $shipped?></span>
                                                                    </div>
                                                                    <div class="chart-note mr-0 d-block">
                                                                        <h2 class="number delivered_no"><?= $delivered ?></h2>
                                                                        <span class="dot dot--red"></span>
                                                                        <span><?= $delivered?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="percent-chart">
                                                                    <canvas id="percent-chart"></canvas>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end content  -->
                                        </div>
                                    </div>
                                </div>
                                <?php
                                require_once "public/config/footer.php";
                                ?>
    </body>
    <script src="../public/js/inv.js"></script>

    </html>
<?php } ?>