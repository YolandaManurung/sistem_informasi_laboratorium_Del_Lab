<?php
	session_start();
	session_unset();
	session_destroy();
	//go to index page in upper directory  
	header("Location: ../index.php");
?>