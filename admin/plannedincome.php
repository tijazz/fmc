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

    $amount = $_POST['amount'];
    $date = $_POST['month'];
    $income = $_POST['income'];
   
	
    $sql="INSERT INTO plannedincome (income, amount, date) VALUES (:income, :amount, :date)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':income', $income, PDO::PARAM_STR);
    $query-> bindParam(':amount', $amount, PDO::PARAM_STR);
    $query-> bindParam(':date', $date, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";
    header('location:planned.php');
}
}  
?>