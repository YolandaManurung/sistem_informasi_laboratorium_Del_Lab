<?php
	require "cekAdmin.php";

	$id = $_GET['id'];

	$sql = "SELECT * FROM peminjam WHERE id_peminjam = '$id'";
	
	$result = mysqli_query($connection, $sql); 
	$count=mysqli_num_rows($result);

	if($count==1){
		while($row = mysqli_fetch_assoc($result)){

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../jquery/jquery-1.11.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<title>Admin - Edit Ruangan</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">Del Lab Admin</a>
	    </div>
	    <div>
	       	<ul class="nav navbar-nav navbar-right">
        		<li><a href="daftar-ruangan.php">Back</a>
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
			<h3>Edit Anggota</h3>
			<h5 class="text-info">Petunjuk : Silahkan isi data dengan lengkap dan benar.</h5>
			<form role="form" class="form-horizontal" method="POST">

			  	<div class="form-group">
					<label for="nama_peminjam">Nama peminjam :</label><br>
					<input type="text" maxlength="100" name="nama_peminjam" placeholder="Nama Peminjam" class="form-control" id="nama_peminjam" value="<?php echo $row['nama_peminjam']; ?>" required>
				</div>
				
				
				
<?php
				}
	}

?>			
				<input type="submit" class="btn btn-success" value="Submit" name="editAnggota">
				<a role="button" class="btn btn-default" id="resetButton" href="daftar-anggota.php">Batalkan</a>

			</form>
		</div>
	</div>

</body>
</html>

<?php

	if(isset($_POST['editAnggota'])){
		//if it is, then proceed to the following

		$nama_peminjam = $_POST['nama_peminjam'];
		$id_peminjam = $_POST['id_peminjam'];
		

		//update data to database
		$sql = "UPDATE peminjam SET nama_peminjam='$nama_peminjam' WHERE id_peminjam='$id' ";

		try{
			$result = mysqli_query($connection, $sql);	
		}catch(Exception $errorMessage){
			echo "Error :".$errorMessage;
		}
		

		if($result){
			echo "<script> alert('Data berhasil dimasukkan.');</script>";
			header("Location: daftar-anggota.php");
		}else{
			echo "<script>alert('Data gagal dimasukkan. Silahkan cek kembali.');</script>";
		}
	}
?>