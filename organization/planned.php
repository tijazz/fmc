<?php
        session_start();
     
        error_reporting(0);
        $error="";
        $msg="";
        include('includes/config.php');
        if(strlen($_SESSION['alogin'])==0)
            {	
        header('location:index.php');
        }
        else{
            if(isset($_GET['del']))
                {
                    $id=$_GET['del'];

                    $sql = "delete from testimonial WHERE id=:id";
                    $query = $dbh->prepare($sql);
                    $query -> bindParam(':id',$id, PDO::PARAM_STR);
                    $query -> execute();                

                    $msg="Data Deleted successfully";
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
            <div class="row">

                <?php
                require_once "public/config/topbar.php";
                ?>

            </div>
            <div class="row dashboard-header">
                <div class="panel-heading" style='padding:0;'>
                    <h2 class="page-title">Planned</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">

                    <h2 class="page-title  text-white mb-0 mt-0">Planned Income</h2>
                    <h1><a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal"
                            style="color:#fff;" class="small-box-footer"><i
                                class="glyphicon glyphicon-plus text-blue"></i> Income </a></h1>
                    <!-- Zero Configuration Table -->
                    <div class="panel panel-default">
                        <div class="panel-heading">List Users</div>
                        <div class="panel-body">
                            <?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?>
                            </div><?php } 
								else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
                            <table id="zctb tablePreview" class="display table table-striped table-bordered table-hover"
                                cellspacing="0" width="100%">
                                <thead>
                                    <?php
                                    $months = ["Jan"=>"01", "Feb"=>"02", "Mar"=>"03", "Apr"=>"04", "May"=>"05", "Jun"=>"06", "Jul"=>"07", "Aug"=>"08", "Sep"=>"09", "Oct"=>"10", "Nov"=>"11", "Dec"=>"12"];
                                    $expense = array("Maintenance & repairs"=>"maintenance", "Project expenses"=>"expenditure", "Raw materials"=>"", "Security"=>"", "Other"=>"");
                                    $income = ["Product Sales"=>"productsale", "Service Sales"=>"service", "Grants"=>"granty", "Other"=>""];

                                    ?>
                                    <tr>
                                        <th>Income</th>
                                        <?php
                                            foreach ($months as $month => $num) {
                                                echo "<th>" . $month . "</th>";
                                            }
                                        ?>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $data = $dbh;
                                        function sum($data, $type, $table, $column, $num)
                                        {
                                            $sql = "SELECT * from ".$table." WHERE date = '2020-".$num."' AND ".$type." = '".$column."'";
                                            $query = $data->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {
                                                    return htmlentities($result->amount);
                                                }
                                            }
                                        };

                                    foreach ($income as $key => $value) {?>
                                        <tr>
                                        <th><?php echo $key;?></th>
                                        <?php
                                        foreach ($months as $month => $num) {?>
                                            <th><?php echo number_format(sum($data, "income", "plannedincome", $value, $num), 2) ?></th>
                                        <?php } ?>
                                    <?php }
                                    ?></tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content" style="height:auto">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Add Planned Income</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="plannedincome.php" method="POST" class="forma">

                                            <p>
                                                <label for="income">Income Type</label>
                                                
                                                <select name="income">
                                                <?php
                                                foreach($income as $key => $value){
                                                    echo '<option value="'.$value.'">'.$key.'</option>';
                                                } ;
                                                ?>
                                                </select>
                                            </p>

                                            <p>
                                                <label for="amount">Amount</label>
                                                <input type="text" name="amount" value="">
                                            </p>

                                            <p>
                                                <label for="month">Month</label>
                                                <input type="Month" name="month" value="">
                                            </p>
                                            <p>
                                                <button type="submit" name="submit">
                                                    Submit
                                                </button>
                                            </p>
                                        </form>


                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                                <!--end of modal-dialog-->
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


                <div class="col-lg-12">

                    <h2 class="page-title text-white">Planned Expense</h2>
                    <h1><a class="btn btn-md btn-primary" href="#add2" data-target="#add2" data-toggle="modal"
                            style="color:#fff;" class="small-box-footer"><i
                                class="glyphicon glyphicon-plus text-blue"></i> Expense </a></h1>
                    <!-- Zero Configuration Table -->
                    <div class="panel panel-default">
                        <div class="panel-heading">List Users</div>
                        <div class="panel-body">
                            <?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?>
                            </div><?php } 
								else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
                            <table id="zctb tablePreview" class="display table table-striped table-bordered table-hover"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Expense</th>
                                        <?php
                                            foreach ($months as $month => $num) {
                                                echo "<th>" . $month . "</th>";
                                            }
                                        ?>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($expense as $key => $value) {?>
                                        <tr>
                                        <th><?php echo $key;?></th>
                                        <?php
                                        foreach ($months as $month => $num) {?>
                                            <th><?php echo number_format(sum($data, "expense", "plannedexpense", $value, $num), 2) ?></th>
                                        <?php } ?>
                                    <?php }
                                    ?></tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="add2" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content" style="height:auto">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Add Planned Income</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="plannedexpense.php" method="POST" class="forma">

                                            <p>
                                                <label for="expense">Expense Type</label>
                                                
                                                <select name="expense">
                                                <?php
                                                foreach($expense as $key => $value){
                                                    echo '<option value="'.$value.'">'.$key.'</option>';
                                                } ;
                                                ?>
                                                </select>
                                            </p>

                                            <p>
                                                <label for="amount">Amount</label>
                                                <input type="text" name="amount" >
                                            </p>

                                            <p>
                                                <label for="month">Month</label>
                                                <input type="Month" name="month">
                                            </p>
                                            <p>
                                                <button type="submit" name="submit">
                                                    Submit
                                                </button>
                                            </p>
                                        </form>


                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                                <!--end of modal-dialog-->
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

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

</html>

<?php } ?>