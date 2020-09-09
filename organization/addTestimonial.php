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
              

                $fullname=$_POST['fullname'];
                $occupation=$_POST['occupation'];
                $testimonial=$_POST['testimonial'];
                $curr_timestamp = date('Y-m-d H:i:s');
                

                $sql="insert into testimonial (fullname, occupation, body, created_at) values (:fullname, :occup, :body, :date)";
                $query = $dbh->prepare($sql);
                $query-> bindValue(':fullname', $fullname, PDO::PARAM_STR);
                $query-> bindValue(':occup', $occupation, PDO::PARAM_STR);
                $query-> bindValue(':body', $testimonial, PDO::PARAM_STR);
                $query-> bindValue(':date', $curr_timestamp, PDO::PARAM_STR);
                $query->execute(); 
                $msg="New Testimonial Created Successfully";
                }   


?>

        <!DOCTYPE html>
        <html>


        <?php
        require_once "public/config/header.php";
        ?>

<body>
<?php
		$sql = "SELECT * from member where id = :editid";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':editid',$editid,PDO::PARAM_INT);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
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
                <div class="panel-heading">	<h2 class="page-title">Testimonial</h2></div>
				</div>
            <div class="row">
                       
                <div class="col-lg-8">
                       <div class="panel panel-default">
                               <div class="panel-heading">Insert Info</div>
                            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                            else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                            <div class="panel-body">
                               <form method="post" class="form-horizontal" enctype="multipart/form-data">

                                
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Fullname<span style="color:red">*</span></label>
                                        <div class="col-sm-6">
                                        <input type="text" name="fullname" class="form-control" required value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Occupation<span style="color:red">*</span></label>
                                        <div class="col-sm-6">
                                        <input type="text" name="occupation" class="form-control" required value="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Testimonial<span style="color:red">*</span></label>
                                        <div class="col-sm-6">
                                             <textarea name="testimonial" class="form-control" required  id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                                        </div>
                                    </div>

                               </form>
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