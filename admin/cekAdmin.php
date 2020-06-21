<?php
	session_start();
	//do the connection to database first
	require '../config/connection.php';
	//check if user is already logged in
	//if not, navigate to no access page
	if(!isset($_SESSION["nama"])){
		header("Location: noAccess.php");
	}

?>