<?php  

	session_start();

	include("config.php");
	include("main-functions.php");

	CheckoutDisplay($database,$_SESSION['cust_id']);
?>