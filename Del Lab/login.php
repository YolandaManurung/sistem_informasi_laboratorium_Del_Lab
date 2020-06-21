<?php
	require 'config/connection.php';
	session_start();

	$username = $_POST['fUsername'];
	$password = $_POST['fPassword'];

	$sql = "SELECT * FROM pegawai WHERE username='$username' AND password='$password'";
	$result = mysqli_query($connection, $sql); 
	
	$count=mysqli_num_rows($result);

	if($count==1){
		
		$row = mysqli_fetch_assoc($result);
		$_SESSION["login"] = TRUE;
		$_SESSION["id_pegawai"] = $row['id_pegawai'];
		$_SESSION["nama"] = $row['nama'];
		$_SESSION["username"] = $row['username'];
		$_SESSION["jenis_kelamin"] = $row['jenis_kelamin'];
		//login success
		//navigate to admin page
		header("Location: admin/index.php");
	}else{
		//either the username or password is wrong
		//navigate back to index
		$_SESSION["error"]="found";
		header("location: login-page.php");
	}
?>