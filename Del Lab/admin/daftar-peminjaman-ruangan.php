<?php
	include "cekAdmin.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../jquery/jquery-1.11.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>

	<title>Admin - List Peminjaman</title>
</head>
<body>
<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar- header">
	      <a class="navbar-brand" href="index.php">Del Lab Admin</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Home</a></li>
	        <li class="dropdown active">
	          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Peminjaman Ruangan<span class="caret"></span></a>
	          <ul class="dropdown-menu">
			  <li><a href="tambah-peminjaman-ruangan.php">Pinjam - Kembali</a></li>
	            <li class="active"><a href="daftar-peminjaman-ruangan.php">Daftar Peminjaman</a></li>  
	          </ul>
			  <li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Peminjaman Alat<span class="caret"></span></a>
	          <ul class="dropdown-menu">
			  <li><a href="tambah-peminjaman-alat.php">Pinjam - Kembali</a></li>
	            <li><a href="daftar-peminjaman-alat.php">Daftar Peminjaman</a></li>  
	          </ul>
	        </li>
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
			<h1>Daftar Peminjaman Ruangan</h1>
			<div class="well well-sm">
				<p>Petunjuk</p>
				<p>1. Klik pencarian dan masukkan keyword untuk mencari</p>
				<p>2. Klik edit untuk mengedit</p>
				<p>3. Klik hapus untuk menghapus</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="well well-lg" style="background: white">
		</div>
		<div class="well well-lg" style="background: white">
			<table class="table table-hover table-bordered">
				<tr>
					<th>No.</th>
					<th>ID Peminjaman Ruangan</th>
					<th>ID peminjam</th>
					<th>Nama peminjam</th>
					<th>Nama ruangan</th>
					<th>ID Ruangan</th>
					<th>Tanggal pemakaian</th>
					<th>Tanggal harus kembali</th>
					<th>Tanggal kembali</th>
				</tr>

<?php
	//create query to select all attributes from the three tables using foreign key 
	$sql = "SELECT * FROM ruangan r, peminjam p, details_peminjaman_ruangan x WHERE r.id_ruangan = x.id_ruangan AND p.id_peminjam = x.id_peminjam";
	$result = mysqli_query($connection, $sql);
	
	if(!$result){
		die("No result found");
	}else{
		$count=mysqli_num_rows($result);	
	}

	if($count>0){
		$number = 1;	
		
		echo "<p>$count data ditampilkan.<p>";
		
		while($row = mysqli_fetch_assoc($result)) {
			$id = $row["id_peminjaman_ruangan"];
			if(!isset($row["kembali"])){
				//if row kembali is empty, set status to 'belum kembali'
				$status = "belum kembali";
	        }else{
	        	//if row kembali already has value, set status to row kembali value
	        	$status = ($row["kembali"]);
	        }
			echo "<tr> <td>" . $number. "</td><td> ". 
			$row["id_peminjaman_ruangan"]."</td><td>".
	        $row["id_peminjam"]."</td><td>".
			$row["nama_peminjam"]."</td><td>".
			$row["nama_ruangan"]."</td><td>".
	        $row["id_ruangan"]."</td><td>".
	        $row["tanggal_pemakaian"]."</td><td>".
	        $row["tanggal_selesai"]."</td><td>".
	        $status."</td></tr>";
	        
	   
	        $number++;
	    }
	}
?>
	
			</table>
		</div>
	</div>
</body>
</html>


