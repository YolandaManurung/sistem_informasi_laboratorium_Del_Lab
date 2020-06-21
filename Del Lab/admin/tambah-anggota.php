<?php
	require "cekAdmin.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../jquery/jquery-1.11.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<title>Admin - Tambah Anggota</title>
</head>
<body>

	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">Del Lab Admin</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Home</a></li>
	        <li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Peminjaman Ruangan<span class="caret"></span></a>
	          <ul class="dropdown-menu">
			  <li><a href="tambah-peminjaman-ruangan.php">Pinjam - Kembali</a></li>
	            <li><a href="daftar-peminjaman-ruangan.php">Daftar Peminjaman</a></li>  
	          </ul>
	        </li>
			<li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Peminjaman Alat<span class="caret"></span></a>
	          <ul class="dropdown-menu">
			  <li><a href="tambah-peminjaman-alat.php">Pinjam - Kembali</a></li>
	            <li><a href="daftar-peminjaman-alat.php">Daftar Peminjaman</a></li>  
	          </ul>
	        </li>
	        <li class="dropdown active">
	       		<a class="dropdown-toggle" data-toggle="dropdown" href="#">Anggota<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li class="active"><a href="tambah-anggota.php">Tambah Anggota</a></li>
	            <li><a href="daftar-anggota.php">Daftar Anggota</a></li>  
	          </ul>
	        </li> 
	        <li class="dropdown">
	        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Ruangan<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="tambah-ruangan.php">Tambah Ruangan</a></li>
	            <li><a href="daftar-ruangan.php">Daftar Ruangan</a></li> 
	          </ul>
	        </li> 
			<li class="dropdown">
	        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Alat<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="tambah-alat.php">Tambah Alat</a></li>
	            <li><a href="daftar-alat.php">Daftar Alat</a></li> 
	          </ul>
	        </li> 
	      </ul>
	    	<ul class="nav navbar-nav navbar-right">
        		<li class="dropdown">
        			<a class="dropdown-toggle" data-toggle="dropdown">
        				<span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["username"]; ?> <span class="caret"></span>
        			</a> 
        			<ul class="dropdown-menu">
        				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
        			</ul>
        		</li>
        	</ul>	    	
	    </div>
	  </div>
	</nav>

	<div class="container">
		<div class="well well-md" id="notif">
			<!-- Message is show here -->
		</div>

		<div class="well well-lg">
			<h3>Tambah Anggota</h3>
			<h5 class="text-info">Petunjuk : Silahkan isi data dengan lengkap dan benar.</h5>

			<form role="form" action="insert-anggota.php" class="form-horizontal" method="POST">

			<div class="form-group">
					<label for="id_peminjam">ID Peminjam :</label><br>
					<input type="text" maxlength="20" name="id_1" placeholder="ID Peminjam" class="form-control" id="id_peminjam" required>
				</div>

			<div class="form-group">
					<label for="nama_peminjam">Nama lengkap :</label><br>
					<input type="text" maxlength="60" name="id_2" placeholder="Nama lengkap" class="form-control" id="nama_peminjam" required>
				</div>

			<div class="form-group">
					<label for="jenis_kelamin">Jenis kelamin :</label><br>
					<select name="id_3">
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>

				
			<button class="btn btn-success">Submit</submit>
			
			</form>

	</div>
</body>
	
	<!-- <div class="well well-lg">
		<table class="table table-hover table-bordered">
	<tr>
	<th>No.</th>
	<th>ID Peminjam</th>
	<th>Nama Peminjam</th>
	<th>Jenis Kelamin</th>
	</tr>

	</div>
	</table> -->




