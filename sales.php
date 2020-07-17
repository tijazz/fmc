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

    $transaction = $_POST['transaction'];
    $salename = $_POST['salename'];
    $date = $_POST['date'];
    $productname = $_POST['productname'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $discount = $_POST['discount'];
    $totalamount =$_POST['totalamount'];
    $totalquantity =$_POST['totalquantity'];
    $method = $_POST['method'];
    $customername = $_POST['customername'];
    $phone = $_POST['phone'];
    $type = $_POST['type'];
    $add_parameters = $_POST['add_parameters'];

	
    $sql="INSERT INTO `product sales` (`Transaction number`, `Sale employee name`, `Business transaction date`, `Product name`, `Product description`, `Price of product per unit`, `Quantity of product sold`, `Discount`, `Total income for product sold`, `Total number/quantity of product sold`, `Payment method`, `Customer’s name`, `Customer phone`, `type`, `Add parameter`) VALUES (:transaction,:salename,:date,:productname,:description,:price,:quantity,:discount,:totalamount,:totalquantity,:method,:customername,:phone,:type, :add_parameter";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':transaction', $transaction, PDO::PARAM_STR);
    $query-> bindParam(':salename', $salename, PDO::PARAM_STR);
    $query-> bindParam(':date', $date, PDO::PARAM_STR);
    $query-> bindParam(':productname', $productname, PDO::PARAM_STR);
	$query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':price', $price, PDO::PARAM_STR);
    $query-> bindParam(':quantity', $quantity, PDO::PARAM_STR);
    $query-> bindParam(':discount', $discount, PDO::PARAM_STR);
    $query-> bindParam(':totalamount', $totalamount, PDO::PARAM_STR);
    $query-> bindParam(':totalquantity', $totalquantity, PDO::PARAM_STR);
    $query-> bindParam(':method', $method, PDO::PARAM_STR);
    $query-> bindParam(':customername', $customername, PDO::PARAM_STR);
    $query-> bindParam(':phone', $phone, PDO::PARAM_STR);
    $query-> bindParam(':type', $type, PDO::PARAM_STR);
    $query-> bindParam(':add_parameters', $add_parameters, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Maintenance Updated"; 
  
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
                           
                 <form action="sales.php" method="POST" class="forma">
                 <p>
                        <select name="type">
                        <option selected>Daily</option>
                        <option >Weekly</option>
                        <option >Yearly</option>  
                        </select>
                    </p>
					<p>
                        <label for="transaction">Transaction number</label>
                        <input type="text" name="transaction">
                    </p>
                    <p>
                        <label for="salename">Sale employee name</label>
                        <input type="text" name="salename" value="">
                    </p>
        

                    <p>
                        <label for="date">Business transaction date</label>
                        <input type="date" name="date" value="">
                    </p>

                    <p>
                        <label for="productname">Product name</label>
                        <input type="text" name="productname" value="">
                    </p>

                    <p>
                        <label for="description">Product description</label>
                        <input type="text" name="description" value="">
                    </p>
                    <p>
                        <label for="price">Price of product per unit</label>
                        <input type="text" name="price" value="">
                    </p>
					<p>
                        <label for="quantity">Quantity of product sold</label>
                        <input type="name" name="quantity" value="">
                    </p>
					<p>
                        <label for="discount">Discount</label>
                        <input type="text" name="discount" value="">
                    </p>

                    <p>
                        <label for="totalamount">Total income for product sold</label>
                        <input type="text" name="totalamount" value="">
                    </p>

                    <p>
                        <label for="totalquantity">Total number/quantity of product sold</label>
                        <input type="text" name="totalquantity" value="">
                    </p>

                    <p>
                        <label for="method">Payment method</label>
                        <input type="text" name="method" value="">
                    </p>

                    <p>
                        <label for="type">Customer’s name</label>
                        <input type="text" name="customername" value="">
                    </p>

                    <p>
                        <label for="type">Phone number</label>
                        <input type="tel" name="phone" value="">
                    </p>

                    <p>
                        <label for="add_parameters">(Add parameter)</label>
                        <input type="textarea" name="add_parameters" value="">
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