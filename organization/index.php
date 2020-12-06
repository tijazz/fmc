<?php
session_start();
include('includes/config.php');


if (isset($_POST['login'])) {
	$email = $_POST['username'];
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM organization WHERE username=:email and password=:password";
	$query = $dbh->prepare($sql);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		$_SESSION['alogin'] = $_POST['username'];
		$_SESSION['org_id'] = $results[0]->id;
		$_SESSION['org_name'] = $results[0]->organization;
		$_SESSION['user_id'] = 0;
		$_SESSION['type'] = "organization";
		
		// echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
	} else {

		echo "<script>alert('Invalid Details');</script>";
		// header("location:../sign_in.php");
	}
} else {
	// header("location:../sign_in.php");
}
