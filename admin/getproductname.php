<?php
	include("dbcon.php");
	$query_productdetails = "select productname, productprice from tabproducts where productcode='$productcode'";
	$result_productdetails = mysql_query($query_productdetails, $con);
	$record_productdetails = mysql_fetch_array($result_productdetails);
	$productname = $record_productdetails[0];
	$productprice = $record_productdetails[1];
?>