<?php
session_start();

error_reporting(0);
$error = "";
$msg = "";
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

echo "It is working";

    if (isset($_POST['submit'])) {
        $user_id = $_SESSION['user_id'];
        $org_id = $_SESSION['org_id'];
        $type = $_POST['type'];
        $item_id = $_POST['item_id'];
        $description = $_POST['description'];
        $amount = $_POST['amount'];
        $date = $_POST['date'];


        $sql = "INSERT INTO `maintenance` (`org_id`, `user_id`, `item_id`, `type`, `description`, `amount`, `date`) VALUES (:org_id, :user_id, :item_id, :type, :description, :amount, :date)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':item_id', $item_id, PDO::PARAM_STR);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->execute();
        $msg = "Maintenance Updated";

        header('location:maintenancelist.php');
    }
}
?>