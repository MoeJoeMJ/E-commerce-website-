<?php
	include("dbcon.php");
	$cartid = $_GET['CartID'];
	$deliverdate = date("d-m-Y");
	$query = "insert into tabdeliver (cartid, deliverdate) values ('$cartid','$deliverdate')";
	mysql_query($query, $con);
	if (mysql_affected_rows($con) > 0)
	{
		header("Location: sold.php");
	}
?>