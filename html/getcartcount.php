<?php
	include("dbcon.php");
	$query_getcartcount = "select sum(quantity) from tabcart where emailid='" . $_SESSION['emailid'] . "'";
	$result_getcartcount = mysql_query($query_getcartcount, $con);
	$record_getcartcount = mysql_fetch_array($result_getcartcount);
	
	$cartcount = $record_getcartcount[0];
?>