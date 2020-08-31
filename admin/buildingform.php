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
    $description = $_POST['description'];
    $size = $_POST['size'];
    $amount = $_POST['amount'];
    $location = $_POST['location'];
    $category = $_POST['category'];
    $user_id = $_SESSION['id'];
    
	
    $sql="INSERT INTO `building`(`name`, `user_id`, `description`, `amount` `size`, `location`, `category`) VALUES (:name, :user_id, :description, :amount, :size, :location, :category)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':amount', $amount, PDO::PARAM_STR);
    $query-> bindParam(':size', $size, PDO::PARAM_STR);
    $query-> bindParam(':location', $location, PDO::PARAM_STR);
    $query-> bindParam(':category', $category, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";
    header('location:buildinglist.php');


}



}  
?>