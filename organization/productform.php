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

    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $product_name = $_POST['product_name'];   
	
    $sql="INSERT INTO `product`(`product_id`, `user_id`, `product_name`)
	VALUES (:product_id, :user_id, :product_name)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':product_id', $product_id, PDO::PARAM_STR);
    $query-> bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $query-> bindParam(':product_name', $product_name, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Product Updated Successfully";
    header('location:product.php');
}
}  
?>