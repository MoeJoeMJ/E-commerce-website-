<?php
	session_start();
	unset($_SESSION['usertype']);
	unset($_SESSION['userid']);
	header('Location: ../index.php');
?>