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
	$user = $_SESSION['id'];
	$org_id = $_SESSION['org'];
    $name = $_POST['name'];
    $description = $_POST['description'];
	$start = $_POST['start'];
    $end = $_POST['end'];
      
    $sql="INSERT INTO `alarm`(`user`, `org_id`, `name`, `description`, `start`, `end`) VALUES (:user, :org_id, :name, :description, :start, :end)";
	
    $query = $dbh->prepare($sql);
    
	$query-> bindParam(':user', $user, PDO::PARAM_STR);
    $query-> bindParam(':org_id', $org_id, PDO::PARAM_STR);
	$query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
	$query-> bindParam(':start', $start, PDO::PARAM_STR);
    $query-> bindParam(':end', $end, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Alerm Set Successfully";
    header('location:scheduling.php');

	
}
 

//$sql="INSERT INTO `alarm`(`name`, `user`, `description`, `org_id`, `end`) VALUES (:name, :user, :description, :org_id, :end)";
}
