<?php
	include("dbcon.php");
	$query_getemailid = "select emailid from tabusers where emailid='" . $_SESSION['emailid'] . "'";
	$result_getemailid = mysql_query($query_getemailid, $con);
	$record_getemailid = mysql_fetch_array($result_getemailid);
	
	$emailid = $record_getemailid[0];
?>