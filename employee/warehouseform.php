<?php
session_start();

error_reporting(0);
$error = "";
$msg = "";
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['submit'])) {

        
        $product = $_POST['product'];
        $user_id = $_SESSION['id'];
        $org_id = $_SESSION['org_id'];
        $warehouse = $_POST['warehouse'];
        $quantity = $_POST['quantity'];
        $status = $_POST['status'];

        $sql = "INSERT INTO `warehouse`(`product_id`, `user_id`, `org_id`, `warehouse`, `quantity`, `status`)
	VALUES (:product, :user_id, :org_id, :warehouse, :quantity, :status)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':product', $product, PDO::PARAM_STR);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
        $query->bindParam(':warehouse', $warehouse, PDO::PARAM_STR);
        $query->bindParam(':quantity', $quantity, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();

        echo var_dump($sql);
        $msg = "Product Updated Successfully";
        header('location:warehouselist.php');
    }
}
