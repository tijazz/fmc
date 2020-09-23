<?php
	include('includes/config.php');
?>

<html>
<head>
<title>Fixed Assets</title>

</head>
<body>
<center>
<h2>Fixed Assets (<?php echo date("d-m-Y") ?>)</h2>


<?php

		
try
{	//select data from db
	$stmt = $dbh->prepare("SELECT SUM(amount) as amount, created_at FROM income WHERE type_asset='fixed'");
	
	//execute the sql query
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$amount = $row['amount'];
	$created_at = $row['created_at'];
	
	echo "		
		 <div class='table-responsive'>
		<table class='table table-bordered table-hover table-striped'>
		<tr><th></th><th>Amount</th><th>Date</th><th>Add Parametr</th></tr>
		<tr><th>Long-term investment</th><th>$amount</th><th>$created_at</th><th></th></tr>
		<tr><th>Properties, plant and equipment </th><th></th><th></th><th></th></tr>
		<tr><th>Intangible assets(e.g goodwill)</th><th></th><th></th><th></th></tr>
		<tr><th>Add Parametr</th><th></th><th></th><th></th></tr>
	";
	
}	
catch (PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}

//close conection
$dbh = null;


?>

</form>
</center>
</body>
</html>