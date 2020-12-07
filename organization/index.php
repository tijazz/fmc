<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT * FROM organization WHERE username=:email or email=:altEmail  and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':altEmail', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
$_SESSION['org_id']=$results[0]->id;
$_SESSION['org_name']=$results[0]->organization;
$_SESSION['user_id'] = 0;
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" href="../public/css/login.css">

</head>

<body>
	<div class="login-page bk-img">
		<div class="form-content">
			<h1 class="org-text text-center text-bold mt-" style="color:#fff">Organization Login</h1>
			<div class="well row pt-2x pb-3x bk-light">
				<div class=form_holder">
					<form method="post">
						<label for="" class="text-uppercase text-sm">Your Username </label>
						<input type="text" placeholder="Username" name="username" class="form-control mb" required>
						<label for="" class="text-uppercase text-sm">Password</label>
						<input type="password" placeholder="Password" name="password" class="form-control mb" required>
						<div class="cover-tn">
							<button name="login" type="submit">LOGIN</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
</body>

</html>
