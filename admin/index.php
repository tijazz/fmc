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
					<form action="sign.php" method="post">
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
