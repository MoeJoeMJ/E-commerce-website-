<?php
	include('dbcon.php');
	
	$CategoryID = $_GET['CategoryID'];
	$query = "delete from tabcategories where categoryid='$CategoryID'";
	mysql_query($query, $con);
	
	header('Location: categories.php');
	
?>