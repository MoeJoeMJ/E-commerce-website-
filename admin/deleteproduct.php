<?php
	include('dbcon.php');
	
	$ProductID = $_GET['ProductID'];
	$query = "delete from tabproducts where productcode='$ProductID'";
	mysql_query($query, $con);
	
	header('Location: products.php');
	
?>