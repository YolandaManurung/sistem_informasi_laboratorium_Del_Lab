<?php
	include "cekAdmin.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../jquery/jquery-1.11.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>

	<title>Admin - List Anggota</title>
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
	            <li><a href="tambah-anggota.php">Tambah Anggota</a></li>
				<li class="active"><a href="daftar-anggota.php">Daftar Anggota</a></li>  
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
	            <li><a href="tambah-ruangan.php">Tambah Alat</a></li>
	            <li><a href="daftar-ruangan.php">Daftar Alat</a></li> 
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
			<h1>List Anggota</h1>
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

		<!-- form pencarian anggota -->

			<div class="well well-lg" id="searchBox">
				<h2 class="text-center">Pencarian Anggota</h2>
				<div class="text-center">
					<form role="form" method="GET">
						<select name="category">
							<option value="nama_peminjam">Nama</option>
							<option value="id_peminjam">ID Peminjam</option>
							<option value="jenis_kelamin">Jenis Kelamin</option>

						</select>
						<input type="text" placeholder="Masukkan kata kunci" name="keyword">
						<input type="submit" name="search" value="cari" class="btn btn-info">
					</form>
				</div>
			</div>

			<table class="table table-hover table-bordered">
				<tr>
					<th>No.</th>
					<th>Nama Peminjam</th>
					<th>ID Peminjam</th>
					<th>Jenis kelamin</th>
					<th>Action</th>
				</tr>
<?php
	
	//if category and keyword already have values
	//then proceed the following by showing ONLY what user requests		
	if(isset($_GET['category'])&&isset($_GET['keyword'])){
		$category = $_GET['category'];
		$keyword = $_GET['keyword'];

		//search for data in table anggota where category contains keyword
		$sql = "SELECT * FROM peminjam WHERE $category LIKE '%$keyword%'";
		$result = mysqli_query($connection, $sql); 
		
		$count=mysqli_num_rows($result);	
		
	}else{
		$sql = "SELECT * FROM peminjam;";
		$result = mysqli_query($connection, $sql); 
		
		$count=mysqli_num_rows($result);	
	}

	if($count>0){
		$number = 1;	
		
		echo "<p>$count data ditampilkan.<p>";
		
		while($row = mysqli_fetch_assoc($result)) {
			$id = $row["id_peminjam"];
	        echo "<tr> <td>" . $number. "</td><td> " . 
	        $row["nama_peminjam"]. "</td><td> " .
	        $row["id_peminjam"]."</td><td>".
	        $row["jenis_kelamin"]."</td><td>".
			
			"<a href='edit-anggota.php?id=$id' role='button' class='btn btn-info btn-sm'>Edit</a>".
			"<a href='delete-anggota.php?id=$id' role='button' class='btn btn-danger btn-sm'>Hapus</a></td></tr>";
			
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
		//toggle when the button is clicked
		$("#search").click(function(){
			$("#searchBox").toggle("medium");
		});
	});
</script>
</body>
</html>