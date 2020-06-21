<?php
	require "cekAdmin.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../jquery/jquery-1.11.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<title>Admin - Tambah Ruangan</title>
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
			<li class="dropdown">
	       		<a class="dropdown-toggle" data-toggle="dropdown" href="#">Anggota<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="tambah-anggota.php">Tambah Anggota</a></li>
	            <li><a href="daftar-anggota.php">Daftar Anggota</a></li>  
	          </ul>
	        </li> 
	        <li class="dropdown active">
	        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Ruangan<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li class="active"><a href="tambah-ruangan.php">Tambah Ruangan</a></li>
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
			<h3>Tambah Ruangan</h3>
			<h5 class="text-info">Petunjuk : Silahkan isi data dengan lengkap dan benar.</h5>
			<form role="form" form-horizontal" method="POST">


				<div class="form-group">
					<label for="id_ruangan">ID Ruangan: </label><br>
					<input type="text" maxlength="20" name="id_ruangan" placeholder="ID Ruangan" class="form-control" id="id_ruangan" required>
				</div>
			  	<div class="form-group">
					<label for="nama_ruangan">Nama ruangan :</label><br>
					<input type="text" maxlength="60" name="nama_ruangan" placeholder="Nama Ruangan" class="form-control" id="nama_ruangan" required>
				</div>

				<div class="form-group">
					<label for="status">Status :</label><br>
					<input type="text" maxlength="20" name="status" placeholder="Status Ruangan" class="form-control" id="status" required>
				</div>

				<div class="form-group">
					<label for="fasilitas">Fasilitas :</label><br>
					<input type="text" maxlength="100" name="fasilitas" placeholder="Fasilitas ruangan" class="form-control" id="fasilitas" required>
				</div>

			<input type="submit" class="btn btn-success" value="Submit" name="insertRuangan">
			
			</form>

		</div>
		
<?php
	//first check if post insertRuangan has value
	if(isset($_POST['insertRuangan'])){
		//if it is, then proceed to the following

		$id_ruangan = $_POST['id_ruangan'];
		$nama_ruangan = $_POST['nama_ruangan'];
		$status = $_POST['status'];
		$fasilitas = $_POST['fasilitas'];

		//insert the following data to database

		$sql = "INSERT INTO ruangan (id_ruangan, nama_ruangan, status, fasilitas) VALUES ('$id_ruangan', '$nama_ruangan', '$status', '$fasilitas')";
		$result = mysqli_query($connection, $sql); 
		
		if($result){
			//if inserting data succeeds, show notification in modal box
?>
<script type="text/javascript">
	var notif = document.getElementById("notif");

	var show = "<div class='alert alert-success'><p><strong>Sukses!</strong> Data berhasil masuk.</p>";
	show+="<p><a href='daftar-ruangan.php' class='btn btn-success'> Lihat semua ruangan.</a></p></div>";
	notif.innerHTML = show;
</script>
		
<?php
		}else{
		//if inserting data fails, show error notification	
?>

<script type="text/javascript">
	var notif = document.getElementById("notif");
	var show = "<div class='alert alert-warning'><p><strong>Gagal!</strong> Terjadi kesalahan. Data tidak berhasil masuk.</p>";
	show+="<a href='daftar-ruangan.php'>Lihat semua ruangan.</a>";
	notif.innerHTML = show;
</script>
	</div>
</body>
</html>

<?php
		}
	}
?>
