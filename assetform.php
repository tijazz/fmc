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
    $asset_id = $_POST['asset_id'];
    $asset_type = $_POST['asset_type'];
    $amount = $_POST['amount'];
    $user_id = $_SESSION['id'];

    $sql="INSERT INTO `asset_amount`( `user_id`, `asset_id`, `asset_type`, `amount`) VALUES (':user_id', :asset_id, :asset_type, :amount)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $query-> bindParam(':asset_id', $asset_id, PDO::PARAM_STR);
    $query-> bindParam(':asset_type', $asset_type, PDO::PARAM_STR);
    $query-> bindParam(':amount', $amount, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Feedback Send";
    echo var_dump($query);
    header('location:assetlist.php');
    
    $subject = "Asset";
	$comment = "New Asset Registered!";
	$sql1 = "INSERT INTO comments(comment_subject, comment_text)VALUES ('$subject', '$comment')";
	$query = $dbh -> prepare($sql1);
	$query-> bindParam(':subject', $subject, PDO::PARAM_STR);
    $query-> bindParam(':comment', $comment, PDO::PARAM_STR);
	$query->execute();


  
}   

 } ?>