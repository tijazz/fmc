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
            if(isset($_GET['del']) && isset($_GET['email']))
                {
                    $id=$_GET['del'];
                    $name=$_GET['name'];

                    $sql = "delete from employee WHERE id=:id";
                    $query = $dbh->prepare($sql);
                    $query -> bindParam(':id',$id, PDO::PARAM_STR);
                    $query -> execute();

                    $msg="Employee Deleted successfully";
                }
               

		} if(isset($_POST['submit'])){
			$file = $_FILES['image']['name'];
			$file_loc = $_FILES['image']['tmp_name'];
			$folder="employee/"; 
			$new_file_name = strtolower($file);
			$final_file=str_replace(' ','-',$new_file_name);

            $user_id=$_SESSION['id'];
			$name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
			$gender=$_POST['gender'];
			$role=$_POST['role'];
            $phone=$_POST['phone'];
            $contract_start=$_POST['contract_start'];
            $contract_end=$_POST['contract_end'];

            
			if(move_uploaded_file($file_loc,$folder.$final_file))
				{
					$image=$final_file;
                    
				
			$sql ="INSERT INTO employee (`user_id`, `image`, `name`, `email`, `password`, `gender`, `role`, `phone`, `contract_start`, `contract_end`) VALUES(:user_id, :image, :name, :email, :password, :gender, :role, :phone, :contract_start, :contract_end);";
			$query= $dbh -> prepare($sql);
            $query-> bindParam(':user_id', $user_id, PDO::PARAM_STR);
			$query-> bindParam(':image', $image, PDO::PARAM_STR);
			$query-> bindParam(':name', $name, PDO::PARAM_STR);
			$query-> bindParam(':email', $email, PDO::PARAM_STR);
            $query-> bindParam(':password', $password, PDO::PARAM_STR);
			$query-> bindParam(':gender', $gender, PDO::PARAM_STR);
			$query-> bindParam(':role', $role, PDO::PARAM_STR);
			$query-> bindParam(':phone', $phone, PDO::PARAM_STR);
            $query-> bindParam(':contract_start', $contract_start, PDO::PARAM_STR);
            $query-> bindParam(':contract_end', $contract_end, PDO::PARAM_STR);
            $query->execute();
            
            } 
			if($lastInsertId)
			{
			echo "<script type='text/javascript'>alert('Employee Registered Sucessfull!');</script>";
			echo "<script type='text/javascript'> document.location = 'employee.php'; </script>";
			}
			else 
			{
			//$error="Something went wrong. Please try again";
			$msg="Something went wrong. Please try again";
			}

			}else  if(isset($_GET['edit']))
                {
                    $editid=$_GET['edit'];
                }



                if(isset($_POST['submit']))
                {
                $file = $_FILES['image']['name'];
                $file_loc = $_FILES['image']['tmp_name'];
                $folder="employee/";
                $new_file_name = strtolower($file);
                $final_file=str_replace(' ','-',$new_file_name);

				 $image=$_POST['image'];
                $name=$_POST['name'];
                $email=$_POST['email'];
                $gender=$_POST['gender'];
				$role=$_POST['role'];
                $phone=$_POST['phone'];
				$idedit=$_POST['editid'];
               
                if(move_uploaded_file($file_loc,$folder.$final_file))
                    {
                        $image=$final_file;
                    }

                $sql="UPDATE employee SET image=(:image), name=(:name), email=(:email), gender=(:gender), role=(:role),  phone=(:phone) WHERE id=(:idedit)";
                $query = $dbh->prepare($sql);
				$query-> bindParam(':image', $image, PDO::PARAM_STR);
                $query-> bindParam(':name', $name, PDO::PARAM_STR);
                $query-> bindParam(':email', $email, PDO::PARAM_STR);
                $query-> bindParam(':gender', $gender, PDO::PARAM_STR);
				$query-> bindParam(':role', $role, PDO::PARAM_STR);
                $query-> bindParam(':phone', $phone, PDO::PARAM_STR);                
                $query-> bindParam(':idedit', $idedit, PDO::PARAM_STR);
                $query->execute();
                $msg="Information Updated Successfully";
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
            <div class="row  border-bottom white-bg dashboard-header">
                <div class="panel-heading">
                    <h2 class="page-title">Manage Employee</h2>
                </div>
            </div>
            <div class="row" style="background:#fff;">

                <div class="col-lg-12 table_holder">
                    <div class="apart_placer end_placer" style="margin-top:1.3rem;">
                        <h2 class="page-title" style="color:#000;">Employees Details</h2>
                        <a class="green_btn" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;"
                            class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"> Add Employee</i></a>
                    </div>
                    <!-- Zero Configuration Table -->
                    <div class="table-cover">
                        <!-- <div class="table__">List of employees</div> -->
                        <div class="table-body_">
                            <?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?>
                            </div><?php } 
								else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
                            <table class="employee_table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Gender</th>
                                        <th>Role</th>
                                        <th>Phone</th>
                                        <th>Contract Start</th>
                                        <th>Contract End</th>
                                        <th>Due</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php $sql = "SELECT * from employee ";
										$query = $dbh -> prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
										foreach($results as $result)
										{				?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt);?></td>
                                        <td><img src="employee/<?php echo htmlentities($result->image);?>"
                                                style="width:50px; border-radius:50%;" /></td>
                                        <td><?php echo htmlentities($result->name);?></td>
                                        <td><?php echo htmlentities($result->email);?></td>
                                        <td><?php echo htmlentities($result->password);?></td>
                                        <td><?php echo htmlentities($result->gender);?></td>
                                        <td><?php echo htmlentities($result->role);?></td>
                                        <td><?php echo htmlentities($result->phone);?></td>
                                        <td><?php echo htmlentities($result->contract_start);?></td>
                                        <td><?php echo htmlentities($result->contract_end);?></td>
                                        <td><?php 
                                        $time = strtotime($result->contract_end);
                                        $newformat = date('Y-m-d',$time);
                                        echo ($newformat<=date('Y-m-d'))?'due':'not due';?></td>

                                        <td>
                                            <a href="editemployee.php?edit=<?php echo $result->id;?>"
                                                onclick="return confirm('Do you want to Edit');">&nbsp; <i
                                                    class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                                            <a href="employee.php?del=<?php echo $result->id;?>&email=<?php echo htmlentities($result->email);?>"
                                                onclick="return confirm('Do you want to Delete');"><i
                                                    class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                    <?php $cnt=$cnt+1; }} ?>
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
                                        <h4 class="modal-title">Add Employee</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="employee.php" method="POST" class="forma"
                                            enctype="multipart/form-data" onSubmit="return validate()">

                                            <p>

                                                <label for="empname">Employee Name</label>
                                                <input type="text" name="name" value="" required>
                                            </p>

                                            <p>
                                                <label for="email">Email</label>
                                                <input type="email" name="email" value="" required>
                                            </p>

                                            <p>
                                                <label for="password">Password</label>
                                                <input type="password" name="password" value="" required>
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
                                                <input type="role" name="role" value="" required>
                                            </p>
                                            <p>
                                                <label for="Number">Phone Number</label>
                                                <input type="tel" name="phone" value="" required>
                                            </p>
                                            <p>
                                                <label for="profilepic">Profile Pic</label>
                                                <input type="file" name="image" value="" required>
                                            </p>
                                            <p>
                                                <label for="Number">Contract Start</label>
                                                <input type="date" name="contract_start" value="" required>
                                            </p>
                                            <p>
                                                <label for="Number">Contract Due</label>
                                                <input type="date" name="contract_end" value="" required>
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

<?php //} ?>