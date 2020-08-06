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

        $sql = "delete from testimonial WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
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
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="panel-heading">
                        <h2 class="page-title">Manage Testimonials</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-3">

                        <h2 class="page-title">Select Range</h2>
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Expenses</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Limit</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <th><input id="datePicker1" type="date" /></th>
                                            <th>Upper</th>
                                        </tr>

                                        <tr>
                                            <th><input id="datePicker2" type="date" /></th>
                                            <th>Lower</th>
                                        </tr>

                                        <tr>
                                            <th colspan="2"><input type="button" id="go" value="Go" /></th>
                                        </tr>


                                        <tr>
                                            <th colspan="2"><?php
                                                            echo $_GET['lower'];
                                                            ?>
                                            </th>
                                        </tr>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                        <script>
                                            $(document).ready(function() {
                                                var now = new Date();

                                                var day = ("0" + now.getDate()).slice(-2);
                                                var month = ("0" + (now.getMonth() + 1)).slice(-2);

                                                var today = now.getFullYear() + "-" + (month) + "-" + (day);


                                                $('#datePicker1').val(today);
                                                $('#datePicker2').val(today);

                                                $('#go').click(function() {

                                                    testClicked();

                                                });
                                            });

                                            function testClicked() {
                                                var lower = $('#datePicker1').val()
                                                var upper = $('#datePicker2').val()
                                                window.location.href = "budget.php?lower=" + lower + "&upper=" + upper;
                                            
                                            }
                                        </script>
                                        <?php
                                        echo "<script>$('#datePicker1').val(" . $_GET['lower'] . ");
                                                $('#datePicker2').val(" . $_GET['lower'] . ");</script>;"
                                        ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-12">

                        <h2 class="page-title">Budget</h2>
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Expenses</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <?php
                                    $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                                    ?>
                                    <thead>
                                        <tr>
                                            <th>Expense</th>
                                            <?php
                                            foreach ($months as $month) {
                                                echo "<th>" . $month . "</th>";
                                            }
                                            ?>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        $data = $dbh;
                                        function sum($data, $table, $column)
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
                                        ?>
                                        <tr>
                                            <th>Maintenance and Repairs</th>
                                            <?php
                                            foreach ($months as $month) {
                                                echo "<th>" . sum($data, "maintenance", "amount") . "</th>";
                                            }
                                            ?>
                                        </tr>

                                        <tr>
                                            <th>Product Expense</th>
                                            <?php
                                            foreach ($months as $month) {
                                                echo "<th>" . sum($data, "expenditure", "amount") . "</th>";
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th>Power</th>
                                            <?php
                                            foreach ($months as $month) {
                                                echo "<th>" . sum($data, "power", "amount") . "</th>";
                                            }
                                            ?>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-12">
                        <h2 class="page-title">Income</h2>
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
                                            foreach ($months as $month) {
                                                echo "<th>" . $month . "</th>";
                                            }
                                            ?>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <th>Product Sales</th>
                                            <?php
                                            foreach ($months as $month) {
                                                echo "<th>" . sum($data, "productsale", "totalamount") . "</th>";
                                            }
                                            ?>
                                        </tr>

                                        <tr>
                                            <th>Service sales</th>
                                            <?php
                                            foreach ($months as $month) {
                                                echo "<th>" . sum($data, "service", "totalamount") . "</th>";
                                            }
                                            ?>
                                        </tr>

                                        <tr>
                                            <th>Grant</th>
                                            <?php
                                            foreach ($months as $month) {
                                                echo "<th>" . sum($data, "granty", "amount") . "</th>";
                                            }
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