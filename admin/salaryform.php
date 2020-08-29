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

    $employee_id = $_POST['submit'];
    $type = $_POST['type'];
    $category = $_POST['category'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $allowance = $_POST['allowance'];
    $eligibility = $_POST['eligibility'];
    $method = $_POST['method'];
	$add_parameters =$_POST['add_parameters'];
	
    $sql="INSERT INTO `salary`(`type`, `name`, `amount payable`, `employee status`, `description`, `eligibility`, `method`, `allowance to be debited`, `Add parameter`, `employee_id`) VALUES (:type, :name, :amount, :category, :description, :eligibility, :method, :allowance, :add_parameters, :employee_id)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':type', $type, PDO::PARAM_STR);
    $query-> bindParam(':category', $category, PDO::PARAM_STR);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
	$query-> bindParam(':amount', $amount, PDO::PARAM_STR);
    $query-> bindParam(':allowance', $allowance, PDO::PARAM_STR);
    $query-> bindParam(':method', $method, PDO::PARAM_STR);
    $query-> bindParam(':eligibility', $eligibility, PDO::PARAM_STR);
    $query-> bindParam(':add_parameters', $add_parameters, PDO::PARAM_STR);
    $query-> bindParam(':employee_id', $employee_id, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Maintenance Updated"; 
    header('location:salarylist.php');
  
}    

} ?>