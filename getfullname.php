<?php
	include("dbcon.php");
	$query_getname = "select firstname, lastname from tabusers where emailid='" . $_SESSION['emailid'] . "'";
	$result_getname = mysql_query($query_getname, $con);
	$record_getname = mysql_fetch_array($result_getname);
	
	$firstname = $record_getname[0];
	//$lastname = $record_getname[1];
	
	$fullname = $firstname;
?>