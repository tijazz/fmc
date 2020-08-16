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
    echo $manufacturer;
	
    $sql="INSERT INTO `vehicle`(`name`, `description`, `serial_no`, `manufacturer`) VALUES (:name, :description, :serial_no, :manufacturer)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':serial_no', $serial_no, PDO::PARAM_STR);
    $query-> bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";

    header('location:vehiclelist.php');
}
}  
?>