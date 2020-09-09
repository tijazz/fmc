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
    $email = $_SESSION['alogin'];
    $item=$_POST['item'];
    $table=$_POST['table'];

    $sql="INSERT INTO `maintenance-item` (`item`) VALUES (:item)";
        $query = $dbh->prepare($sql);
        $query-> bindParam(':item', $item, PDO::PARAM_STR);
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
                        <div class="row list-cat">
                        <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Category
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="list-category" id="maintenance-item">Maintenance</a></li>
                            <li><a href="#" class="list-category" id="Utilities">Utilities</a></li>
                            <li><a href="#" class="list-category">JavaScript</a></li>
                        </ul>
                        </div>

                        <!-- <form action="expendform.php" method="POST" class="forma"><p><label for="item">'+id+'</label><input type="text" name="item"></p><p><button type="submit" name="submit">Add Item</button></p></form> -->
                           
                        <form action="item.php" method="POST" class="forma">
                        <p><?echo $item?></p>
                        <p id="present"><label for="item">Maintenance</label><input type="text" name="item"></p>
                        <p id="pres"><label for="item">Category</label><input type="text" name="table" value="maintenance-item" disabled></p>
                        <p id="but"><button type="submit" name="submit">Add Item</button></p>
                        </form>
                        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
                        <script>
                                        $(".list-category").click(function(){
                                        var id = this.id
                                    if ($("#present").length) {
                                        $("#present").replaceWith('<p id="present"><label for="item">'+id+'</label><input type="text" name="item"></p>')
                                        $("#pres").replaceWith('<p id="pres"><label for="item">Category</label><input type="text" name="table" value="'+id+'" disabled></p>')
                                    }    

                                    })
                                    // <p><label for="item">'+id+'</label><input type="text" name="item"></p>
                        </script>
                



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