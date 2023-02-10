<?php 
	include '../index_files/conndb.php';
	$kdsatker=$_SESSION['ses_usrkdsatker'];
	
	$query="select akses from t_akses where sysid_aplikasi=$ida and sysid_user=$kdsatker";
	$result=mysql_query($query,$conn1) or die('Error, query failed0');
	if ($val=mysql_fetch_array($result)) {
		$groupakses=$val['akses'];
	}

	$id_user=$_SESSION['ses_usrsysid'];
	$q1="select * from t_akses where sysid_user=$id_user and sysid_aplikasi=$ida";
	$r1=mysql_query($q1,$conn1) or die('Error, query failed');
	if ($v1=mysql_fetch_array($r1)) {
		$_SESSION['ses_usrakses']=$v1['akses'];
	}else{
		$_SESSION['ses_usrakses']='User';
	}
	
	include '../index_files/conndb4.php';
	$usrid1=$_SESSION['ses_usrid1'];
	$kd_satker=$_SESSION['ses_usrkdsatker'];
	$tglsekarang=date('Y-m-d');
	$_SESSION['ses_plh']=0;
	$q2="select * from m_ruleplh where plh_id='$usrid1' and kd_satker='$kd_satker' and tgl_akhir >='$tglsekarang'";
	$r2=mysql_query($q2,$conn4) or die('Error, query failed');
	if ($v2=mysql_fetch_array($r2)) {
		$_SESSION['ses_plh']=1;
	}

?>

<ul class="sidebar-menu">

<li class="header">MAIN MENU</li>
  <li><a href="../index_home/index.php?p=0"><i class="fa fa-home"></i> Beranda </a></li>
  <li class="treeview">
        <a href="javascript:void(0);">
        <i class="fa fa-th-list"></i> <span>Sub Aplikasi</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
      		<ul class="treeview-menu">
  			<?PHP
			if (!empty($_SESSION['ses_usrname'])) {
				if ($_SESSION['ses_usrname']=='administrator'){
					$query="select * from t_aplikasi where akses='administrator' and status=1 order by nama_app";
				}else{
					$query="select * from t_aplikasi where akses<>'administrator' and status=1 order by nama_app";
				};
				$result=mysql_query($query,$conn1) or die('Error, query failed');
				while ($val=mysql_fetch_array($result)) {
			?>
  				<li><a href="<?php print $val['home_app'];?>"><img src="<?php print $val['icon_app'];?>" height="20px"> <?php print $val['nama_app'];?> </a></li>
			<?php
				};
			}; ?>
      		</ul>
  </li>

  <li class="header">MENU ADMIN</li>

<?php 
	include '../index_files/conndb.php';
	if (($_SESSION['ses_usrakses']=='Superuser') or ($groupakses=='Superuser')){
			$query="select * from t_menu where klp_menu='kendaraan' and hak_akses='Superuser' order by urutan";
			$result=mysql_query($query,$conn1) or die('Error, query failed2');
			while ($val=mysql_fetch_array($result)) {
				$link='../kendaraan/index.php?p='.$val['index_p'];
?>


<?php 
//	if (print $link.'&ida='.$ida) { ?>
<!--
<li class="active"><a href="<?php //print $link.'&ida='.$ida;?>"><i class="fa fa-user"></i> <?php //print $val['nama_menu'];?> </a></li>
-->
<?php//	}
//	else { ?>
  <li><a href="<?php print $link.'&ida='.$ida;?>"><i class="fa fa-user"></i> <?php print $val['nama_menu'];?> </a></li>
<?php//	} ?>


<?PHP }; }; 
?>

<li class="header">MENU PENGGUNA</li>
<?php
	$query="select * from t_menu where klp_menu='kendaraan' and hak_akses='User' order by urutan";
	$result=mysql_query($query,$conn1) or die('Error, query failed3');
	while ($val=mysql_fetch_array($result)) {
		$link='../kendaraan/index.php?p='.$val['index_p'];
		?>
  <li><a href="<?php print $link.'&ida='.$ida;?>"><i class="fa fa-users"></i> <?php print $val['nama_menu'];?> </a></li>


<?php }; mysql_close();?>
</ul>
