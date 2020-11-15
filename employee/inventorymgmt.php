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

        $sql = "delete from insurance WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
        header('location:insurancelist.php');
    }

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $item = $_POST['item'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $amount = $_POST['amount'];
        $amount_paid = $_POST['amount_paid'];
        $period = $_POST['period'];
        $company = $_POST['company'];
        $user_id = $_SESSION['id'];


        $sql = "INSERT INTO `insurance`(`user_id`, `name`, `item`, `start_date`, `end_date`, `amount`, `amount_paid`, `period`, `company`) VALUES (:user_id, :name, :item, :start_date, :end_date, :amount, :amount_paid, :period, :company)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':item', $item, PDO::PARAM_STR);
        $query->bindParam(':start_date', $start_date, PDO::PARAM_STR);
        $query->bindParam(':end_date', $end_date, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->bindParam(':amount_paid', $amount_paid, PDO::PARAM_STR);
        $query->bindParam(':period', $period, PDO::PARAM_STR);
        $query->bindParam(':company', $company, PDO::PARAM_STR);
        $query->execute();
        $msg = "Rent Updated Successfully";
        header('location:insurancelist.php');
    }




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
                                            <h2 class="number">100</h2>
                                            <span class="desc">Machineries</span>
                                            <div class="icon">
                                                <i class="fa fa-tractor"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="statistic__item">
                                            <h2 class="number">38</h2>
                                            <span class="desc">Buildings</span>
                                            <div class="icon">
                                                <i class="fa fa-university"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="statistic__item">
                                            <h2 class="number product_no">1086</h2>
                                            <span class="desc">Products</span>
                                            <div class="icon">
                                                <i class="fa fa-money"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="statistic__item">
                                            <h2 class="number warehouse_no">140</h2>
                                            <span class="desc">Warehouses</span>
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
                                            <li>Bags of Rice</li>
                                            <li>Cattle</li>
                                            <li>Rabbits</li>
                                            <li>Worker Dogs</li>
                                            <li>Tractors</li>
                                        </ul>
                                        <ul>
                                            <li>200</li>
                                            <li>100</li>
                                            <li>50</li>
                                            <li>50</li>
                                            <li>55</li>
                                            <li>455</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <h1 class="summ_h1">
                                455<span>Total Items</span>
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
                                        <div class="col-lg-6 col-md-12">
                                            <div class="au-card chart-percent-card recent-report2">
                                                <div class="au-card-inner">
                                                    <h3 class="title-2 tm-b-5">char by %</h3>
                                                    <div class="row no-gutters">
                                                        <div class="col-xl-6">
                                                            <div class="chart-note-wrap">
                                                                <div class="chart-note mr-0 d-block">
                                                                    <span class="dot dot--blue"></span>
                                                                    <span>products</span>
                                                                </div>
                                                                <div class="chart-note mr-0 d-block">
                                                                    <span class="dot dot--red"></span>
                                                                    <span>Warehouses</span>
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