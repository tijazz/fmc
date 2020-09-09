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

    $grantname = $_POST['grantname'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $possibilityofreturn = $_POST['possibilityofreturn'];
    $add_parameters = $_POST['add_parameters'];

	
    $sql="INSERT INTO `granty` (`grantname`, `description`, `amount`, `possibilityofreturn`, `add_parameters`) VALUES (:grantname,:description,:amount,:possibilityofreturn,:add_parameters)";
    $query = $dbh->prepare($sql);

    $query-> bindParam(':grantname', $grantname, PDO::PARAM_STR);
	$query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':amount', $amount, PDO::PARAM_STR);
    $query-> bindParam(':possibilityofreturn', $possibilityofreturn, PDO::PARAM_STR);
    $query-> bindParam(':add_parameters', $add_parameters, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Grant Updated"; 
  
}    
?>

        <!DOCTYPE html>
        <html>


        <?php
        require_once ('public/config/header.php');
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
                <div class="panel-heading"><h4>Maintenance</h4></div>
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
                           
                 <form action="grant.php" method="POST" class="forma">
              
					<p>
                        <label for="grantname">Grant name</label>
                        <input type="text" name="grantname" value="">
                    </p>

                    <p>
                        <label for="description">Grant description</label>
                        <input type="text" name="description" value="">
                    </p>
                    <p>
                        <label for="amount">Grant Amount</label>
                        <input type="text" name="amount" value="">
                    </p>
					<p>
                        <label for="possibilityofreturn">Possibility of Return</label>
                        <input type="name" name="possibilityofreturn" value="">
                    </p>
                    <p>
                        <label for="add_parameters">(Add parameter)</label>
                        <input type="textarea" name="add_parameters" value="" col="5">
                    </p>
                    
                    <p>
                        <button type="submit" name="submit">
                            Submit
                        </button>
                    </p>

                    <p>
                        <?php echo $productname?>
                    </p>

                </form>
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
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>

    </body>
    
    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->
    </html>
    
    <?php } ?>