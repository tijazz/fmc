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
    echo $description;
	
    $sql="INSERT INTO `machinery`(`category`, `name`, `description`, `serial_no`, `manufacturer`) VALUES (':category', ':name', ':description', ':serial_no', ':manufacturer')";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':category', $category, PDO::PARAM_STR);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':serial_no', $snum, PDO::PARAM_STR);
    $query-> bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";
    // header('location:machineryform.php');
}
}  
?>