<?php
	include ("cek.php");
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="jquery/jquery-1.11.2.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>

	<style type="text/css">

		/*to make the background image responsive and cover the page*/
		body{
			background-size: cover;
		}
	</style>

	<title>About Page</title>

</head>
<body background="img/del.jpg">
	<!-- navigation bar -->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">Del Laboratory</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Home</a></li>
			<li><a href="search_ruangan.php">Daftar Ruangan</a></li>
			<li><a href="search_alat.php">Daftar Alat</a></li>
	        <li class="active"><a href="">About</a></li>

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
		<!-- body text -->
		<div class="jumbotron" style="background: white">
	
			<h1 class="page-header">About Us</h1>
			<p>Del Lab adalah sistem informasi Laboratorium yang terintegrasi, meliputi katalog ruangan laboratorium dan alat secara online dan inventori laboratorium 
			milik Institut Teknologi Del. Salah satu tujuan didirikannya Del Lab adalah untuk memenuhi kebutuhan akademis para civitas akademika IT Del
			berupa daftar ruangan dan alat yang diperlukan guna menunjang studi mereka di kampus IT Del.</p>
			
			<div class="well blockquote" >
			<p><b>Alamat kami:</b>
			<br>Laboratorium Institut Teknologi Del
			<br>Jl. P.I. Del, Sitoluama, Laguboti, Kabupaten Toba Samosir, Sumatera Utara
			<br>Kode Pos: 22381
			<br>Telp : +62 632 331234
			<br>Faks : +62 632 331116
			<br>e-mail : info@del.ac.id</p>
			<br>
			</div>
			<div class="alert alert-warning">
			<p><strong>DISCLAIMER : </strong></p>
			<p>Aplikasi web ini <strong>bukan situs sebenarnya</strong>. Aplikasi ini dibuat oleh mahasiswa Jurusan Sistem Informasi FITE IT Del untuk memenuhi 
			tugas mata kuliah Pengembangan dan Pengujian Aplikasi Web  tahun 2019.</p>
			</div>
	
		</div>
	</div>
</body>
</html>