<?php
	require "cekAdmin.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../jquery/jquery-1.11.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<title>Admin - Peminjaman</title>
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
			<li class="dropdown active">
	          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Peminjaman Alat<span class="caret"></span></a>
	          <ul class="dropdown-menu">
              <li class="active"><a href="tambah-peminjaman-alat.php">Pinjam - Kembali</a></li>
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
		<div class="well well-md" id="notif">
			<!-- Message is show here -->
		</div>

		<div class="well well-lg">
			<h2 class="text-center">Peminjaman dan Pengembalian</h2>
			<div class="well well-md">
				<h3 class="text-center">Peminjaman</h3>
				<form role="form" action= "insertdata-alat.php" class="form-horizontal" method="POST">

					<div class="form-group">
						<label for="id_peminjaman_alat">ID peminjaman Alat :</label><br>
						<input type="text" maxlength="20" name="id_1" placeholder="ID Peminjaman Alat" class="form-control" id="id_peminjaman_alat" required>
					</div>
				  	<div class="form-group">
						<label for="id_peminjam">ID Peminjam:</label><br>
						<input type="text" maxlength="20" name="id_2" placeholder="ID Peminjam" class="form-control" id="id_peminjam" required>
					</div>

					<div class="form-group">
						<label for="id_alat"> Kode Alat :</label><br>
						<input type="text" maxlength="20" name="id_3" placeholder="Kode Alat" class="form-control" id="id_alat" required>
					</div>

					<div class="form-group">
						<label for="tanggal_pemakaian">Tanggal pemakaian:</label><br>
						<input type="date" maxlength="30" name="tanggal_pakai" placeholder="Tanggal pemakaian" class="form-control" id="tanggal_pemakaian" required>
					</div>

					<div class="form-group">
						<label for="tanggal_selesai">Tanggal selesai :</label><br>
						<input type="date" maxlength="30" name="tanggal_siap" placeholder="Tanggal selesai" class="form-control" id="tanggal_selesai" required>
   					</div>

					<div class="form-group">
					<button type="submit" class="btn btn-success">Submit</button>
					</div>

				</form>


			</div>
			<div class="well well-md">
				<h3 class="text-center">Pengembalian</h3>

				<!-- first, show all books borrowed by the member by entering the member id -->
				<form role="form" class="form-horizontal" method="POST">

					<div class="form-group">
						<label for="id_peminjam">ID peminjam</label><br>
						<input type="text" maxlength="20" name="id_2" placeholder="ID Peminjam" class="form-control" id="id_peminjam" required>
					</div>
					
					<div class="form-group">
					<button type = "submit" class="btn btn-success">Lihat Peminjaman</button>
					</div>					

				</form>
			</div>


		<div class="well well-lg">
			<table class="table table-hover table-bordered">
				<tr>
					<th>No.</th>
					<th>ID Peminjaman Alat</th>
					<th>Kode Alat</th>
					<th>Nama Alat</th>
					<th>Tanggal pemakaian</th>
					<th>Tanggal selesai</th>
					<th>Keterangan</th>
					<th>Action</th>
				</tr>
<?php
		$count =0;
		if($count>0){
			$number = 1;	
			
			echo "<p>$count Alat telah dipinjam oleh anggota bernomor $id_peminjam.<p>";
			
			while($row = mysqli_fetch_assoc($result)) {
				if(!isset($row["kembali"])){
					$status = "belum kembali";
					//$buttonStatus is to decide whether the button is clickable or not
					//it is clickable if the book is not yet returned
					$buttonStatus = "active";
		        }else{
		        	$status = "dikembalikan ".$row["kembali"];
		        	//it is unclickable if the book is already returned
		        	$buttonStatus = "disabled";
				}
				
				$id = $row["id_peminjaman_alat"];
				echo "<tr> <td>" . $number. "</td><td> " . 
				$row["id_peminjaman_alat"].
		        $row["id_alat"]."</td><td>".
		        $row["nama_alat"]. "</td><td> " .
		        $row["tanggal_pemakaian"]. "</td><td> " . 
		        $row["tanggal_selesai"]. "</td><td> " .
		        $status. "</td><td> ".
		        //buttonStatus is used here as a parameter if the button is clickable or not
		        "<a href='kembali-page-ruangan.php?id=$id' role='button' class='btn btn-primary $buttonStatus btn-sm'>Kembalikan</a></td></tr>";
				$number++;
			}
			
		}
	
?>
			</table>
		</div>
	</div>
	
</body>
</html>

<script type="text/javascript">
	//source code : modified from http://jsfiddle.net/7LXPq/93/
	$(document).ready( function() {

		//create object Date
    	var now = new Date();
 		var day = ("0" + now.getDate()).slice(-2);
    	var month = ("0" + (now.getMonth() + 1)).slice(-2);
    	day = parseInt(day);

    	//default date is today
    	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

    	//set default date to tgl_pinjam
		$('#tanggal_pemakaian').val(today);

		//date to return book is a week after it's borrowed
		//so the default is today + 7
		var returnLoan = now.getFullYear()+"-"+(month)+"-"+(day+7);
		//set default date to tgl_kembali
		$('#tanggal_selesai').val(returnLoan);

	});

</script>