<?php
session_start();

error_reporting(0);
$error = "";
$msg = "";
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {


    if (isset($_POST["edit"])) {
        $editid = $_POST['edit'];

        echo "it is also working";
        $file = $_FILES['image']['name'];
        $file_loc = $_FILES['image']['tmp_name'];
        $folder = "../images/";
        $new_file_name = strtolower($file);
        $final_file = str_replace(' ', '-', $new_file_name);



        $user_id = $_SESSION['id'];
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
        $org_id = $_SESSION['id'];

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

    <body>

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Edit Employeee</h4>
        </div>
        <div class="modal-body">

            <?php
            if (isset($_GET['s'])) {
                $sn = $_GET['s'];


                $sql = "SELECT * from `employee` WHERE id=(:idedit)";
                $query = $dbh->prepare($sql);
                $query->bindValue(':idedit', $sn, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetch(PDO::FETCH_OBJ);


            ?>
                <form action="employeeedit.php" method="POST" class="forma" enctype="multipart/form-data">


                    <img src="../images/<?php echo $results->image ?>" alt="<?php echo $results->image ?>" style="border-radius: 50%; height:100px; width:100px;">
                    <p>
                        <label for="name">Employee Name</label>
                        <input type="text" name="name" value="<?php echo $results->name ?>">
                    </p>

                    <p>
                        <label for="address">Address</label>
                        <input type="address" name="address" value="<?php echo $results->address ?>">
                    </p>

                    <p>
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $results->email ?>">
                    </p>

                    <p>
                        <label for="gender">Gender</label>
                        <input list="gender" type="text" name="gender" value="<?php echo $results->gender ?>">

                        <datalist id="gender">
                            <option value="Female">
                            <option value="Male">
                        </datalist>
                    </p>
                    <p>
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" value="<?php echo $results->phone ?>">
                    </p>
                    <p>
                        <label for="profilepic">Profile Pic</label>
                        <input type="file" name="image" value="<?php echo $results->image ?>">
                    </p>

                    <p>
                        <label for="kin">Kin</label>
                        <input type="text" name="kin" value="<?php echo $results->kin ?>">
                    </p>

                    <p>
                        <label for="kin_phone">Kin Phone Number</label>
                        <input type="tel" name="kin_phone" value="<?php echo $results->kin_phone ?>">
                    </p>

                    <p>
                        <label for="job_location">Job Location</label>
                        <input type="address" name="job_location" value="<?php echo $results->job_location ?>">
                    </p>

                    <p>
                        <label for="dob">Date Of Birth</label>
                        <input type="date" name="dob" value="<?php echo $results->dob ?>">
                    </p>

                    <p>
                        <label for="department">Department</label>
                        <input type="text" name="department" value="<?php echo $results->department ?>">
                    </p>


                    <p>
                        <label for="salary">Salary</label>
                        <input type="text" name="salary" value="<?php echo $results->salary ?>">
                    </p>

                    <p>
                        <label for="bank_name">Bank Name</label>
                        <input type="text" name="bank_name" value="<?php echo $results->bank_name ?>">
                    </p>

                    <p>
                        <label for="bank_acct_no">Bank Account Number</label>
                        <input type="text" name="bank_acct_no" value="<?php echo $results->bank_acct_no ?>">
                    </p>

                    <p>
                        <label for="contract_type">Contract Type</label>
                        <input list="contract_type" type="text" name="contract_type" value="<?php echo $results->contract_type ?>">

                        <datalist id="contract_type">
                            <option value="permanent">Permanent</option>
                            <option value="part-time">Part-time</option>
                        </datalist>
                    </p>

                    <p>
                        <label for="status">Status</label>
                        <input list="status" type="text" name="status" value="<?php echo $results->status ?>">

                        <datalist id="status">
                            <option value="Active">
                            <option value="Inactive">
                        </datalist>
                    </p>


                    <p>
                        <button type="submit" name="edit" value="<?php echo $results->id ?>">
                            Submit
                        </button>
                    </p>

                </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">OK</button>
        </div>

    <?php
            }
            require_once "public/config/footer.php";
    ?>

    </body>

    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

    </html>


<?php

}


?>