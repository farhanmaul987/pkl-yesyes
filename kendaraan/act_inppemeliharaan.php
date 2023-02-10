<?php
ob_start();
session_start();
if (empty($_SESSION['ses_usrname'])){
	header("Location: ../index_home/index.php?p=0");
}else{
	$jns_pemeliharaan=$_POST['jns_pemeliharaan'];
	$userstamp=$_SESSION['ses_usrid2'];
	$tgl_pemeliharaan=$_POST['tgl_pemeliharaan'];
	$teknisi=$_POST['teknisi'];
	$uraian=$_POST['uraian'];
	$catatan=$_POST['catatan'];
	$biaya=$_POST['biaya'];
	if (empty($biaya)) $biaya=0;
	$next_pemeliharaan=$_POST['next_pemeliharaan'];
	$kondisi=$_POST['kondisi'];
	$ida=$_POST['ida'];
	$kd_brg=$_POST['kd_brg'];
	$no_aset=$_POST['no_aset'];
	$nm_aset=$_POST['nm_aset'];
	$k=$_POST['k'];
	$simpan=$_POST['simpan']; 
	if ($simpan){
		include '../index_files/conndb3.php';
		$userstamp=$_SESSION['ses_usrid2'];
		$query="insert into tbl_pemeliharaan_aset (kd_brg,no_aset,nama_aset,jns_pemeliharaan, tgl_pemeliharaan,next_pemeliharaan, teknisi,uraian, biaya, catatan,userstamp) values ('$kd_brg',$no_aset,'$nm_aset','$jns_pemeliharaan','$tgl_pemeliharaan', '$next_pemeliharaan','$teknisi','$uraian',$biaya,'$catatan','$userstamp')";
		$result = mysql_query($query,$conn3) or die('Error, query failed');
		$query="update tbl_datadukung_aset set kondisi='$kondisi' where kd_brg='$kd_brg' and no_aset=$no_aset";
		$result = mysql_query($query,$conn3) or die('Error, update query failed');
		mysql_close();

		header("Location: index.php?p=11&ida=$ida");
	}else{
		header("Location: index.php?p=11&ida=$ida");
	}
};
?>