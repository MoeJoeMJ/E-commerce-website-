<?php
	if (!isset($_SESSION['userid']))
	{
		header('Location:../adminlogin.php');
	}
	else
	{
		if (!$_SESSION['usertype'] == "admin")
		{
			header('Location:../adminlogin.php');
		}
	}
?>