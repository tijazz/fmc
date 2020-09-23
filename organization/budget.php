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
                <div class="row  dashboard-header">
                    <div class="panel-heading" style='padding:0;'>
                        <h2 class="page-title">Manage Budgets</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-4">

                        <h2 class="page-title" style='color:#fff;'>Select Range</h2>
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Expenses</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr><th colspan="2"><input type="number" placeholder="YYYY" min="2017" max="2100" value="<?php echo date('Y'); ?>"></th></tr>
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

                        <h2 class="page-title" style='color:#fff;'>Budget</h2>
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Expenses</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <?php
                                    $months = ["Jan"=>"01", "Feb"=>"02", "Mar"=>"03", "Apr"=>"04", "May"=>"05", "Jun"=>"06", "Jul"=>"07", "Aug"=>"08", "Sep"=>"09", "Oct"=>"10", "Nov"=>"11", "Dec"=>"12"];
                                    $expense = array("Maintenance & repairs"=>"maintenance", "Project expenses"=>"expenditure", "Raw materials"=>"", "Security"=>"", "Other"=>"");
                                    $income = ["Product Sales"=>"productsales", "Service Sales"=>"service", "Grants"=>"granty", "Other"=>""];

                                    

                                    ?>
                                    <thead>
                                        <tr>
                                            <th>Expenses</th>
                                            <?php
                                            foreach ($months as $month => $num) {
                                                echo "<th>" . $month . "</th>";
                                            }
                                            ?>
                                            <th>Total</th>
                                            <th>Average</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        $data = $dbh;
                                        function sum($data, $table, $column, $num)
                                        {
                                            $sql = "SELECT SUM(" . $column . ") as amt FROM `" . $table . "` WHERE (`date` >= '2020-". $num."-00 00:00:00' AND `date` <= '2020-". $num."-31 00:00:00') OR (`date` >= '2020-". $num."-00' AND `date` <= '2020-". $num."-31')";
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


                                        function total($data, $table, $column)
                                        {
                                            $sql = "SELECT SUM(" . $column . ") as amt FROM `" . $table . "` WHERE (`date` >= '2020-01-00 00:00:00' AND `date` <= '2020-12-31 00:00:00') OR (`date` >= '2020-01-00' AND `date` <= '2020-31-31')";
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
                                        <?php
                                        foreach ($months as $month => $num) {?>
                                            <th><?php echo number_format(sum($data, $value, "amount", $num), 2) ?></th>
                                        <?php } ?>
                                        <th><?php echo number_format(total($data, $value, "amount"), 2) ?></th>
                                        <th><?php echo number_format(total($data, $value, "amount")/12, 2) ?></th>
                                    <?php }
                                    ?></tr>
                                   

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-12">
                        <h2 class="page-title" style='color:#fff;'>Income</h2>
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Income</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Income</th>
                                            <?php
                                            foreach ($months as $month => $num) {
                                                echo "<th>" . $month . "</th>";
                                            }
                                            ?>
                                            <th>Total</th>
                                            <th>Average</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    foreach ($income as $key => $value) {?>
                                        <tr>
                                        <th><?php echo $key;?></th>
                                        <?php
                                        foreach ($months as $month => $num) {?>
                                            <th><?php echo number_format(sum($data, $value, "amount", $num), 2) ?></th>
                                        <?php } ?>
                                        <th><?php echo number_format(total($data, $value, "amount"), 2) ?></th>
                                        <th><?php echo number_format(total($data, $value, "amount")/12, 2) ?></th>
                                    <?php }
                                    ?></tr>

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