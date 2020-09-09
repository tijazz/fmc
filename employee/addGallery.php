<?php
        session_start();
     
        error_reporting(0);
        $error="";
        $msg="";
        //$image="";
        include('includes/config.php');
        if(strlen($_SESSION['alogin'])==0)
            {	
        header('location:index.php');
        }
        else{
               

                if(isset($_POST['submit']))
                {
                $file = $_FILES['image']['name'];
                $file_loc = $_FILES['image']['tmp_name'];
                $folder="gallery/";
                $new_file_name = strtolower($file);
                $final_file=str_replace(' ','-',$new_file_name);

                $image=$_POST['image'];

                if(move_uploaded_file($file_loc,$folder.$final_file))
                    {
                        $image=$final_file;
                    } 
                
               $curr_timestamp = date('Y-m-d H:i:s');

                $sql="insert into gallery (imageName, created_at) values (:img, :date)";
                $query = $dbh->prepare($sql);
                $query-> bindParam(':img', $image, PDO::PARAM_STR);                
                $query-> bindParam(':date', $curr_timestamp, PDO::PARAM_STR);
                $query->execute(); 
                $msg="New Gallery Added Successfully";
                }   

?>

        <!DOCTYPE html>
        <html>


        <?php
        require_once "public/config/header.php";
        ?>
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
                <div class="panel-heading">	<h3 class="page-title">Gallery Upload </h3></div>
				</div>
            <div class="row">
                       
                <div class="col-lg-8">
                       <div class="panel panel-default">
                               <div class="panel-heading">Add Image</div>
                            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                            else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                            <div class="panel-body">
                               <form method="post" class="form-horizontal" enctype="multipart/form-data">
<!--
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Image Upload<span style="color:red">*</span></label>	
                                        <div class="col-sm-4 text-center">
                                             <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
            -->
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Select file</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image"/>
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
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