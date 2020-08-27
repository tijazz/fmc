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

    $category = $_POST['category'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $snum = $_POST['snum'];
    $manufacturer = $_POST['manufacturer'];
    $user_id = $_SESSION['id'];
	
    $sql="INSERT INTO `machinery`(`category`, `name`, `user_id`, `description`, `serial_no`, `manufacturer`) VALUES (:category, :name, :user_id, :description, :serial_no, :manufacturer)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':category', $category, PDO::PARAM_STR);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':serial_no', $snum, PDO::PARAM_STR);
    $query-> bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";
    header('location:machinerylist.php');
}
}  
?>