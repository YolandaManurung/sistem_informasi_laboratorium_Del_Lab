<?php
	include 'cekAdmin.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../jquery/jquery-1.11.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<title>Notifikasi pembatalan anggota</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">Del Lab Admin</a>
	    </div>
	    <div>
	       	<ul class="nav navbar-nav navbar-right">
        		<li><a href="daftar-anggota.php">Back</a>
        		</li>
        	</ul>	    	
	    </div>
	  </div>
	</nav>


	<div class="container">
		<div class="well well-lg">
			<div class="alert alert-info">

<?php
	$id= $_GET['id'];

	$sql = "DELETE FROM pegawai WHERE id_pegawai = '$id'";
	$result = mysqli_query($connection, $sql); 
	if($result){
		echo "<p class='alert alert-success'>Alat berhasil dihapus!</p>";
	}else{
		echo "<p class='alert alert-warning'>Alat masih dipinjam dan tidak dapat dihapus.</p>";
	}

?>
			<a href="daftar-anggota.php" class="btn btn-info">Back</a>
		</div>
	</div>
</body>
</html>