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

        $sql = "delete from employee WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Employee Deleted successfully";

        notify($dbh, $_SESSION['user_id'], $_SESSION['org_id'], $msg);
        header('location:employee.php');
    }

    if (isset($_POST['submit'])) {
        $file = $_FILES['image']['name'];
        $file_loc = $_FILES['image']['tmp_name'];
        $folder = "../images/";
        $new_file_name = strtolower($file);
        $final_file = str_replace(' ', '-', $new_file_name);

        function random_password($length)
        {
            //A list of characters that can be used in our
            //random password.
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!-.[]?*()';
            //Create a blank string.
            $password = '';
            //Get the index of the last character in our $characters string.
            $characterListLength = mb_strlen($characters, '8bit') - 1;
            //Loop from 1 to the $length that was specified.
            foreach (range(1, $length) as $i) {
                $password .= $characters[random_int(0, $characterListLength)];
            }
            return $password;
        }

        $user_id = $_SESSION['user_id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = random_password(6);
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


        // Load Composer's autoloader
        require '../vendor/autoload.php';

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);


        // try {
        //     //Server settings
        //     $mail->SMTPDebug = 0; // Enable verbose debug output                  // Send using SMTP
        //     $mail->Host       = 'mail.dufma.ng';                    // Set the SMTP server to send through
        //     $mail->Username   = 'admin@dufma.ng';                     // SMTP username
        //     $mail->Password   = 'ADEMOLA789@';
        //     $mail->SMTPKeepAlive = true;
        //     $mail->isSMTP();                               // SMTP password
        //     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication

        //     $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        //     $mail->Port       = '465';                                   // TCP port to connect to
        //     $mail->setFrom('admin@dufma.ng', 'Dufma');
        //     $mail->addAddress($email, $name);


        //     // Content
        //     $mail->isHTML(true);                                  // Set email format to HTML
        //     $mail->Subject = 'Login Details';
        //     $mail->Body    = "This is your login details:<br> email: " . $email . "<br>Password: " .  $password . "<br>Link: http://fmc.dufma.ng/";
        //     $mail->AltBody = "This is your email " . $email . " and Password " .  $password;

        //     $mail->send();
        //     echo 'Message has been sent';
        // } catch (Exception $e) {
        //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        // }


        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'dufmanigeria@gmail.com';                     // SMTP username
            $mail->Password   = 'dufma234';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom('dufmanigeria@gmail.com', 'Abdullahi');
            $mail->addAddress( $email, $name);     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
        
            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Login Details';
            $mail->Body    = "This is your login details:<br> email: " . $_POST['email'] . "<br>Password: " .  $_POST['password'];
            $mail->AltBody = "This is your email " . $_POST['email'] . " and Password " .  $_POST['password'];
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        if (move_uploaded_file($file_loc, $folder . $final_file)) {
            $image = $final_file;
        }

        $sql = "INSERT INTO employee (`user_id`, `org_id`, `image`, `name`, `address`, `email`, `password`, `gender`, `phone`, `kin`, `kin_phone`, `job_location`, `dob`, `department`, `salary`, `bank_name`, `bank_acct_no`, `contract_type`, `status`) 
        VALUES(:user_id, :org_id, :image, :name, :address, :email, :password, :gender, :phone, :kin, :kin_phone, :job_location, :dob, :department, :salary,  :bank_name, :bank_acct_no, :contract_type, :status);";
        $query = $dbh->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
        $query->bindParam(':image', $image, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':password', md5($password), PDO::PARAM_STR);
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



        header('location:employee.php');
    }


    if (isset($_POST["edit"])) {
        $editid = $_POST['edit'];

        echo "it is also working";
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

        echo "it is also working";

        if (move_uploaded_file($file_loc, $folder . $final_file)) {
            $image = $final_file;
        }

        $sql = "UPDATE `employee` SET `image`=(:image),`name`=(:name),`address`=(:address),`email`=(:email),`gender`=(:gender),`phone`=(:phone),`kin`=(:kin),`kin_phone`=(:kin_phone),`job_location`=(:job_location),`dob`=(:dob),`department`=(:department),`salary`=(:salary),`bank_name`=(:bank_name),`bank_acct_no`=(:bank_acct_no),`contract_type`=(:contract_type),`status`=(:status) WHERE `id`=(:editid);";
        $query = $dbh->prepare($sql);
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
        $query->bindParam(':editid', $editid, PDO::PARAM_STR);
        $query->execute();
        $msg = "Information Updated Successfully";
        header('location:employee.php');
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
                        <h2 class="page-title">Manage Employee</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <!-- button style Start -->
                        <div class="navbar">
                            <div class="container-fluid" style="padding-left:7px;">
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Employee</a>
                                </h1>
                            </div>
                        </div>
                        <!-- button style End -->

                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Employees list</div>
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
                                        $sql = "SELECT * FROM `employee` WHERE org_id = :org_id";
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
                                                        <a data-toggle="modal" href="#edit<?= $cnt ?>" data-toggle="modal" data-target="#edit<?= $cnt ?>">&nbsp;
                                                            <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;

                                                        <div class="modal fade" id="edit<?= $cnt ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content" style="height:auto">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span></button>
                                                                        <h4 class="modal-title">Add Detail</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="employee.php" method="POST" class="forma" enctype="multipart/form-data">


                                                                            <img src="../images/<?php echo $result->image ?>" alt="<?php echo $result->image ?>" style="border-radius: 50%; height:100px; width:100px;">
                                                                            <p>
                                                                                <label for="profilepic">Profile Pic</label>
                                                                                <input type="file" name="image" value="<?php echo $result->image ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="name">Employee Name</label>
                                                                                <input type="text" name="name" value="<?php echo $result->name ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="address">Address</label>
                                                                                <input type="address" name="address" value="<?php echo $result->address ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="email">Email</label>
                                                                                <input type="email" name="email" value="<?php echo $result->email ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="gender">Gender</label>
                                                                                <input list="gender" type="text" name="gender" value="<?php echo $result->gender ?>">

                                                                                <datalist id="gender">
                                                                                    <option value="Female">
                                                                                    <option value="Male">
                                                                                </datalist>
                                                                            </p>
                                                                            <p>
                                                                                <label for="phone">Phone</label>
                                                                                <input type="tel" name="phone" value="<?php echo $result->phone ?>">
                                                                            </p>


                                                                            <p>
                                                                                <label for="kin">Kin</label>
                                                                                <input type="text" name="kin" value="<?php echo $result->kin ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="kin_phone">Kin Phone Number</label>
                                                                                <input type="tel" name="kin_phone" value="<?php echo $result->kin_phone ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="job_location">Job Location</label>
                                                                                <input type="address" name="job_location" value="<?php echo $result->job_location ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="dob">Date Of Birth</label>
                                                                                <input type="date" name="dob" value="<?php echo $result->dob ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="department">Department</label>
                                                                                <input type="text" name="department" value="<?php echo $result->department ?>">
                                                                            </p>


                                                                            <p>
                                                                                <label for="salary">Salary</label>
                                                                                <input type="text" name="salary" value="<?php echo $result->salary ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="bank_name">Bank Name</label>
                                                                                <input type="text" name="bank_name" value="<?php echo $result->bank_name ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="bank_acct_no">Bank Account Number</label>
                                                                                <input type="text" name="bank_acct_no" value="<?php echo $result->bank_acct_no ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="contract_type">Contract Type</label>
                                                                                <input list="contract_type" type="text" name="contract_type" value="<?php echo $result->contract_type ?>">

                                                                                <datalist id="contract_type">
                                                                                    <option value="permanent">Permanent</option>
                                                                                    <option value="part-time">Part-time</option>
                                                                                </datalist>
                                                                            </p>

                                                                            <p>
                                                                                <label for="status">Status</label>
                                                                                <input list="status" type="text" name="status" value="<?php echo $result->status ?>">

                                                                                <datalist id="status">
                                                                                    <option value="Active">
                                                                                    <option value="Inactive">
                                                                                </datalist>
                                                                            </p>


                                                                            <p>
                                                                                <button type="submit" name="edit" value="<?php echo $result->id ?>">
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
                                                        <!--end of modal-dialog-->

                                                        <a href="employee.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
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
                                            <h4 class="modal-title">Add Employee</h4>
                                        </div>

                                        <div class="modal-body">
                                            <form action="employee.php" method="POST" class="forma" enctype="multipart/form-data" onSubmit="return validate()">

                                                <p>

                                                    <label for="name">Employee Name</label>
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



<?php }
?>