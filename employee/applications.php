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
                <div class="panel-heading"><h2 class="page-title">Manage Assets</h2></div>
				</div>
            <div class="row">
                       
                <div class="col-lg-12">

                    <center>

<div class="noprint">

<h1 class='page-header'>Manage Assets</h1>

<form action="assets.php" method="get">

<input type="submit" name="current" value="Current Assets" class="myButton">&nbsp;
<input type="submit" name="fixed" value="Fixed Assets" class="myButton">&nbsp;
<input type="submit" name="other" value="Other Assets" class="myButton">&nbsp;


</form>


</div>

<div class="printonly">
<h1></h1>
</div>
<?php

if(isset($_GET['current']))
{
	include 'currentasset.php';
}
if(isset($_GET['fixed']))
{
	include 'fixedasset.php';
}
if(isset($_GET['other']))
{
	include 'otherasset.php';
}

?>

<div class="noprint">
<br><br>

<!-- <a href='javascript:window.print().landscape'><button class="myButton">Print</button></a><br><br> -->


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