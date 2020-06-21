<?php
	include "cekAdmin.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../jquery/jquery-1.11.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>

	<title>Admin - List Alat</title>
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
	        <li class="dropdown">
	        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Ruangan<span class="caret"></span></a>
	          <ul class="dropdown-menu">
              <li><a href="tambah-alat.php">Tambah Ruangan</a></li>
              <li><a href="daftar-a.php">Daftar Ruangan</a></ii>
			  
	          </ul>
	        </li> 
			<li class="dropdown active">
	       		<a class="dropdown-toggle" data-toggle="dropdown" href="#">Alat<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="tambah-alat.php">Tambah Alat</a></li>
	            <li class="active"><a href="daftar-alat.php">Daftar Alat</a></li> 
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
			<h1>List Alat</h1>
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

		<button type="button" id="search" class="btn btn-primary btn-block">Pencarian</button>

		<!-- form pencarian alat -->

			<div class="well well-lg" id="searchBox">
				<h2 class="text-center">Pencarian Alat</h2>
				<div class="text-center">
					<form role="form" method="GET">
						<select name="category">
							<option value="nama_alat">Nama Alat</option>
							<option value="kode">Kode Alat</option>
							<option value="jumlah">Jumlah Alat</option>
                            <option value="nomor_rak">Nomor Rak</option>
							<option value="status">Status</option>

						</select>
						<input type="text" placeholder="Masukkan kata kunci" name="keyword">
						<input type="submit" name="search" value="cari" class="btn btn-info">
					</form>
				</div>
			</div>

			<table class="table table-hover table-bordered">
				<tr>
					<th>No.</th>
					<th>Nama Alat</th>
					<th>Kode Alat</th>
					<th>Jumlah</th>
					<th>Nomor Rak</th>
                    <th>Status</th>
					<th>Action</th>
				</tr>
<?php
		
	if(isset($_GET['category'])&&isset($_GET['keyword'])){
		$category = $_GET['category'];
		$keyword = $_GET['keyword'];

		//search for data in table buku where category contains keyword
		$sql = "SELECT * FROM alat WHERE $category LIKE '%$keyword%'";
		$result = mysqli_query($connection, $sql); 
		
		$count=mysqli_num_rows($result);	
	}else{
		$sql = "SELECT * FROM alat;";
		$result = mysqli_query($connection, $sql); 
		
		$count=mysqli_num_rows($result);	
	}


	if($count>0){
		$number = 1;	
		
		echo "<p>$count data ditampilkan.<p>";
		
		while($row = mysqli_fetch_assoc($result)) {
			$id = $row["kode"];
	        echo "<tr> <td>" . $number. "</td><td> " . 
	        $row["nama_alat"]. "</td><td> " .
            $row["kode"]."</td><td>".
            $row["jumlah"]."</td><td>".
            $row["nomor_rak"]."</td><td>".
			$row["status"]."</td><td>".
			
	        "<a href='edit-alat.php?kode=$id' role='button' class='btn btn-info btn-sm'>Edit</a>".
	        "<a href='delete-alat.php?kode=$id' role='button' class='btn btn-danger btn-sm'>Hapus</a></td></tr>";
	        

	        $number++;

		}
		
	}else{
		echo "Maaf, tidak ditemukan data yang cocok.";
		
	}
?>
			</table>
		</div>
	</div>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		
		//hide the div when document first ready
		$("#searchBox").hide();	
		$("#search").click(function(){
			$("#searchBox").toggle("medium");
		});
	});
</script>