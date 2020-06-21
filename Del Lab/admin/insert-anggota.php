<?php
	//first check if post insertPeminjaman has value
        session_start();
		if(isset($_SESSION['login'])){
            $id_peminjam = $_POST["id_1"];
			$nama_peminjam = $_POST["id_2"];
			$jenis_kelamin= $_POST["id_3"];
			
            
            require_once('../config/connection.php');
			$sql = "INSERT INTO peminjam (id_peminjam, nama_peminjam, jenis_kelamin) VALUES ('$id_peminjam', '$nama_peminjam', '$jenis_kelamin')";
            $result = mysqli_query($connection, $sql); 	

            // var_dump($sql);
            // var_dump($result);

            // if($result){
                echo"<script>alert('Data Anggota Berhasil Ditambahkan');</script>";
                header("Refresh:0 url=daftar-anggota.php");
            // }
        }
		//catch error that may be created in the query process
            
			//if it is, then proceed to the following
	
?>