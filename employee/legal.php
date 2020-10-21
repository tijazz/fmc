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
        $user_id = $_SESSION['user_id'];
        $org_id = $_SESSION['org_id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $ppunit = $_POST['ppunit'];
        $qitem = $_POST['qitem'];
        $amount = $_POST['amount'];

        $sql = "INSERT INTO legal (user_id, org_id, name, description, ppunit, qitem, amount) VALUES (:user_id, :org_id, :name, :description, :ppunit, :qitem, :amount)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':ppunit', $ppunit, PDO::PARAM_STR);
        $query->bindParam(':qitem', $qitem, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->execute();
        $msg = "legal Updated Successfully";
        header('location:legallist.php');
    }
}
