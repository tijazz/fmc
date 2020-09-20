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
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $user_id = $_SESSION['id'];
    $org_id = $_SESSION['id'];
	
    $sql="INSERT INTO `locations`(`name`, `user`, `description`, `size`, `lat`, `lng`, `org_id`) VALUES (:name, :user, :description, :size, :lat, :lng, :org_id)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':user', $user_id, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':size', $size, PDO::PARAM_STR);
    $query-> bindParam(':lat', $lat, PDO::PARAM_STR);
    $query-> bindParam(':lng', $lng, PDO::PARAM_STR);
    $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";
    header('location:landlist.php');
    // echo $sql;


}



}  
?>