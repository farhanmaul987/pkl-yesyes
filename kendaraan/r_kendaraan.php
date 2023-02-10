<div class="widget">
	<?php
	include '../index_files/user_id.php';
	include '../index_files/conndb.php';
	?>
	<header class="page-header">
		<font class='txtstyleheader'>Menu Pengguna</font>
	</header>
	<table cellspacing="2" cellpadding="1" style="border-collapse: collapse" width="100%">
		<?php if ($_SESSION['ses_usrakses']=='Superuser'){
			$query="select * from t_menu where klp_menu='kendaraan' and hak_akses='Superuser' order by urutan";
			$result=mysql_query($query,$conn1) or die('Error, query failed');
			while ($val=mysql_fetch_array($result)) {
				$link='../kendaraan/index.php?p='.$val['index_p'];
		?>
		<tr>
			<td width=15 bgcolor="#B40404"></td>
			<td ><font class="heading2"><a href="<?php print $link.'&ida='.$ida;?>" style="text-decoration: none"> &nbsp<?php print $val['nama_menu'];?></a></font></td>
		</tr>
		<!--<tr>
			<td valign="top"><img src="../images/arrow_icon.png" height="20"></td>
			<td><font class="txttablecontent"><?php print $val['ket_menu'];?></font></td>
		</tr>-->
		<tr>
			<td height=1 bgcolor="#F5A9A9"></td>
			<td height=1 bgcolor="#F5A9A9"></td>
		</tr>
		<tr>
			<td colspan=2 height=3></td>
		</tr>
		<?php };};
		if ($_SESSION['ses_usrakses']=='Driver'){
			$query="select * from t_menu where klp_menu='kendaraan' and hak_akses='Driver' order by urutan";
			$result=mysql_query($query,$conn1) or die('Error, query failed');
			while ($val=mysql_fetch_array($result)) {
				$link='../kendaraan/index.php?p='.$val['index_p'];
		?>
		<tr>
			<td width=15 bgcolor="#B40404"></td>
			<td ><font class="heading2"><a href="<?php print $link.'&ida='.$ida;?>" style="text-decoration: none"> &nbsp<?php print $val['nama_menu'];?></a></font></td>
		</tr>
		<!--<tr>
			<td valign="top"><img src="../images/arrow_icon.png" height="20"></td>
			<td><font class="txttablecontent"><?php print $val['ket_menu'];?></font></td>
		</tr>-->
		<tr>
			<td height=1 bgcolor="#F5A9A9"></td>
			<td height=1 bgcolor="#F5A9A9"></td>
		</tr>
		<tr>
			<td colspan=2 height=3></td>
		</tr>
		<?php };};
		$query="select * from t_menu where klp_menu='kendaraan' and hak_akses='User' order by urutan";
		$result=mysql_query($query,$conn1) or die('Error, query failed');
		while ($val=mysql_fetch_array($result)) {
			$link='../kendaraan/index.php?p='.$val['index_p'];
		?>
		<tr>
			<td width=15 bgcolor="#585858"></td>
			<td><font class="heading2"><a href="<?php print $link.'&ida='.$ida;?>" style="text-decoration: none">&nbsp<?php print $val['nama_menu'];?></a></font></td>
		</tr>
		<!--<tr>
			<td valign="top"><img src="../images/arrow_icon.png" height="20"></td>
			<td><font class="txttablecontent"><?php print $val['ket_menu'];?></font></td>
		</tr>-->
		<tr>
			<td height=1 bgcolor="#BDBDBD"></td>
			<td height=1 bgcolor="#BDBDBD"></td>
		</tr>
		<tr>
			<td colspan=2 height=3></td>
		</tr>
		<?php };?>
		
	</table>
	<header class="page-header">
		<font class='txtstyleheader'>Catatan Pajak Kendaraan Dinas</font>
	</header>
	<table cellspacing="2" cellpadding="1" style="border-collapse: collapse" width="100%">
	<?php
	$thn=date('Y');
	include '../index_files/conndb3.php';
	$query="select * from mst_kendaraandinas where substring(masa_laku,1,4)='$thn' order by substring(masa_laku,5,2)";
	$result2=mysql_query($query,$conn3) or die('Error, query failed');
	while ($val2=mysql_fetch_array($result2)) {
		$tgl=substr($val2['masa_laku'],8,2).'-'.substr($val2['masa_laku'],5,2).'-'.substr($val2['masa_laku'],0,4);
	?>

		<tr>
			<td><font class="heading2">&nbsp<?php print '* '.$tgl.' &nbsp&nbsp'.$val2['kendaraan'].' '.$val2['no_plat'];?></font></td>
		</tr>
		<tr>
			<td height=1 bgcolor="#D8CEF6"></td>
		</tr>
		<tr>
			<td height=2></td>
		</tr>
	<?php };
	mysql_close();?>
	</table>
</div>