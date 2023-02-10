<?php
ob_start();
session_start();
if (!empty($_SESSION['ses_usrname'])){
	
	$simpan=$_POST['simpan'];
	$hapus=$_POST['hapus'];
	$ida=$_POST['ida'];
	$id=$_POST['id'];
	$nm=$_POST['nm'];
	$no=$_POST['no'];
	$kendaraan=$_POST['kendaraan'];
	$tahun=$_POST['tahun'];
	$no_plat=$_POST['no_plat'];
	$no_plathitam=$_POST['no_plathitam'];
	$tgl_pajak=$_POST['tgl_pajak'];
	$masa_laku=$_POST['masa_laku'];
	$masalaku_plathitam=$_POST['masalaku_plathitam'];
	$samsat=$_POST['samsat'];
			
	if ($simpan){
		if (($kendaraan) and ($no_plat)){
			include '../index_files/conndb3.php';

			$query="update mst_kendaraandinas set kendaraan='$kendaraan',
												tahun='$tahun',
												no_plat='$no_plat',
												no_plathitam='$no_plathitam',
												tgl_pajak='$tgl_pajak',
												masa_laku='$masa_laku',
												masalaku_plathitam='$masalaku_plathitam',
												samsat='$samsat' where sysid=$id";

			$result=mysql_query($query,$conn3) or die('Error, update query failed');

			mysql_close();
			header("Location: index.php?p=5&ida=$ida");
		}else{
			header("Location: index.php?p=15&ida=$ida&id=$id&errcode=1");
		}
	} if ($hapus){
		header("Location: index.php?p=7&pre=5&ida=$ida&nm=$nm&no=$no&id=$id");
	}else{
		header("Location: index.php?p=5&ida=$ida");
	};
}
?>