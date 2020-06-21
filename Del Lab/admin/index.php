<?php
	require ("cekAdmin.php");
?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../jquery/jquery-1.11.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<title>Admin - Homepage</title>

</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Del Lab Admin</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Home</a></li>
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
	        <li class="dropdown">
	       		<a class="dropdown-toggle" data-toggle="dropdown" href="#">Anggota<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="tambah-anggota.php">Tambah Anggota</a></li>
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
		<div class="well well-lg">
		<div class="jumbotron">
			<?php
				echo "<h2>Hello, ".$_SESSION["nama"]."!</h2>";
				echo "<p>Anda memiliki hak akses admin ke database laboratorium ini.</p>";
			?>
			
			
		</div>
		<div class="well well-md">
			<h4>Petunjuk penggunaan aplikasi:</h4>
			<p>1. Pilih "Peminjaman -> Pinjam - Kembali" untuk melakukan input peminjaman dan pengembalian ruangan.</p>
			<p>2. Pilih "Peminjaman -> Daftar Peminjaman" untuk melihat daftar peminjaman dan pengembalian ruangan.</p>
			<p>3. Pilih "Anggota -> Tambah Anggota" untuk melakukan input anggota baru.</p>
			<p>4. Pilih "Anggota -> Daftar Anggota" untuk melihat daftar anggota.</p>
			<p>5. Pilih "Ruangan -> Tambah Ruangan" untuk melakukan input Ruangan baru.</p>
			<p>6. Pilih "Ruangan -> Daftar Ruangan" untuk melihat daftar Ruangan.</p>
			<p>7. Pilih "Alat -> Tambah Alat" untuk melakukan input Alat baru.</p>
			<p>8. Pilih "Alat -> Daftar Alat" untuk melihat daftar Alat.</p>
			<p>7. Pilih "Logout" untuk keluar dari sesi aplikasi.</p>
			
		</div>
		<a href="logout.php"><button class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-log-out"></span> Logout</button></a>
		</div>
	</div>

</body>
</html>