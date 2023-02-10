<?php
ob_start();
session_start();
if (empty($_SESSION['ses_usrname'])){
	header("Location: ../index_home/index.php?p=0");
}else{
	$userstamp=$_SESSION['ses_usrid2'];
	$tgl_pajak=$_POST['tgl_pajak'];
	$masa_laku=$_POST['masa_laku'];
	$masalaku_plathitam=$_POST['masalaku_plathitam'];
	$samsat=$_POST['samsat'];
	$ida=$_POST['ida'];
	$kd_brg=$_POST['kd_brg'];
	$no_aset=$_POST['no_aset'];
	$nm_aset=$_POST['nm_aset'];
	$k=$_POST['k'];
	$simpan=$_POST['simpan']; 
	if ($simpan){
		include '../index_files/conndb3.php';
		$userstamp=$_SESSION['ses_usrid2'];
		$query="update mst_kendaraandinas set tgl_pajak='$tgl_pajak',masa_laku='$masa_laku',masalaku_plathitam='$masalaku_plathitam',samsat='$samsat' where kd_brg='$kd_brg' and no_aset=$no_aset";
		$result = mysql_query($query,$conn3) or die('Error, update query failed');
		mysql_close();

		header("Location: index.php?p=13&ida=$ida");
	}else{
		header("Location: index.php?p=13&ida=$ida");
	}
};
?>