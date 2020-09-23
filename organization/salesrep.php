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
                <div class="panel-heading"><h2 class="page-title">Manage Sales Report</h2></div>
				</div>
            <div class="row">
                       
                <div class="col-lg-12">

                    <center>

<div class="noprint">

<h1 class='page-header'>Manage Sales Report</h1>

<form action="salesrep.php" method="get">

<input type="submit" name="today" value="Daily Sales" class="myButton">&nbsp;
<input type="submit" name="month" value="Monthly Sales" class="myButton">&nbsp;
<input type="submit" name="year" value="Yearly Sales" class="myButton">&nbsp;

<!-- From <input type="text" size='5' name="from" id="datepicker-start">&nbsp;
To <input type="text" size='5' name="to" id="datepicker-end">&nbsp;  

<input type="submit" name="range" value="Show" class="myButton"> -->

</form>


</div>

<div class="printonly">
<h1></h1>
</div>
<?php

if(isset($_GET['today']))
{
	include 'today.php';
}
if(isset($_GET['month']))
{
	include 'month.php';
}
if(isset($_GET['year']))
{
	include 'year.php';
}
if(isset($_GET['from']) && isset($_GET['to']) && isset($_GET['range']))
{
	$from = $_GET['from'];
	$to = $_GET['to'];
	
	//echo "from : $from <br> to : $to";
	include 'range.php';
}

?>

<div class="noprint">
<br><br>

<a href='javascript:window.print().landscape'><button class="myButton">Print</button></a><br><br>


</center>
</div>


<?php //include '../templates/footerfolder.php'; ?>


                               
                            </div>                           	

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