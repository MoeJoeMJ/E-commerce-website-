<?php
	include('dbcon.php');
	
	$EntryID = $_GET['EntryID'];
	$query = "delete from tabcart where entryid='$EntryID'";
	mysql_query($query, $con);
	
	header('Location: cart.php');
	
?>