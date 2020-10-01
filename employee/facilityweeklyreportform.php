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

        $user_id = $_SESSION['id'];
        $org_id = $_SESSION['org_id'];
        $week = $_POST['week'];
        $hours = $_POST['hours'];
        $name = $_POST['name'];
        $activity = $_POST['activity'];
        $activity_status = $_POST['activity_status'];
        $field_status = $_POST['field_status'];
        $manager = $_SESSION['id'];
        $type = "facility";



        $sql = "INSERT INTO `weeklyreport`(`user_id`, `org_id`, `week`, `name`, `hours`, `activity`, `activity_status`, `field_status`, `manager`, `type`) VALUES 
        (:user_id, :org_id, :week, :name, :hours, :activity, :activity_status, :field_status, :manager, :type)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':org_id', $org_id, PDO::PARAM_STR);
        $query->bindParam(':week', $week, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':hours', $hours, PDO::PARAM_STR);
        $query->bindParam(':activity', $activity, PDO::PARAM_STR);
        $query->bindParam(':activity_status', $activity_status, PDO::PARAM_STR);
        $query->bindParam(':field_status', $field_status, PDO::PARAM_STR);
        $query->bindParam(':manager', $manager, PDO::PARAM_STR);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $bind = $query->execute();
        echo var_dump($bind);
        header('location:facilityweeklyreport.php');
    }
}
