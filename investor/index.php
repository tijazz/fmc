<?php
session_start();

include('includes/config.php');
if (isset($_POST['login'])) {
	$status = '1';
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM member WHERE email=:email and password=:password and status=(:status)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);
	$query->bindParam(':status', $status, PDO::PARAM_STR);
	$query->execute();
	//fetchall is used to fetch multiple rows in the database
	//	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$results = $query->fetch(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {

		$_SESSION['alogin'] = $_POST['email'];

		//		($_SESSION['staffID'] = $results->id);
		($_SESSION['name'] = $results->fullname);
		($_SESSION['email'] = $results->email);
		($_SESSION['category'] = $results->category);
		($_SESSION['unit_value'] = $results->unit_value);
		($_SESSION['roi'] = $results->roi);
		($_SESSION['phone'] = $results->phone);
		($_SESSION['unit'] = $results->unit);
		($_SESSION['images'] = $results->images);
		($_SESSION['timestamp'] = time());
		

		echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
	} else {

		echo "<script>alert('Invalid Details Or Account Not Confirmed');</script>";
		header("location:../sign_in.php");
	}
}else {
	header("location:../sign_in.php");
}
