<?php
	session_start();
	unset($_SESSION['emailid']);
	header("Location: index.php");
?>