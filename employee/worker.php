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

        $sql = "delete from worker WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "worker Deleted successfully";
        header('location:worker.php');
    }
}
if (isset($_POST['submit'])) {
    $file = $_FILES['image']['name'];
    $file_loc = $_FILES['image']['tmp_name'];
    $folder = "../images/";
    $new_file_name = strtolower($file);
    $final_file = str_replace(' ', '-', $new_file_name);



    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $kin = $_POST['kin'];
    $kin_phone = $_POST['kin_phone'];
    $job_location = $_POST['job_location'];
    $dob = $_POST['dob'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];
    $bank_name = $_POST['bank_name'];
    $bank_acct_no = $_POST['bank_acct_no'];
    $contract_type = $_POST['contract_type'];
    $status = $_POST['status'];
    $org_id = $_SESSION['org_id'];






    if (move_uploaded_file($file_loc, $folder . $final_file)) {
        $image = $final_file;
    }

    $sql = "INSERT INTO worker (`user_id`, `org_id`, `image`, `name`, `address`, `email`, `gender`, `phone`, `kin`, `kin_phone`, `job_location`, `dob`, `department`, `salary`, `bank_name`, `bank_acct_no`, `contract_type`, `status`) 
        VALUES(:user_id, :org_id, :image, :name, :address, :email, :gender, :phone, :kin, :kin_phone, :job_location, :dob, :department, :salary,  :bank_name, :bank_acct_no, :contract_type, :status);";
    $query = $dbh->prepare($sql);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
    $query->bindParam(':image', $image, PDO::PARAM_STR);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':address', $address, PDO::PARAM_STR);
    $query->bindParam(':gender', $gender, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query->bindParam(':kin', $kin, PDO::PARAM_STR);
    $query->bindParam(':kin_phone', $kin_phone, PDO::PARAM_STR);
    $query->bindParam(':job_location', $job_location, PDO::PARAM_STR);
    $query->bindParam(':dob', $dob, PDO::PARAM_STR);
    $query->bindParam(':department', $department, PDO::PARAM_STR);
    $query->bindParam(':salary', $salary, PDO::PARAM_STR);
    $query->bindParam(':bank_name', $bank_name, PDO::PARAM_STR);
    $query->bindParam(':bank_acct_no', $bank_acct_no, PDO::PARAM_STR);
    $query->bindParam(':contract_type', $contract_type, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();



    header('location:worker.php');
}
?>

<!DOCTYPE html>
<html>


<?php
require_once "public/config/header.php";
?>

<head>
    <link rel="stylesheet" href="public/css/new_styles.css">
    <script type="text/javascript">
        function validate() {
            var extensions = new Array("jpg", "jpeg");
            var image_file = document.regform.image.value;
            var image_length = document.regform.image.value.length;
            var pos = image_file.lastIndexOf('.') + 1;
            var ext = image_file.substring(pos, image_length);
            var final_ext = ext.toLowerCase();
            for (i = 0; i < extensions.length; i++) {
                if (extensions[i] == final_ext) {
                    return true;

                }
            }
            alert("Image Extension Not Valid (Use Jpg,jpeg)");
            return false;
        }
    </script>
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
                    <h2 class="page-title">Manage Worker</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">

                    <!-- button style Start -->
                    <div class="navbar">
                        <div class="container-fluid" style="padding-left:7px;">
                            <h1 class="nav navbar-nav">
                                <a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Worker</a>
                            </h1>
                        </div>
                    </div>
                    <!-- button style End -->

                    <!-- Zero Configuration Table -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Workers list</div>
                        <div class="panel-body">
                            <?php if ($error) { ?><div class="errorWrap" id="msgshow">
                                    <?php echo htmlentities($error); ?>
                                </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow">
                                    <?php echo htmlentities($msg); ?> </div><?php } ?>
                            <table id="zctb tablePreview" class="display table table-dark table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Permanent Address</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Next of Kin</th>
                                        <th>Next of Kin Contact</th>
                                        <th>Job Location</th>
                                        <th>D.O.B</th>
                                        <th>Department</th>
                                        <th>Date Employed</th>
                                        <th>Salary</th>
                                        <th>Bank Name</th>
                                        <th>Bank Account Number</th>
                                        <th>Contract Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    $sql = "SELECT * FROM `worker` WHERE org_id = :org_id";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {                ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><img src="../images/<?php echo htmlentities($result->image); ?>" style="width:50px; border-radius:50%;" /></td>
                                                <td><?php echo htmlentities($result->name); ?></td>
                                                <td><?php echo htmlentities($result->name); ?></td>
                                                <td><?php echo htmlentities($result->address); ?></td>
                                                <td><?php echo htmlentities($result->email); ?></td>
                                                <td><?php echo htmlentities($result->gender); ?></td>
                                                <td><?php echo htmlentities($result->phone); ?></td>
                                                <td><?php echo htmlentities($result->kin); ?></td>
                                                <td><?php echo htmlentities($result->kin_phone); ?></td>
                                                <td><?php echo htmlentities($result->job_location); ?></td>
                                                <td><?php echo htmlentities($result->dob); ?></td>
                                                <td><?php echo htmlentities($result->department); ?></td>
                                                <td><?php echo htmlentities($result->sign_up_date); ?></td>
                                                <td><?php echo htmlentities($result->salary); ?></td>
                                                <td><?php echo htmlentities($result->bank_name); ?></td>
                                                <td><?php echo htmlentities($result->bank_acct_no); ?></td>
                                                <td><?php echo htmlentities($result->contract_type); ?></td>
                                                <td><?php echo htmlentities($result->status); ?></td>
                                                <!-- Action Button Start -->
                                                <td>
                                                    <a data-toggle="modal" href="workeredit.php?s=<?php echo $result->id; ?>" data-target="#MyModal" data-backdrop="static">&nbsp;
                                                        <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                                                    <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog model-sm">
                                                            <div class="modal-content"> </div>
                                                        </div>
                                                    </div>

                                                    <a href="worker.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
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
                                        <h4 class="modal-title">Add worker</h4>
                                    </div>

                                    <div class="modal-body">
                                        <form action="worker.php" method="POST" class="forma" enctype="multipart/form-data" onSubmit="return validate()">

                                            <p>

                                                <label for="name">worker Name</label>
                                                <input type="text" name="name" value="">
                                            </p>

                                            <p>
                                                <label for="address">Address</label>
                                                <input type="address" name="address" value="">
                                            </p>

                                            <p>
                                                <label for="email">Email</label>
                                                <input type="email" name="email" value="">
                                            </p>

                                            <p>
                                                <label for="gender">Gender</label>
                                                <input list="gender" type="text" name="gender" value="">

                                                <datalist id="gender">
                                                    <option value="Female">
                                                    <option value="Male">
                                                </datalist>
                                            </p>
                                            <p>
                                                <label for="phone">Phone</label>
                                                <input type="tel" name="phone" value="">
                                            </p>
                                            <p>
                                                <label for="profilepic">Profile Pic</label>
                                                <input type="file" name="image" value="">
                                            </p>

                                            <p>
                                                <label for="kin">Kin</label>
                                                <input type="text" name="kin" value="">
                                            </p>

                                            <p>
                                                <label for="kin_phone">Kin Phone Number</label>
                                                <input type="tel" name="kin_phone" value="">
                                            </p>

                                            <p>
                                                <label for="job_location">Job Location</label>
                                                <input type="address" name="job_location" value="">
                                            </p>

                                            <p>
                                                <label for="dob">Date Of Birth</label>
                                                <input type="date" name="dob" value="">
                                            </p>

                                            <p>
                                                <label for="department">Department</label>
                                                <input type="text" name="department" value="">
                                            </p>


                                            <p>
                                                <label for="salary">Salary</label>
                                                <input type="text" name="salary" value="">
                                            </p>

                                            <p>
                                                <label for="bank_name">Bank Name</label>
                                                <input type="text" name="bank_name" value="">
                                            </p>

                                            <p>
                                                <label for="bank_acct_no">Bank Account Number</label>
                                                <input type="text" name="bank_acct_no" value="">
                                            </p>

                                            <p>
                                                <label for="contract_type">Contract Type</label>
                                                <input list="contract_type" type="text" name="contract_type" value="">

                                                <datalist id="contract_type">
                                                    <option value="permanent">Permanent</option>
                                                    <option value="part-time">Part-time</option>
                                                </datalist>
                                            </p>

                                            <p>
                                                <label for="status">Status</label>
                                                <input list="status" type="text" name="status" value="">

                                                <datalist id="status">
                                                    <option value="Active">
                                                    <option value="Inactive">
                                                </datalist>
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