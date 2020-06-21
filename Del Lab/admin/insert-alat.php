<?php
	//first check if post insertPeminjaman has value
        session_start();
		if(isset($_SESSION['login'])){

        $kode = $_POST['kode'];
        $nama_alat = $_POST['nama_alat'];
        $jumlah = $_POST['jumlah'];
        $nomor_rak = $_POST['nomor_rak'];
        $status = $_POST['status'];
        
        //insert the following data to database
        
       

        require_once('../config/connection.php');
		$sql = "INSERT INTO alat (kode, nama_alat, jumlah, nomor_rak, status) VALUES ('$kode', '$nama_alat', '$jumlah', '$nomor_rak', '$status')";
        $result = mysqli_query($connection, $sql); 

        //  var_dump($sql);
        // var_dump($result);
        
        echo"<script>alert('Data Alat Berhasil Ditambahkan');</script>";
        header("Refresh:0 url=daftar-alat.php");
        }
?>
		