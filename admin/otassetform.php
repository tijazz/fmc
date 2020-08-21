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
    $status = $_POST['status'];
    $location = $_POST['location'];
    echo $status;
	
    $sql="INSERT INTO `other_asset`(`name`, `description`, `quantity`, `manufacturer`, `status`, `location`) VALUES (:name, :description, :quantity, :manufacturer, :status, :location)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':quantity', $quantity, PDO::PARAM_STR);
    $query-> bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
    $query-> bindParam(':status', $status, PDO::PARAM_STR);
    $query-> bindParam(':location', $location, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";

    header('location:otassetlist.php');


    
}
} 
?>