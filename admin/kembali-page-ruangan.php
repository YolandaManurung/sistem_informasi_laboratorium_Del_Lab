<?php
	include 'cekAdmin.php';

	$id= $_GET['id'];
	//get today's date
	$today = date('Y-m-d');

	//write a query to update that the book is returned
	$sql = "UPDATE details_peminjaman_ruangan SET tanggal_kembali='$today' WHERE id_peminjaman_ruangan='$id'";

	$result = mysqli_query($connection, $sql);

	if($result){
		$returnSuccess=true;
	}else{
		$returnSuccess=false;
	}

	//write a query to show all in the table based on the id
	$sql ="SELECT * FROM ruangan r, peminjam p, details_peminjaman_ruangan x WHERE r.id_ruangan = x.id_ruangan AND p.id_peminjam = x.id_peminjam AND x.id_peminjaman_ruangan =  '$id'";

	$result = mysqli_query($connection, $sql);

	if(!$result){
		die("An error has occured");
	}

	$count = mysqli_num_rows($result);
	if($count==1){
		while($row = mysqli_fetch_assoc($result)) {
			$nama_ruangan = $row["nama_ruangan"];    
			$tgl_pemakaian = $row["tanggal_pemakaian"];
			$tgl_selesai = $row["tanggal_selesai"];
			$tgl_kembali = $row["tanggal_kembali"];
		}
	}

	$tgl1 = $tanggal_pemakaian;
	$tgl2 = $tanggal_selesai;
	$tgl3 = $tanggal_kembali;
	//code modified from http://stackoverflow.com/questions/2040560/finding-the-number-of-days-between-two-dates
	$tanggal_kembali = strtotime($tanggal_pemakaian);
    $tanggal_kembali = strtotime($tanggal_kembali);
    $datediff = $tanggal_kembali-$tanggal_kembali;
    $datediff = $datediff/(60*60*24);   
    if($datediff>=0){
    	//means the book is returned on time
    	$late = false;
    }else{
    	//menas the book is returned late
    	//we have to calculate the fine
    	//fine is number of days x 500
    	$late = true;
    	$datediff=abs($datediff);
    	$denda = $datediff*500;
    }
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../jquery/jquery-1.11.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<title>Notifikasi pengembalian</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">Del Lab Admin</a>
	    </div>
	    <div>
	       	<ul class="nav navbar-nav navbar-right">
        		<li><a href="tambah-peminjaman-ruangan.php">Back</a>
        		</li>
        	</ul>	    	
	    </div>
	  </div>
	</nav>

	<div class="container">
		<div class="well well-lg">
			<?php
			if($returnSuccess){
				echo "<div class='alert alert-success'><p><strong>Ruangan berhasil dikembalikan!</strong></p>".
				"<p>Ruangan <i>$nama_ruangan</i> dipinjam tanggal $tgl1 dan harus dikembalikan tanggal $tgl2.</p></div>";
				if($late){
					echo "<div class='alert alert-warning'><p>Pengembalian dilakukan tanggal $tgl3 sehingga terlambat $datediff hari.</p>".
					"<p><strong>Denda sebesar Rp $denda.</strong></p></div>";	
				}else{
					echo "<div class='alert alert-info'>Buku dikembalikan tepat waktu.</div>";
				}
				

			}else{
				echo "<p class='text-warning'>Ruangan gagal dikembalikan.</p>";
			}
			

			?>
			<a href="tambah-peminjaman-ruangan.php" class="btn btn-info">Back</a>
		</div>
	</div>

</body>
</html>
