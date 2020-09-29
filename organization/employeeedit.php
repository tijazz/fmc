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

    <body>

        <?php
        require_once "public/config/header.php";
        ?>

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Edit Employeee</h4>
        </div>
        <div class="modal-body">

            <?php
            if (isset($_POST['edit'])) {
                $editid = $_POST['edit'];

                $file = $_FILES['image']['name'];
                $file_loc = $_FILES['image']['tmp_name'];
                $folder = "employee/";
                $new_file_name = strtolower($file);
                $final_file = str_replace(' ', '-', $new_file_name);

                $user_id = $_SESSION['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                $gender = $_POST['gender'];
                $role = $_POST['role'];
                $phone = $_POST['phone'];
                $contract_start = $_POST['contract_start'];
                $contract_end = $_POST['contract_end'];
                $salary = $_POST['salary'];

                if (move_uploaded_file($file_loc, $folder . $final_file)) {
                    $image = $final_file;
                }

                    $sql = "UPDATE `employee` SET `image`=(:image), `name`=(:name), `email`=(:email), `password`=(:password), `gender`=(:gender), `role`=(:role),  `phone`=(:phone), `contract_start`=(:contract_start), `contract_end`=(:contract_end), `salary`=(:salary) WHERE `employee`.`id`=(:editid);";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':image', $image, PDO::PARAM_STR);
                    $query->bindParam(':name', $name, PDO::PARAM_STR);
                    $query->bindParam(':email', $email, PDO::PARAM_STR);
                    $query->bindParam(':password', $password, PDO::PARAM_STR);
                    $query->bindParam(':gender', $gender, PDO::PARAM_STR);
                    $query->bindParam(':role', $role, PDO::PARAM_STR);
                    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
                    $query->bindParam(':contract_start', $contract_start, PDO::PARAM_STR);
                    $query->bindParam(':contract_end', $contract_end, PDO::PARAM_STR);
                    $query->bindParam(':salary', $salary, PDO::PARAM_STR);
                    $query->bindValue(':editid', $editid, PDO::PARAM_STR);
                    $query->execute();
                    $msg = "Information Updated Successfully";
                    header('location:employee.php');
                
            } elseif (isset($_GET['s'])) {
                $sn = $_GET['s'];


                $sql = "SELECT * from `employee` WHERE id=(:idedit)";
                $query = $dbh->prepare($sql);
                $query->bindValue(':idedit', $sn, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetch(PDO::FETCH_OBJ);


            ?>
                <form action="employeeedit.php" method="POST" class="forma" enctype="multipart/form-data" onSubmit="return validate()">

                    <p>

                        <label for="empname">Employee Name</label>
                        <input type="text" name="name" value="<?php echo $results->name ?>" required>
                    </p>

                    <p>
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $results->email ?>" required>
                    </p>

                    <p>
                        <label for="password">Password</label>
                        <input type="password" name="password" value="<?php echo $results->password ?>" required>
                    </p>

                    <p>
                        <label for="gender">Gender</label>
                        <select name="gender" required>
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </p>
                    <p>
                        <label for="Role">Role</label>
                        <input type="role" name="role" value="<?php echo $results->role ?>" required>
                    </p>
                    <p>
                        <label for="Number">Phone Number</label>
                        <input type="tel" name="phone" value="<?php echo $results->phone ?>" required>
                    </p>
                    <p>
                        <label for="profilepic">Profile Pic</label>
                        <input type="file" name="image" value="" required>
                    </p>
                    <p>
                        <label for="Number">Contract Start</label>
                        <input type="date" name="contract_start" value="<?php echo $results->contract_start ?>" required>
                    </p>
                    <p>
                        <label for="Number">Contract Due</label>
                        <input type="date" name="contract_end" value="<?php echo $results->contract_end ?>" required>
                    </p>
                    <p>
                        <label for="salary">Salary</label>
                        <input type="text" name="salary" value="<?php echo $results->salary ?>" required>
                    </p>
                    <p>
                        <button type="submit" name="edit" value="<?php echo $sn ?>">
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