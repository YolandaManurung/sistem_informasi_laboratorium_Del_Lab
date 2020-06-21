
<?php
	include ("cek.php");
?>

<!DOCTYPE html>
<html>
<head>
	
	

	<title>Laboratory - Homepage</title>
	
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
	        <li class="active"><a href="">Home</a></li>
			<li><a href="search_ruangan.php">Daftar Ruangan</a></li>
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
		<!-- body text -->
		<div class="jumbotron">
			<img src="img/download.png" height="100px" >
			<h1 class="page-header">WELCOME to Del Lab</h1>
			<p>Del Lab atau <strong>Del Laboratory</strong> adalah layanan Laboratorium pusat Institut Teknologi Del
			yang ditujukan untuk melayani civitas akademika IT Del.</p>
			<p>Untuk melakukan registrasi keanggotaan dan peminjaman serta pengembalian ruangan dan alat, kunjungi laboratorium pada 
			hari kerja. Pencarian ruangan dan alat dapat dilakukan di bawah ini.</p>
		</div>

		<!-- form pencarian ruangan -->
		<div class="well well-lg text-center">
			<h2 class="text-info">Pencarian Ruangan</h2>

			<form role="form" action="search_ruangan.php" class="form-horizontal" method="GET">
				
				<select name="category">
					<option value="id_ruangan">ID Ruangan</option>
					<option value="nama_ruangan">Nama Ruangan</option>
					<option value="status">Status</option>
					<option value="fasilitas">Fasilititas</option>

				</select>

				<input type="text" placeholder="Masukkan kata kunci" name="keyword" required>
				<input type="submit" name="search" value="cari" class="btn btn-info">
					
			</form>
			
		</div>

		<div class="well well-lg text-center">
			<h2 class="text-info">Pencarian Alat</h2>

			<form role="form" action="search_alat.php" class="form-horizontal" method="GET">
				
				<select name="category">
					<option value="kode">Kode Alat</option>
					<option value="nama_alat">Nama Alat</option>
					<option value="jumlah">Jumlah Alat</option>
					<option value="nomor_rak">Nomor Rak</option>
					<option value="status">Status</option>
				</select>

				<input type="text" placeholder="Masukkan kata kunci" name="keyword2" required>
				<input type="submit" name="search" value="cari" class="btn btn-info">
					
			</form>


	</div>
</body>
</html>
