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

    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $user_id = $_SESSION['user_id'];
    $org_id = $_SESSION['org_id'];
	
    $sql="INSERT INTO `product`(`org_id`, `user_id`, `name`, `amount`)
	VALUES (:org_id, :user_id, :name, :amount)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':amount', $amount, PDO::PARAM_STR);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Product Updated Successfully";
    header('location:productlist.php');
}
}  
?>