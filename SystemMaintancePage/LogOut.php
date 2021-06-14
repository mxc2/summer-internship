<?php
	//Destroy session and log out person
	session_destroy();
	unset($_SESSION["userid"]);
	header("Location: index.php");
	exit();
?>