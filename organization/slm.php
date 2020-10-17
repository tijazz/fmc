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
        $asset_id = $_POST['asset_id'];
        $asset_type = $_POST['asset_type'];
        $asset_life = $_POST['asset_life'];
        $ope_cost = $_POST['ope_cost'];
        $salvage = $_POST['salvage'];

        $sql = "INSERT INTO slm (user_id, org_id, asset_id, asset_type, asset_life, ope_cost, salvage) VALUES (:user_id, :org_id, :asset_id, :asset_type, :asset_life,  :ope_cost, :salvage)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
        $query->bindParam(':asset_id', $asset_id, PDO::PARAM_STR);
        $query->bindParam(':asset_type', $asset_type, PDO::PARAM_STR);
        $query->bindParam(':asset_life', $asset_life, PDO::PARAM_STR);
        $query->bindParam(':ope_cost', $ope_cost, PDO::PARAM_STR);
        $query->bindParam(':salvage', $salvage, PDO::PARAM_STR);
        $query->execute();
        $msg = "slm Updated Successfully";
        header('location:slmlist.php');
    }
}
