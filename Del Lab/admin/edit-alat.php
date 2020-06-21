<?php
	require "cekAdmin.php";

	$id = $_GET['kode'];

	$sql = "SELECT * FROM alat WHERE kode = '$id'";
	
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
	<title>Admin - Edit Alat</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">Del Lab Admin</a>
	    </div>
	    <div>
	       	<ul class="nav navbar-nav navbar-right">
        		<li><a href="daftar-alat.php">Back</a>
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
			<h3>Edit Alat</h3>
			<h5 class="text-info">Petunjuk : Silahkan isi data dengan lengkap dan benar.</h5>
			<form role="form" class="form-horizontal" method="POST">

			  	<div class="form-group">
					<label for="nama_alat">Nama Alat :</label><br>
					<input type="text" maxlength="100" name="nama_alat" placeholder="Nama Alat" class="form-control" id="nama_alat" value="<?php echo $row['nama_alat']; ?>" required>
				</div>
				
				<div class="form-group">
					<label for="jumlah">Jumlah :</label><br>
					<input type="text" maxlength="100" name="jumlah" placeholder="Jumlah Alat" class="form-control" id="jumlah" value="<?php echo $row['jumlah']; ?>">
				</div>

                <div class="form-group">
					<label for="nomor_rak">Nomor Rak :</label><br>
					<input type="text" maxlength="100" name="nomor_rak" placeholder="Nomor Rak" class="form-control" id="nomor_rak" value="<?php echo $row['nomor_rak']; ?>">
				</div>


                <div class="form-group">
					<label for="status">Status :</label><br>
					<input type="text" maxlength="50" name="status" placeholder="Status alat (available/not available)" class="form-control" id="status" value="<?php echo $row['status']; ?>" required>
				</div>
				
<?php
				}
	}

?>			
				<input type="submit" class="btn btn-success" value="Submit" name="editAlat">
				<a role="button" class="btn btn-default" id="resetButton" href="daftar-alat.php">Batalkan</a>

			</form>
		</div>
	</div>

</body>
</html>

<?php

	if(isset($_POST['editAlat'])){
		//if it is, then proceed to the following

		$nama_alat = $_POST['nama_alat'];
        $kode = $_POST['kode'];
        $jumlah = $_POST['jumlah'];
        $nomor_rak = $_POST['nomor_rak'];
		$status = $_POST['status'];

		//update data to database
		$sql = "UPDATE alat SET nama_alat='$nama_alat', jumlah ='$jumlah', nomor_rak = '$nomor_rak', status='$status' WHERE kode='$id' ";

		try{
			$result = mysqli_query($connection, $sql);	
		}catch(Exception $errorMessage){
			echo "Error :".$errorMessage;
		}
		

		if($result){
			echo "<script> alert('Data berhasil dimasukkan.');</script>";
			header("Location: daftar-alat.php");
		}else{
			echo "<script>alert('Data gagal dimasukkan. Silahkan cek kembali.');</script>";
		}
	}
?>