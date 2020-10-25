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
    $serial_no = $_POST['serial_no'];
    $manufacturer = $_POST['manufacturer'];
    $amount = $_POST['amount'];
    $user_id = $_SESSION['user_id'];
    $org_id = $_SESSION['org_id'];
	
    $sql= "INSERT INTO `vehicle`(`name`, `description`, `user_id`, `serial_no`, `amount`, `manufacturer`, `org_id`) VALUES (:name, :description, :user_id, :serial_no, :amount, :manufacturer, :org_id)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':serial_no', $serial_no, PDO::PARAM_STR);
    $query-> bindParam(':amount', $amount, PDO::PARAM_STR);
    $query-> bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
    $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";

    header('location:vehiclelist.php');
}
}  
?>