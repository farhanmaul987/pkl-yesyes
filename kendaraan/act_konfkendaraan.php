<?php
ob_start();
session_start();
if (!empty($_SESSION['ses_usrname'])){
	
	$simpan=$_POST['simpan'];
	$hapus=$_POST['hapus'];
	$userins=$_SESSION['ses_usrname'];
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
	$s_id=$_POST['s_id'];
	$ida=$_POST['ida'];
			
	if ($simpan){
		if (($tgl_agenda) and ($jam) and ($satker) and ($keperluan) and ($kota_tujuan)){
			include '../index_files/conndb3.php';
			$query="update tbl_agenda_driver set tgl_agenda='$tgl_agenda', jam='$jam',tgl_agenda2='$tgl_agenda2', jam2='$jam2', kendaraan='$kendaraan', driver='$driver', satker='$satker', keperluan='$keperluan', kota_tujuan='$kota_tujuan', no_spd='$no_spd', konfirm=$konfirm where sysid=$s_id";
			$result=mysql_query($query,$conn3) or die('Error, update query failed');

			mysql_close();
			header("Location: index.php?p=0&ida=$ida");
		}else{
			header("Location: index.php?p=4&ida=$ida&s_id=$s_id&errcode=1");
		}
	}else if ($hapus){
		header("Location: index.php?p=7&pre=0&ida=$ida&nm=$tgl_agenda&id=$s_id");
	}else{
		header("Location: index.php?p=0&ida=$ida");
	};
}
?>