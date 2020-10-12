<?php
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

error_reporting(0);
$error = "";
$msg = "";
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['del'])) {
        $id = $_GET['del'];

        $sql = "delete from appraisal WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Employee Deleted successfully";
        header('location:employeeappraisal.php');
    }

    if (isset($_POST['submit'])) {


        $user_id = $_SESSION['id'];
        $org_id = $_SESSION['id'];
        $empwor_id = $_POST['empwor_id'];
        $manager = $_POST['manager'];
        $resp = $_POST['resp'];
        $manager_rating = $_POST['manager_rating'];
        $date = $_POST['date'];
        $data_type = 'employee';






        $sql = "INSERT INTO `appraisal`(`user_id`, `org_id`, `empwor_id`, `manager`, `resp`, `manager_rating`, `date`, `data_type`) 
        VALUES (:user_id, :org_id, :empwor_id, :manager, :resp, :manager_rating, :date, :data_type)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
        $query->bindParam(':empwor_id', $empwor_id, PDO::PARAM_STR);
        $query->bindParam(':manager', $manager, PDO::PARAM_STR);
        $query->bindParam(':resp', $resp, PDO::PARAM_STR);
        $query->bindParam(':manager_rating', $manager_rating, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindParam(':data_type', $data_type, PDO::PARAM_STR);
        $query->execute();



        header('location:employeeappraisal.php');
    }
}

?>

<!DOCTYPE html>
<html>


<?php
require_once "public/config/header.php";
?>

<head>
    <link rel="stylesheet" href="public/css/new_styles.css">

</head>

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
                <div class="panel-heading">
                    <h2 class="page-title">Manage Employee</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">

                    <!-- button style Start -->
                    <div class="navbar">
                        <div class="container-fluid" style="padding-left:7px;">
                            <h1 class="nav navbar-nav">
                                <a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Employee Appraisal</a>
                            </h1>
                        </div>
                    </div>
                    <!-- button style End -->

                    <!-- Zero Configuration Table -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Employees Appraisal list</div>
                        <div class="panel-body">
                            <?php if ($error) { ?><div class="errorWrap" id="msgshow">
                                    <?php echo htmlentities($error); ?>
                                </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow">
                                    <?php echo htmlentities($msg); ?> </div><?php } ?>
                            <table id="zctb tablePreview" class="display table table-dark table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Manager</th>
                                        <th>Location</th>
                                        <th>Responsibilities</th>
                                        <th>Manager's Rating</th>
                                        <th>Current Salary</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    $sql = "SELECT * FROM `appraisal` WHERE org_id = :org_id AND data_type = :data_type";
                                    $query = $dbh->prepare($sql);
                                    $query->bindValue(":org_id", $_SESSION['id'], PDO::PARAM_STR);
                                    $query->bindValue(":data_type", "employee", PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {                ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo htmlentities(date("Y-m-d", strtotime($result->date))); ?></td>
                                                <?php
                                                $sq = "SELECT * FROM `employee` WHERE id = :id";
                                                $qu = $dbh->prepare($sq);
                                                $qu->bindValue(":id", $result->empwor_id, PDO::PARAM_STR);
                                                $qu->execute();
                                                $res = $qu->fetch(PDO::FETCH_OBJ);
                                                ?>
                                                <td><img src="../images/<?php echo htmlentities($res->image); ?>" style="width:50px; border-radius:50%;" /></td>
                                                <td><?php echo htmlentities($res->name); ?></td>
                                                <td><?php echo htmlentities($res->department); ?></td>
                                                <?php
                                                $s = "SELECT * FROM `employee` WHERE id = :id";
                                                $q = $dbh->prepare($s);
                                                $q->bindValue(":id", $result->manager, PDO::PARAM_STR);
                                                $q->execute();
                                                $r = $q->fetch(PDO::FETCH_OBJ);
                                                ?>
                                                <td><?php echo htmlentities($r->name); ?></td>
                                                <td><?php echo htmlentities($res->job_location); ?></td>
                                                <td><?php echo htmlentities($result->resp); ?></td>
                                                <td><?php echo htmlentities($result->manager_rating); ?></td>
                                                <td><?php echo htmlentities($res->salary); ?></td>

                                                <!-- Action Button Start -->
                                                <td>
                                                    <a data-toggle="modal" href="employeeappedit.php?s=<?php echo $result->id; ?>" data-target="#MyModal" data-backdrop="static">&nbsp;
                                                        <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                                                    <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog model-sm">
                                                            <div class="modal-content"> </div>
                                                        </div>
                                                    </div>

                                                    <a href="employeeappraisal.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
                                                </td>

                                                <!-- Action Button End -->
                                            </tr>
                                    <?php $cnt = $cnt + 1;
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>



                        <div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content" style="height:auto">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Appraise Employee</h4>
                                    </div>

                                    <div class="modal-body">
                                        <form action="employeeappraisal.php" method="POST" class="forma" enctype="multipart/form-data" onSubmit="return validate()">

                                            <p>
                                                <label for="date">Date</label>
                                                <input type="date" name="date">
                                            </p>

                                            <p>
                                                <label for="empwor_id">Name</label>
                                                <select name="empwor_id" id="">
                                                    <?php
                                                    $sql = "SELECT * FROM `employee` WHERE org_id = :org_id";
                                                    $query = $dbh->prepare($sql);
                                                    $query->bindValue(":org_id", $_SESSION['id'], PDO::PARAM_STR);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt = 1;
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) { ?>
                                                            <option value="<?php echo $result->id ?>"><?php echo $result->name ?></option>
                                                    <?php  }
                                                    } ?>

                                                </select>
                                            </p>

                                            <p>
                                                <label for="manager">Manager</label>
                                                <select name="manager" id="">
                                                    <?php
                                                    $sql = "SELECT * FROM `employee` WHERE org_id = :org_id";
                                                    $query = $dbh->prepare($sql);
                                                    $query->bindValue(":org_id", $_SESSION['id'], PDO::PARAM_STR);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt = 1;
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) { ?>
                                                            <option value="<?php echo $result->id ?>"><?php echo $result->name ?></option>
                                                    <?php  }
                                                    } ?>

                                                </select>
                                            </p>


                                            <p>
                                                <label for="resp">Responsibilities</label>
                                                <textarea name="resp" id="resp" cols="30" rows="10"></textarea>


                                            </p>

                                            <p>
                                                <label for="manager_rating">Manager's Rating</label>
                                                <input type="range" name="manager_rating" min="1" max="5">


                                            </p>

                                            <p>
                                                <button type="submit" name="submit">
                                                    Submit
                                                </button>
                                            </p>

                                        </form>


                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---end of modal dialog 1 -->








                    </div>

                </div>
                -->
            </div>

        </div>


    </div>

    </div>

    <?php
    require_once "public/config/footer.php";
    ?>
    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $('.succWrap').slideUp("slow");
            }, 3000);
        });
    </script>

</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

</html>

<?php //} 
?>