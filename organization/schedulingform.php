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
    $end = $_POST['end'];
    $user_id = $_SESSION['id'];
    $org_id = $_SESSION['org'];
      
    $sql="INSERT INTO `alarm`(`name`, `user_id`, `description`, `org_id`, `end`) VALUES (:name, :user_id, :description, :org_id, :end)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':org_id', $org_id, PDO::PARAM_STR);
    $query-> bindParam(':end', $end, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";
    header('location:schedulingform.php');


}
 


}
