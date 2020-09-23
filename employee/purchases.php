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
    $sn = $_POST['sn'];
    $name = $_POST['name'];
    $description = $_POST['description'];
	$ppunit = $_POST['ppunit'];
    $qitem = $_POST['qitem'];
	$amount = $_POST['amount'];
    $time = $_POST['time'];
    $date = $_POST['date'];
	$add_parameters =$_POST['add_parameters'];
	
    $sql="INSERT INTO purchases (sn, name, description, ppunit, qitem, amount, time, date, add_parameters) VALUES (:sn, :name, :description, :ppunit, :qitem, :amount, :time, :date, :add_parameters)";
    $query = $dbh->prepare($sql);
    
    $query-> bindParam(':sn', $sn, PDO::PARAM_STR);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
	$query-> bindParam(':ppunit', $ppunit, PDO::PARAM_STR);
    $query-> bindParam(':qitem', $qitem, PDO::PARAM_STR);
	$query-> bindParam(':amount', $amount, PDO::PARAM_STR);
    $query-> bindParam(':time', $time, PDO::PARAM_STR);
    $query-> bindParam(':date', $date, PDO::PARAM_STR);
    $query-> bindParam(':add_parameters', $add_parameters, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Purchases Updated Successfully"; 
  
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
                <div class="panel-heading"><h4>Purchase</h4></div>
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
                           
                 <form action="purchases.php" method="POST" class="forma">
				
					<p>
                        <label for="sn">Serial Number</label>
                        <input type="text" name="sn">
                    </p>
					<p>
                        <label for="full_name">Name of Item</label>
                        <input type="text" name="name">
                    </p> 
                    <p>
                        <label for="full_name">Description</label>
                        <input type="text" name="description" value="">
                    </p>
					<p>
                        <label for="sn">Price per Unit of Item</label>
                        <input type="text" name="ppunit">
                    </p>
					<p>
                        <label for="full_name">Quantity of Item</label>
                        <input type="text" name="qitem">
                    </p>

                    <p>
                        <label for="amount">Cost</label>
                        <input type="text" name="amount" value="">
                    </p>
					<p>
                        <label for="time">Time</label>
                        <input type="time" name="time" value="13:30">
					<p>
					<p>
                        <label for="date">Date</label>
                        <input type="date" name="date" value="2017-06-01">
                    </p>
					
                        <label for="add_parameters">Add Parameter</label>
                        <input type="textarea" name="add_parameters" value="">
                    </p>
                    
                    <p>
                        <button type="submit" name="submit">
                            Submit
                        </button>
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