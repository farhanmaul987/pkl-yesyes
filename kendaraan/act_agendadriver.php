<?php
ob_start();
session_start();
if (!empty($_SESSION['ses_usrname'])){
	
	$simpan=$_POST['simpan'];
	$tgl_agenda=$_POST['tgl_agenda'];
	$jam=$_POST['jam'];
	$tgl_agenda2=$_POST['tgl_agenda2'];
	$jam2=$_POST['jam2'];
	$kendaraan=$_POST['kendaraan'];
	$driver=$_POST['driver'];
	$satker=$_POST['satker'];
	$keperluan=$_POST['keperluan'];
	$kota_tujuan=$_POST['kota_tujuan'];
	$no_spd=$_POST['no_spd'];
	$konfirm=$_POST['konfirm'];
	$userins=$_POST['userins'];
	$ida=$_POST['ida'];
			
	if ($simpan){
		if (($tgl_agenda) and ($jam) and ($kendaraan) and ($driver) and ($satker) and ($keperluan) and ($kota_tujuan)){
			include '../index_files/conndb3.php';
			$query="insert into tbl_agenda_driver (tgl_agenda, jam, tgl_agenda2, jam2, kendaraan, driver, satker, keperluan, kota_tujuan, no_spd, konfirm,userins) values ('$tgl_agenda','$jam','$tgl_agenda2','$jam2','$kendaraan','$driver', '$satker', '$keperluan', '$kota_tujuan', '$no_spd',$konfirm,'$userins')";
			$result=mysql_query($query,$conn3) or die('Error, insert query failed');

			mysql_close();
			header("Location: index.php?p=0&ida=$ida");
		}else{
			header("Location: index.php?p=1&ida=$ida&errcode=1");
		}
	}else{
		header("Location: index.php?p=0&ida=$ida");
	};
}
?>