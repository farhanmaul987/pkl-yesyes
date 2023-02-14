<?php 

	function connection(){

		$dbHost = 'localhost';
		$dbUername = 'root';
		$dbPassword = '';
		$dbName = 'pinjam_ruangan';

		$conn = mysqli_connect($dbHost, $dbUername, $dbPassword);

		if (!$conn) {
			die('Koneksi gagal terhubung :'. mysqli_error());
		}

		mysqli_select_db($conn, $dbName);

		return $conn;

	}
 ?>