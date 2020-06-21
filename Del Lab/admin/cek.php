<?php
	//check the connection to database
	include 'config/connection.php';
	if(!$connection){
		die("Maaf, gagal tersambung dengan database.");
	}

	session_start();
	//check to see if session id has value
	//if it is, then no need for login again, redirect it to admin folder
	if(isset($_SESSION["id"])){
		
		header("location:admin/");
	}
?>