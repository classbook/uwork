<?php 
	include "./partials/init.php";
	unset($_SESSION["user_logged"]);
	$_SESSION["login_message"] = "You've successfully logged out. Login to continue again.";
	header("location:login.php");
	die();
?>
