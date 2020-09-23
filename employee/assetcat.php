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
    $item = $_POST['item'];
    $category = $_POST['category'];
    $sql="INSERT INTO `asset`(`item`, `category`) VALUES ( :item, :category)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':item', $item, PDO::PARAM_STR);
    $query-> bindParam(':category', $category, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";

    $link = $_SERVER['HTTP_REFERER'];
    $data=explode("/",$link); //associative array

      foreach($data as $d=>$a)
      {
        
      }
    header('location:'. $a);
}
}  
?>