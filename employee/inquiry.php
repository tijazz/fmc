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
        $file = $_FILES['attachment']['name'];
        $file_loc = $_FILES['attachment']['tmp_name'];
        $folder="attachment/";
        $new_file_name = strtolower($file);
        $final_file=str_replace(' ','-',$new_file_name);
        
        $title=$_POST['title'];
        $description=$_POST['description'];
        $user=$_SESSION['alogin'];
        $reciver= 'Admin';
        $notitype='Send Feedback';
        $attachment=' ';

        if(move_uploaded_file($file_loc,$folder.$final_file))
            {
                $attachment=$final_file;
            }
        $notireciver = 'Admin';
        $sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
        $querynoti = $dbh->prepare($sqlnoti);
        $querynoti-> bindParam(':notiuser', $user, PDO::PARAM_STR);
        $querynoti-> bindParam(':notireciver', $notireciver, PDO::PARAM_STR);
        $querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
        $querynoti->execute();

        $sql="insert into feedback (sender, reciver, title,feedbackdata,attachment) values (:user,:reciver,:title,:description,:attachment)";
        $query = $dbh->prepare($sql);
        $query-> bindParam(':user', $user, PDO::PARAM_STR);
        $query-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
        $query-> bindParam(':title', $title, PDO::PARAM_STR);
        $query-> bindParam(':description', $description, PDO::PARAM_STR);
        $query-> bindParam(':attachment', $attachment, PDO::PARAM_STR);
        $query->execute(); 
        $msg="Feedback Send";
        }   
?>

        <!DOCTYPE html>
        <html>


        <?php
        require_once "public/config/header.php";
        ?>

<body>
<?php
		$sql = "SELECT * from member;";
		$query = $dbh -> prepare($sql);
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
                <div class="panel-heading"><h2>Inquiry and Complaints Form</h2></div>
				</div>
            <div class="row">
                       
                <div class="col-lg-8">
                       <div class="panel panel-default">
                               <div class="panel-heading">Input details</div>
                            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                            else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                            <div class="panel-body">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <input type="hidden" name="user" value="<?php echo htmlentities($result->email); ?>">
                                        <label class="col-sm-2 control-label">Title<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                        <input type="text" name="title" class="form-control" required>
                                        </div>

                                        <label class="col-sm-2 control-label">Attachment<span style="color:red"></span></label>
                                        <div class="col-sm-4">
                                        <input type="file" name="attachment" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Description<span style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                        <textarea class="form-control" rows="5" name="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn btn-primary" name="submit" type="submit">Send</button>
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