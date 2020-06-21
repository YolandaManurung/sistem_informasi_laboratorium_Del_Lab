<?php
	require "cekAdmin.php";

	$id = $_GET['id'];

	$sql = "SELECT * FROM ruangan WHERE id_ruangan = '$id'";
	
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
			<h3>Edit Ruangan</h3>
			<h5 class="text-info">Petunjuk : Silahkan isi data dengan lengkap dan benar.</h5>
			<form role="form" class="form-horizontal" method="POST">

			  	<div class="form-group">
					<label for="nama_ruangan">Nama ruangan :</label><br>
					<input type="text" maxlength="100" name="nama_ruangan" placeholder="Nama Ruangan" class="form-control" id="nama_ruangan" value="<?php echo $row['nama_ruangan']; ?>" required>
				</div>
				
				
				

				<div class="form-group">
					<label for="status">Status :</label><br>
					<input type="text" maxlength="50" name="status" placeholder="Status ruangan (available/not available)" class="form-control" id="status" value="<?php echo $row['status']; ?>" required>
				</div>

				
				<div class="form-group">
					<label for="fasilitas">Fasilitas ruangan :</label><br>
					<input type="text" maxlength="100" name="fasilitas" placeholder="Fasilitas ruangan" class="form-control" id="fasilitas" value="<?php echo $row['fasilitas']; ?>">
				</div>
				
<?php
				}
	}

?>			
				<input type="submit" class="btn btn-success" value="Submit" name="editRuangan">
				<a role="button" class="btn btn-default" id="resetButton" href="daftar-ruangan.php">Batalkan</a>

			</form>
		</div>
	</div>

</body>
</html>

<?php

	if(isset($_POST['editRuangan'])){
		//if it is, then proceed to the following

		$nama_ruangan = $_POST['nama_ruangan'];
		$id_ruangan = $_POST['id_ruangan'];
		$status = $_POST['status'];
		$fasilitas = $_POST['fasilitas'];

		//update data to database
		$sql = "UPDATE ruangan SET nama_ruangan='$nama_ruangan', status='$status', fasilitas='$fasilitas' WHERE id_ruangan='$id' ";

		try{
			$result = mysqli_query($connection, $sql);	
		}catch(Exception $errorMessage){
			echo "Error :".$errorMessage;
		}
		

		if($result){
			echo "<script> alert('Data berhasil dimasukkan.');</script>";
			header("Location: daftar-ruangan.php");
		}else{
			echo "<script>alert('Data gagal dimasukkan. Silahkan cek kembali.');</script>";
		}
	}
?>