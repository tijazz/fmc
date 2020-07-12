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
         	
if(isset($_POST['submit']))
{

  $name=$_POST['name'];
  $email=$_POST['email'];
  $mobileno=$_POST['phone_no'];
  $title =$_POST['title'];
  $cat = $_POST['cat'];
  
}    
?>

        <!DOCTYPE html>
        <html>


        <?php
        require_once "public/config/header.php";
        ?>

<body>
<?php
		$email = $_SESSION['alogin'];
		$sql = "SELECT * from member where email = (:email);";
		$query = $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
        $cnt=1;	
        
        if($query->rowCount() > 0)
			{
			    
				
                $name = htmlentities($result->fullname);
                $email = htmlentities($result->email);
                $phone = htmlentities($result->phone);
                $category = htmlentities($result->category);
                    
            }


?>
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
                <div class="panel-heading"><h4>Edit Profile</h4></div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

				</div>
            <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                           
                        <form action="form.php" method="POST" class="forma">
                    <p>
                        <label for="full_name">Full Name</label>
                        <input type="text" name="full_name" disabled value="<?php echo $name;?>">
                    </p>

                    
                    <p>
                        <label for="phone_no">Phone Number</label>
                        <input type="number" name="phone_no" disabled value="<?php echo $phone;?>">
                        
                    </p>
                    
                    <p>
                        <label for="email">Email</label>
                        <input type="email" name="email" disabled value="<?php echo $email;?>">
                    </p>
                    
                    <p>
                        <label for="full_name">Title</label>
                        <input type="text" name="title" value="">
                    </p>

                    <p>
                        <select name="category" id="">
                        <option selected>Select</option>
                        

                        <?php 
                                        $sql = "SELECT * FROM `type-income`";
                                        $query = $dbh -> prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
										foreach($results as $result)
										{				?>	
										<option value="<?php echo htmlentities($result->title);?>"><?php echo htmlentities($result->title);?></option>
										<?php $cnt=$cnt+1; }} ?>
                        
                        
                            
                        </select>
                    </p>
                    
                    <p>
                        <button type="submit" name="submit">
                            Submit
                        </button>
                    </p>

                </form>
                <p>
                    <?php
                    foreach($cat as $ca){
                        echo $ca;
                    } 
                    
                    echo $title
                    ?>
                </p>

                        </div>
                    </div>
                </div>
            </div>
                
                <div class="col-lg-4">
                        <?php
                require_once "public/config/right-sidebar.php";
                ?>

                            </div>
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