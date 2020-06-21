<?php
	//first check if post insertPeminjaman has value
	session_start();
		if(isset($_SESSION['login'])){
			$id_peminjaman_alat = $_POST["id_1"];
			$id_peminjam = $_POST["id_2"];
			$id_alat = $_POST["id_3"];
			$tanggal_pemakaian = $_POST["tanggal_pakai"];
			$tanggal_selesai = $_POST["tanggal_siap"];
            $id_pegawai= $_SESSION["id_pegawai"];

            require_once('../config/connection.php');
			$sql = "INSERT INTO details_peminjaman_alat(id_peminjaman_alat, id_pegawai, id_peminjam, id_alat, tanggal_pemakaian, tanggal_selesai) VALUES ('$id_peminjaman_alat', '$id_pegawai', '$id_peminjam', '$id_alat', '$tanggal_pemakaian', '$tanggal_selesai');";
            $result = mysqli_query($connection, $sql); 
            //  var_dump($id_peminjaman_alat);
            //  var_dump($sql);
            //  var_dump( $result);
            //  var_dump($connection);

			$result = mysqli_query($connection, $sql); 	
            echo"<script>alert('Peminjaman Berhasl Ditambah');</script>";
            header("Refresh:0 url=daftar-peminjaman-alat.php");
        }
?>