<?php
ob_start();
session_start();
if (!empty($_SESSION['ses_usrname'])){
	$simpan=$_POST['simpan'];
	$ida=$_POST['ida'];
	$id=$_POST['id'];
	$pre=$_POST['pre'];
	
	if ($simpan){
		if ($pre==5){
			include '../index_files/conndb3.php';
			$query="delete from mst_kendaraandinas where sysid=$id";

			$result=mysql_query($query,$conn3) or die('Error, delete query failed');

			mysql_close();
		}
		if ($pre==8){
			include '../index_files/conndb3.php';
			$query="delete from mst_driver where sysid=$id";

			$result=mysql_query($query,$conn3) or die('Error, delete query failed');

			mysql_close();
		}
		if ($pre==0){
			include '../index_files/conndb3.php';
			$query="delete from tbl_agenda_driver where sysid=$id";

			$result=mysql_query($query,$conn3) or die('Error, delete query failed');

			mysql_close();
		}
		header("Location: index.php?p=$pre&ida=$ida");
	}else{
		header("Location: index.php?p=$pre&ida=$ida");
	};
}
?>