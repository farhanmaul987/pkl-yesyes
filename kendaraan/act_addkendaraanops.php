<?php
ob_start();
session_start();
if (!empty($_SESSION['ses_usrname'])){
	
	$simpan=$_POST['simpan'];
	$hapus=$_POST['hapus'];
	$ida=$_POST['ida'];
	$kd_brg=$_POST['kd_brg'];
	$no_aset=$_POST['no_aset'];
	$kendaraan=$_POST['kendaraan'];
	$tahun=$_POST['tahun'];
	$no_plat=$_POST['no_plat'];
	$no_plathitam=$_POST['no_plathitam'];
	$tgl_pajak=$_POST['tgl_pajak'];
	$masa_laku=$_POST['masa_laku'];
	$masalaku_plathitam=$_POST['masalaku_plathitam'];
	$samsat=$_POST['samsat'];

	if ($simpan){
	include '../index_files/conndb3.php';

	include '../index_files/conndb3.php';

	$query="insert into mst_kendaraandinas (kendaraan,tahun, no_plat,no_plathitam,kd_brg,no_aset,tgl_pajak,masa_laku,samsat,masalaku_plathitam) 
	values ('$kendaraan','$tahun','$no_plat','$no_plathitam','$kd_brg','$no_aset','$tgl_pajak','$masa_laku','$samsat','$masalaku_plathitam')";

	$result=mysql_query($query,$conn3) or die('Error, insert query failed');

	mysql_close();
	header("Location: index.php?p=5&ida=$ida");
}
else{
header("Location: index.php?p=5&ida=$ida");
};
}
?>