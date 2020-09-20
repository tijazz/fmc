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
    $quantity = $_POST['quantity'];
    $manufacturer = $_POST['manufacturer'];
    $location = $_POST['location'];
    $category = $_POST['category'];
    $place = $_POST['place'];
    $status = $_POST['status'];
    $user_id = $_SESSION['id'];
        $org_id = $_SESSION['id'];
    
	
    $sql= "INSERT INTO `operation`(`user_id`, `name`, `description`, `quantity`, `manufacturer`, `location`, `category`, `place`, `status`, `org_id`) VALUES (:user_id, :name, :description, :quantity, :manufacturer, :location, :category, :place, :status, :org_id)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':quantity', $quantity, PDO::PARAM_STR);
    $query-> bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
    $query-> bindParam(':location', $location, PDO::PARAM_STR);
    $query-> bindParam(':category', $category, PDO::PARAM_STR);
    $query-> bindParam(':place', $place, PDO::PARAM_STR);
    $query-> bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";
    header('location:operationlist.php');
    
}
}  
?>