<?php
ob_start();
session_start();
if (!empty($_SESSION['ses_usrname'])){
	
	$simpan=$_POST['simpan'];
	$hapus=$_POST['hapus'];
	$ida=$_POST['ida'];
	$id=$_POST['id'];
	$nm=$_POST['nm'];
	$nm_driver=$_POST['nm_driver'];
	$telp=$_POST['telp'];
	$kendaraan_default=$_POST['kendaraan_default'];
			
	if ($simpan){
		if (($nm_driver) and ($telp)){
			include '../index_files/conndb3.php';

			$query="update mst_driver set nm_driver='$nm_driver',telp='$telp',kendaraan_default='$kendaraan_default' where sysid=$id";

			$result=mysql_query($query,$conn3) or die('Error, update query failed');

			mysql_close();
			header("Location: index.php?p=8&ida=$ida");
		}else{
			header("Location: index.php?p=10&ida=$ida&id=$id&errcode=1");
		}
	} if ($hapus){
		header("Location: index.php?p=7&pre=8&ida=$ida&nm=$nm&id=$id");
	}else{
		header("Location: index.php?p=8&ida=$ida");
	};
}
?>