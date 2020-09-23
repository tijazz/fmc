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
            if(isset($_GET['reply']))
            {
            $replyto=$_GET['reply'];
            }   
        
            if(isset($_POST['submit']))
          {	
            $reciver=$_POST['email'];
            $message=$_POST['message'];
            $notitype='Send Message';
            $sender='Admin';
            
            $sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
            $querynoti = $dbh->prepare($sqlnoti);
            $querynoti-> bindParam(':notiuser', $sender, PDO::PARAM_STR);
            $querynoti-> bindParam(':notireciver',$reciver, PDO::PARAM_STR);
            $querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
            $querynoti->execute();
        
            $sql="insert into feedback (sender, reciver, feedbackdata) values (:user,:reciver,:description)";
            $query = $dbh->prepare($sql);
            $query-> bindParam(':user', $sender, PDO::PARAM_STR);
            $query-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
            $query-> bindParam(':description', $message, PDO::PARAM_STR);
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
                <div class="panel-heading"><h2>Reply Feedback</h2></div>
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
                                        <label class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                        <input type="text" name="email" class="form-control" readonly required value="<?php echo htmlentities($replyto);?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Message<span style="color:red">*</span></label>
                                        <div class="col-sm-6">
                                        <textarea name="message" class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>

                                    <input type="hidden" name="editid" class="form-control" required value="<?php echo htmlentities($result->id);?>">

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn btn-primary" name="submit" type="submit">Send Reply</button>
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