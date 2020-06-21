<?php
	include "cek.php";

	//if category and keyword already have values (which means user accessed it through search box in index page
	//then proceed the following by showing ONLY what user requests	
	if(isset($_GET['category'])||isset($_GET['keyword'])){
		$category = $_GET['category'];
		$keyword = $_GET['keyword'];

		//search for data in table buku where category contains keyword
		$sql = "SELECT * FROM ruangan WHERE $category LIKE '%$keyword%'";
		$result = mysqli_query($connection, $sql); 
		
		$count=mysqli_num_rows($result);

	//if category and keyword are still null (which means user accessed it through navbar)
	//then proceed the following by showing all data stored in database		
	}else{
		$sql = "SELECT * FROM ruangan;";
		$result = mysqli_query($connection, $sql); 
		
		$count=mysqli_num_rows($result);	
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Del Lab - Pencarian</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="jquery/jquery-1.11.2.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>

	<style type="text/css">

		/*to make the background image responsive and cover the page*/
		body{
			background-size: cover;
		}
	</style>
</head>
<body background="img/lab.jpg">
<!-- navigation bar -->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">Del Laboratory</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Home</a></li>
            <li class="active"><a href="">Daftar Ruangan</a></li>
            <li><a href="search_alat.php">Daftar Alat</a></li>
	        <li><a href="about.php">About</a></li>

	      </ul>
		  <ul class="nav navbar-nav navbar-right">

			<a href="login-page.php">
				<button type="button" class="btn btn-primary btn-md">
				<span class="glyphicon glyphicon-log-in"></span> Login Admin
				</button>
			</a>
		  
	     </ul>
	    </div>
	  </div>
	</nav>

	<div class="container">
		<div class="well well-lg" style="background: white">
		<h1 class="page-header">Pencarian Ruangan</h1>
		<table class="table table-hover table-bordered">
			<tr>
				<th>No.</th>
				<th>ID</th>
				<th>Nama</th>
				<th>Status</th>
				<th>Fasilitas</th>

			</tr>


<?php

	if($count>0){
		$number = 1;	
		
		echo "<p class='text-info'>Ditemukan $count data cocok dengan keyword yang Anda masukkan<p>";
		
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr> <td>" . $number. "</td><td> " . 
	        $row["id_ruangan"]. "</td><td> " .
	        $row["nama_ruangan"]."</td><td>".
			$row["status"]."</td><td>".
			$row["fasilitas"]."</td><tr>";
			
			$number++;
		}
		
	}else{
		echo "Maaf, tidak ditemukan data yang cocok.";
		
	}
?>
			</table>
		</div>
	</div>
</body>
</html>
