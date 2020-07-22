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
    if(isset($_GET['del']) && isset($_GET['name']))
    {
        $id=$_GET['del'];
        $name=$_GET['name'];
        $sql = "delete from member WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':id',$id, PDO::PARAM_STR);
        $query -> execute();
        
        $sql2 = "insert into deleteduser (email) values (:name)";
        $query2 = $dbh->prepare($sql2);
        $query2 -> bindParam(':name',$name, PDO::PARAM_STR);
        $query2 -> execute();
        
        $msg="Data Deleted successfully";
    }
    
    if(isset($_REQUEST['unconfirm']))
    {
        $aeid=intval($_GET['unconfirm']);
        $memstatus=1;
        $sql = "UPDATE member SET status=:status WHERE  id=:aeid";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':status',$memstatus, PDO::PARAM_STR);
        $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
        $query -> execute();
        $msg="Changes Sucessfully";
    }
    
    if(isset($_REQUEST['confirm']))
    {
        $aeid=intval($_GET['confirm']);
        $memstatus=0;
        $sql = "UPDATE member SET status=:status WHERE  id=:aeid";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':status',$memstatus, PDO::PARAM_STR);
        $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
        $query -> execute();
        $msg="Changes Sucessfully";
    }

    
    ?>
    
    <!DOCTYPE html>
    <html>
    
    
    <?php
    require_once "public/config/header.php";
    ?>
    <link href="public/css/transactions.css" rel="stylesheet">
    
    
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
    <div class="panel-heading"><h2 class="page-title">Wallet</h2></div>
    </div>
    <div class="panel panel-default">
    <div class="panel-heading">List Users</div>
    <div class="panel-body">
    <?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
    else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
    </div>
    <div class="workzone">
    <div class="mini_side_nav">
    <h3>UIC Balance</h3>
    <span><h2>3000UIC</h2></span>
    <ul class="transaction_actions">
    <li><i class="fa fa-money"></i>    Transaction History</li>
    <li><i class="fa fa-credit-card"></i>   Fund Wallet</li>
    <li><i class="fa fa-bank"></i>    Transfer UIC</li>
    <li><i class="fa fa-suitcase"></i>     Withdraw Funds</li>
    </ul>
    </div>
    <div class="right">
    <div class="headers">
    <div class="mini-headers">
    <div class="active"><span >General Transactions</span></div>
    <div><span>Incoming Transactions</span></div>
    <div><span>Outgoing Transactions</span></div>
    </div>
    </div>
    <div class="payment_summaries">
    <div class="transaction">
    <h3>Transaction</h3>
    <div class="graph">
    <div class="line"></div>
    </div>
    <span class="rate"><h3>99.96</h3><span class="line_100"> | 100</span></span>
    </div>
    <div class="credit">
    <h3>Credit</h3>
    <div class="graph">
    <div class="line"></div>
    </div>
    <span class="rate"><h3>960.13</h3><span class="line_100"> | OUIC</span></span>
    </div>
    <div class="debit">
    <h3>Debit</h3>
    <div class="graph">
    <div class="line"></div>
    </div>
    <span class="rate"><h3>940.96</h3><span class="line_100"> | OUIC</span></span>
    </div>
    </div>
    
    <div class="transaction_header">
    <div><span>Type</span></div>
    <div><span>Date</span></div>
    <div><span>Status</span></div>
    <div><span>Debit/Credit</span></div>
    <div><span>Amount</span></div>
    </div>
    
    <ul class="transactions">
    <?php 
    $email = $_SESSION['alogin'];
    $sql = "SELECT * FROM transactions INNER JOIN member ON transactions.user_id = member.id WHERE email = (:email)";
    $query = $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
        foreach($results as $result)
        {				?>	
            <li>
            <span><?php echo htmlentities($result->category);?></span>
            <span><?php echo htmlentities($result->date);?></span>
            <span class="status">Pending</span>
            <span>Debit</span>
            <span><?php echo htmlentities($result->amount);?>UC</span>
            <div class="transaction_details">
            <div class="receiver">
            <h3>To</h3>
            <h1><?php echo htmlentities($result->fullname);?></h1>
            </div>
            <div class="invoice">
            <h3>Invoice Ticket</h3>
            <h2<?php echo htmlentities($result->details);?></h2>
            </div>
            <div class="bank">
            <h3>Bank</h3>
            <h2>UBA</h2>
            </div>
            <a href="" class="pay_cta">Pay Now</a>
            </div>
            </li>
            <?php $cnt=$cnt+1; }} ?>
            </ul>
            </div> 
            </div>
            
            <!---
            <div class="col-lg-4">
            <?php
            //    require_once "public/config/right-sidebar.php";
            ?>
            
            </div>
            -->
            </div>
            
            
            
            
            
            
            
            
            </div>
            
            
            </div>
            
            </div>
            
            <?php
            require_once "public/config/footer.php";
            ?>
            
            </body>
            
            </html>
            
            <?php } ?>