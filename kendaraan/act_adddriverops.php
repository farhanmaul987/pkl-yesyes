<?php
ob_start();
session_start();
if (!empty($_SESSION['ses_usrname'])){
	
	$simpan=$_POST['simpan'];
	$ida=$_POST['ida'];
	$nm_driver=$_POST['nm_driver'];
	$telp=$_POST['telp'];
	$kendaraan_default=$_POST['kendaraan_default'];
			
	if ($simpan){
		if (($nm_driver) and ($telp)){
			include '../index_files/conndb3.php';

			$query="insert into mst_driver (nm_driver,telp,kendaraan_default) values ('$nm_driver','$telp','$kendaraan_default')";

			$result=mysql_query($query,$conn3) or die('Error, insert query failed');

			mysql_close();
			header("Location: index.php?p=8&ida=$ida");
		}else{
			header("Location: index.php?p=9&ida=$ida&errcode=1");
		}
	}else{
		header("Location: index.php?p=8&ida=$ida");
	};
}
?>