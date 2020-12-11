<?php
session_start();
include('includes/config.php');
if (isset($_POST['login'])) {
	$email = $_POST['username'];
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM employee WHERE email=:email and password=:password";
	$query = $dbh->prepare($sql);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		$_SESSION['alogin'] = $_POST['username'];
		$_SESSION['name'] = $results[0]->name;
		$_SESSION['user_id'] = $results[0]->id;
		$_SESSION['supply'] = $results[0]->supply;
		$_SESSION['risk'] = $results[0]->risk;
		$_SESSION['inventory'] = $results[0]->inventory;
		$_SESSION['monitory'] = $results[0]->monitory;
		$_SESSION['financial'] = $results[0]->financial;
		$_SESSION['images'] = $results[0]->image;

		$sql = "SELECT * FROM organization WHERE id=:id";
		$query = $dbh->prepare($sql);
		$query->bindParam(':id', $results[0]->organization, PDO::PARAM_STR);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);

		if ($query->rowCount() > 0) {
			$_SESSION['org_name'] = $results[0]->organization;
			$_SESSION['org_id'] = $results[0]->id;
		}

		// echo $_SESSION['supply'];
		echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
	} else {

		echo "<script>alert('Invalid Details');</script>";
		header("location:../sign_in.php");
	}
} else {
	header("location:../sign_in.php");
}

?>
