<?php
ob_start();
session_start();
if (!empty($_SESSION['ses_usrname'])){
	
	$simpan=$_POST['simpan'];
	$ida=$_POST['ida'];
	$s_id=$_POST['s_id'];
	$jam_pulang=$_POST['jam_pulang'];
	if (!empty($jam_pulang)) { 
		$f_selesai=1;
		$pulang=date('Y-m-d').' '.$jam_pulang;
	}
			
	if (($simpan) and ($s_id)){
		
		include '../index_files/conndb3.php';

		$query="update tbl_agenda_driver set f_selesai=$f_selesai, pulang='$pulang' where sysid=$s_id";

		$result=mysql_query($query,$conn3) or die('Error, update query failed');

		mysql_close();
		header("Location: index.php?p=0&ida=$ida");
		
	}else{
		header("Location: index.php?p=0&ida=$ida");
	};
}
?>