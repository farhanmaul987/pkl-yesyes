<?php
ob_start();
session_start();
if (!empty($_SESSION['ses_usrname'])){
	
	$simpan=$_POST['simpan'];
	$userins=$_SESSION['ses_usrname'];
	$tgl_agenda=$_POST['tgl_agenda'];
	$jam=$_POST['jam'];
	$tgl_agenda2=$_POST['tgl_agenda2'];
	$jam2=$_POST['jam2'];
	$satker=$_POST['satker'];
	$keperluan=$_POST['keperluan'];
	$kota_tujuan=$_POST['kota_tujuan'];
	$no_spd=$_POST['no_spd'];
	$ida=$_POST['ida'];
			
	if ($simpan){
		if (($tgl_agenda) and ($jam) and ($satker) and ($keperluan) and ($kota_tujuan)){
			include '../index_files/conndb3.php';
			$query="insert into tbl_agenda_driver (tgl_agenda, jam, tgl_agenda2, jam2, satker, keperluan, kota_tujuan, no_spd, konfirm, userins) values ('$tgl_agenda','$jam', '$tgl_agenda2','$jam2','$satker', '$keperluan', '$kota_tujuan', '$no_spd',0,'$userins')";
			$result=mysql_query($query,$conn3) or die('Error, insert query failed');

			mysql_close();
			header("Location: index.php?p=0&ida=$ida");
		}else{
			header("Location: index.php?p=2&ida=$ida&errcode=1");
		}
	}else{
		header("Location: index.php?p=0&ida=$ida");
	};
}
?>