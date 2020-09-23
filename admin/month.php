<?php
	include('includes/config.php');
?>

<html>
<head>
<title>Monthly Sales</title>

</head>
<body>
<center>
<h2>Monthly Sales (<?php echo date("d-m-Y") ?>)</h2>


<?php

		
try
{											
	//select data from db
	$stmt = $dbh->prepare("SELECT transaction, salename, date, productname, description, price,
								quantity, discount, totalamount, totalquantity, method,
										  customername, phone, type
										  FROM productsale 
										  WHERE MONTH(date)=MONTH(CURDATE())");
	
	//execute the sql query
	$stmt->execute();
	
	echo "
	<div class='table-responsive'>
		<table class='table table-bordered table-hover table-striped'>
		<tr>
		<th>No.</th>
		<th>transaction</th>
		<th>salename</th>
		<th>DATE</th>
		<th>productname</th>
		<th>description</th>
		<th>price</th>
		<th>quantity</th>
		<th>discount</th>
		<th>totalamount</th>
		<th>totalquantity</th>
		<th>method</th>
		<th>customername</th>
		<th>phone</th>
		<th>type</th>
		</tr>
	
	";
	
	$i=0;	
	//use php function fetch() to get the db column data
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
        //use the fetched data to store into variable
		$transaction = $row['transaction'];
		$salename = $row['salename'];
		$date = $row['date'];
		$productname = $row['productname'];
		$description = $row['description'];
		$price = $row['price'];
		$quantity = $row['quantity'];
		$discount = $row['discount'];
		$totalamount = $row['totalamount'];
		$totalquantity = $row['totalquantity'];
		$method = $row['method'];
		$customername = $row['customername'];
		$phone = $row['phone'];
		$type = $row['type'];
		
		$no = $i+1;
		
		echo " 
		
		<tr>
		<td>$no</td>
		<td>$transaction</td>
		<td>$salename</td>
		<td>$date</td>
		<td>$productname</td>
		<td>$description</td>
		<td>$price</td>
		<td>$quantity</td>
		<td>$discount</td>
		<td>$totalamount</td>
		<td>$totalquantity</td>
		<td>$method</td>
		<td>$customername</td>
		<td>$phone</td>
		<td>$type</td>
		</tr>	
	
		";
		
		$i++;
	}
	
	$totaly = $dbh->prepare("SELECT SUM(quantity) AS totquantity, 
											SUM(discount) AS totaldiscount, 
											SUM(totalamount) AS sumtotalamount,
											SUM(totalquantity) AS sumtotalquantity
											FROM productsale 
											WHERE MONTH(date)=MONTH(CURDATE())");
	
											$totaly->execute();
											
											$resultly = $totaly->fetch(PDO::FETCH_ASSOC);
											$totquantity = $resultly['totquantity'];
											$totaldiscount = $resultly['totaldiscount'];
											$sumtotalamount = $resultly['sumtotalamount'];
                                            $sumtotalquantity = $resultly['sumtotalquantity'];
											
											echo "
												<tr>
												<td  colspan='6'></td>
												<th>Total</th>
												<th>$totquantity</th>
												<th>$totaldiscount</th>
												<th>$sumtotalamount</th>
												<th>$sumtotalquantity</th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												</tr>
												
												</table>
												</div>

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