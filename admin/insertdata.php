<?php
	//first check if post insertPeminjaman has value
        session_start();
		if(isset($_SESSION['login'])){
            $id_peminjaman_ruangan = $_POST["id_1"];
			$id_peminjam = $_POST["id_2"];
			$id_ruangan = $_POST["id_3"];
			$tanggal_pemakaian = $_POST["tanggal_pakai"];
			$tanggal_selesai = $_POST["tanggal_siap"];
            $id_pegawai= $_SESSION['id_pegawai'];
            
            require_once('../config/connection.php');
			$sql = "INSERT INTO details_peminjaman_ruangan (id_peminjaman_ruangan, id_pegawai, id_peminjam, id_ruangan, tanggal_pemakaian, tanggal_selesai) VALUES ('$id_peminjaman_ruangan', '$id_pegawai', '$id_peminjam', '$id_ruangan', '$tanggal_pemakaian', '$tanggal_selesai')";
            $result = mysqli_query($connection, $sql); 	
            // if($result){
                echo"<script>alert('Peminjaman Berhasl Ditambah');</script>";
                header("Refresh:0 url=daftar-peminjaman-ruangan.php");
            // }
        }
		//catch error that may be created in the query process
            
			//if it is, then proceed to the following
	
?>