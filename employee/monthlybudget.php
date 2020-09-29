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
            <div class="row dashboard-header">
                <div class="panel-heading" style='padding:0;'>
                    <h2 class="page-title">Manage Monthly Budgets</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4">

                    <h2 class="page-title" style='color:#fff;'>Select Range</h2>
                    <!-- Zero Configuration Table -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Expenses</div>
                        <div class="panel-body">
                            <?php if ($error) { ?><div class="errorWrap" id="msgshow">
                                <?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div
                                class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                            <table id="zctb tablePreview" class="display table table-striped table-bordered table-hover"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th colspan="2"><input type="number" placeholder="YYYY" min="2017" max="2100"
                                                value="<?php echo date('Y'); ?>"></th>
                                    </tr>
                                    <script>
                                    document.querySelector("input[type=number]")
                                        .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
                                    </script>
                                    <tr>
                                        <th>Starting balance</th>
                                        <th>Ending Balance</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <th>1000</th>
                                        <th>1000</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


                <div class="col-lg-12">

                    <h2 class="page-title" style='color:#fff;'>Expenses</h2>
                    <!-- Zero Configuration Table -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Expenses</div>
                        <div class="panel-body">
                            <?php if ($error) { ?><div class="errorWrap" id="msgshow">
                                <?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div
                                class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                            <table id="zctb tablePreview" class="display table table-striped table-bordered table-hover"
                                cellspacing="0" width="100%">
                                <?php
                                    $months = ["Jan"=>"01", "Feb"=>"02", "Mar"=>"03", "Apr"=>"04", "May"=>"05", "Jun"=>"06", "Jul"=>"07", "Aug"=>"08", "Sep"=>"09", "Oct"=>"10", "Nov"=>"11", "Dec"=>"12"];
                                    $expense = array("Maintenance & repairs"=>"maintenance", "Project expenses"=>"expenditure", "Raw materials"=>"", "Security"=>"", "Other"=>"");
                                    $income = ["Product Sales"=>"productsale", "Service Sales"=>"service", "Grants"=>"granty", "Other"=>""];

                                    

                                    ?>
                                <thead>
                                    <tr>
                                        <th>Expense</th>
                                        <th>Actual</th>
                                        <th>Planned</th>
                                        <th>% (From total actual)</th>
                                        <th>Difference</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                        $data = $dbh;
                                        function actualsum($data, $table, $column)
                                        {
                                            $sql = "SELECT SUM(" . $column . ") as amt FROM `" . $table . "`";
                                            $query = $data->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {
                                                    return htmlentities($result->amt);
                                                }
                                            }
                                        };

                                        // function sum1($data, $type, $table, $column, $num)
                                        // {
                                        //     $sql = "SELECT * from ".$table." WHERE date = '2020-".$num."' AND ".$type." = '".$column."'";
                                        //     $query = $data->prepare($sql);
                                        //     $query->execute();
                                        //     $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        //     if ($query->rowCount() > 0) {
                                        //         foreach ($results as $result) {
                                        //             return htmlentities($result->amount);
                                        //         }
                                        //     }
                                        // };


                                        function plannedsum($data, $table, $col, $column, $year, $planned)
                                        {
                                            $sql = "SELECT SUM(" . $column . ") as amt FROM `" . $table . "` WHERE (".$planned." LIKE '".$col."') AND ((`date` >= '".$year."-01-00 00:00:00' AND `date` <= '".$year."-12-31 00:00:00') OR (`date` >= '".$year."-01-00' AND `date` <= '".$year."-12-31'))";
                                            $query = $data->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {
                                                    return htmlentities($result->amt);
                                                }
                                            }
                                        };
                                        ?>

                                    <?php
                                    foreach ($expense as $key => $value) {?>
                                    <tr>
                                        <th><?php echo $key;?></th>
                                        <th><?php echo number_format(actualsum($data, $value, "amount"), 2) ?></th>
                                        <th><?php echo number_format(plannedsum($data, "plannedexpense", $value, "amount", "2020", "expense"), 2) ?></th>
                                        <th><?php echo number_format(actualsum($data, $value, "amount")*100, 2) ?></th>
                                        <th><?php echo number_format(actualsum($data, $value, "amount")-plannedsum($data, "plannedexpense", $value, "amount", "2020", "expense"), 2) ?></th>
                                        
                                        <?php }
                                    ?>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


                <div class="col-lg-12">

                    <h2 class="page-title" style='color:#fff;'>Budget</h2>
                    <!-- Zero Configuration Table -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Expenses</div>
                        <div class="panel-body">
                            <?php if ($error) { ?><div class="errorWrap" id="msgshow">
                                <?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div
                                class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                            <table id="zctb tablePreview" class="display table table-striped table-bordered table-hover"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Income</th>
                                        <th>Actual</th>
                                        <th>Planned</th>
                                        <th>% (From total actual)</th>
                                        <th>Difference</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    foreach ($income as $key => $value) {?>
                                    <tr>
                                        <th><?php echo $key;?></th>
                                        <th><?php echo number_format(actualsum($data, $value, "amount"), 2) ?></th>
                                        <th><?php echo number_format(plannedsum($data, "plannedincome", $value, "amount", "2020", "income"), 2) ?></th>
                                        <th><?php echo number_format(actualsum($data, $value, "amount")*100, 2) ?></th>
                                        <th><?php echo number_format(actualsum($data, $value, "amount")-plannedsum($data, "plannedincome", $value, "amount", "2020", "income"), 2) ?></th>
                                        
                                        <?php }
                                    ?>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
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



</html>

<?php } ?>