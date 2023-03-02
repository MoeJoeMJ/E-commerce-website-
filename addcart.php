<?php
	session_start();
	$emailid = $_SESSION['emailid'];
	$productcode = $_GET['ProductID'];
	include("dbcon.php");
	include("getproductname.php");
	
	$query = "select * from tabcart where emailid='$emailid' and productcode='$productcode'";
	$result = mysql_query($query, $con);
	if (mysql_num_rows($result) == 0)
	{
		
		$query = "insert into tabcart (emailid, productcode, productname, price, quantity) values('$emailid','$productcode','$productname','$productprice','1')";
		mysql_query($query, $con);
	}
	else
	{
		$record = mysql_fetch_array($result);
		$existingquantity = $record[5];
		$newquantity = $existingquantity + 1;
		$query = "update tabcart set quantity='$newquantity' where productcode='$productcode'";
		mysql_query($query, $con);
	}
	header("Location: cart.php");
?>