	<!-- container -->
	<div class="container">
		<?php
		$ida=$_GET['ida'];
		$id=$_GET['id'];
		include '../index_files/conndb3.php';
		$query="select * from tbl_agenda_driver where sysid=$id";
		$result=mysql_query($query,$conn3) or die('Error, query failed');
		if ($val=mysql_fetch_array($result)) {
			$tgl_agenda=$val[tgl_agenda];
			$jam=$val[jam];
			$satker=$val[satker];
			$kendaraan=$val[kendaraan];
			$driver=$val[driver];
			$keperluan=$val[keperluan];
			$kota_tujuan=$val[kota_tujuan];
			$no_spd=$val[no_spd];
			$selesai=$val[selesai];
		}
		?>
		<div class="row">
			<!-- Article main content -->
			<article class="col-sm-8 maincontent">
				<font class='toplink'>
					<a href='../index_home/index.php?p=0' style='text-decoration: none'>Home</a> >
					<a href='../kendaraan/index.php?p=0&ida=<?php print $ida;?>' style='text-decoration: none'>Kendaraan Dinas Operasional</a> >
					<a href='../kendaraan/index.php?p=16&ida=<?php print $ida;?>&id=<?php print $id;?>' style='text-decoration: none'>Update Agenda Kendaraan Dinas</a> 
				</font>
				
				<header class="page-header">
					<font class='txtstyleheader'>Update Agenda Driver</font>
				</header>
				<table width="100%">
				<?php 
				$errcode = $_GET['errcode'];
				if($errcode ==1) echo '<font class="txtwarning">Isikan Tanggal, Jam, Kendaraan, Driver, Satker, Keperluan, Kota Tujuan!</font>'; 
				?>
				<form role="form" enctype="multipart/form-data" method="post" action="act_editagenda.php">
					<tr>
						<td width="120" valign="top"><font class='txttablecontent'>Tanggal</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<font class='txttablecontent'>
							<input style="width:150px"  class="tcal" name="tgl_agenda" type="text" value="<?php print $tgl_agenda;?>" autofocus> </font>
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Jam</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:150px" class="form-control" value="<?php print $jam;?>" name="jam" type="text" autofocus > 
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Kendaraan</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<select name="kendaraan" class="form-control" style="width:400px">
								<option value="<?php print $kendaraan;?>"><?php print $kendaraan;?></option>
								<?php
								include '../index_files/conndb3.php';
								
								$query="select * from mst_kendaraandinas order by kendaraan";
								$result=mysql_query($query,$conn3) or die('Error, query failed');
								while ($val=mysql_fetch_array($result)) {
								?>
									<option value="<?php print $val[kendaraan].' '.$val[no_plat];?>"><?php print $val[kendaraan].' '.$val[no_plat];?></option>
								<?php };?>
							</select>
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Driver</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<select name="driver" class="form-control" style="width:400px">
								<option value="<?php print $driver;?>"><?php print $driver;?></option>
								<?php
								$query="select * from mst_driver order by nm_driver";
								$result=mysql_query($query,$conn3) or die('Error, query failed');
								while ($val=mysql_fetch_array($result)) {
								?>
									<option value="<?php print $val[nm_driver].' ('.$val[telp].')';?>"><?php print $val[nm_driver].' ('.$val[telp].'), --> '.$val[kendaraan_default];?></option>
								<?php };mysql_close();?>
							</select>
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Satker</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<select name="satker" class="form-control" style="width:400px">
								<option value="<?php print $satker;?>"><?php print $satker;?></option>
								<?php
								include '../index_files/conndb.php';
								$query="select * from m_satker order by kd_satker";
								$result=mysql_query($query,$conn1) or die('Error, query failed');
								while ($val=mysql_fetch_array($result)) {
								?>
									<option value="<?php print $val[nm_satker];?>"><?php print $val[nm_satker];?></option>
								<?php };mysql_close();?>
							</select>
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Keperluan</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:400px" class="form-control" value="<?php print $keperluan;?>" name="keperluan" type="text" autofocus >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Kota Tujuan</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:200px" class="form-control" value="<?php print $kota_tujuan;?>" name="kota_tujuan" type="text" autofocus >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>No SPD</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:400px" class="form-control" value="<?php print $no_spd;?>" name="no_spd" type="text" autofocus >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Jam Pulang</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:150px" class="form-control" name="jam_pulang" placeholder="13:00" type="text" autofocus >
							</div>
						</td>
					 </tr>
					 
					 <tr>
						<td>
							<input type="hidden" name="ida" value=<?php print $ida;?>>
							<input type="hidden" name="id" value=<?php print $id;?>>
						</td>
						<td>
							<input type="submit" class="btn btn-lg btn-success" id="simpan" name="simpan" value="Simpan">
							<input type="submit" class="btn btn-lg btn-danger" id="hapus" name="hapus" value="Hapus">
							<input type="submit" class="btn btn-lg btn-action" id="batal" name="batal" value="Batal">
						</td>
					</tr>
				  </form>
				</table>

			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<aside class="col-sm-4 sidebar sidebar-right">
				<?php include "r_kendaraan.php";?>
			</aside>
			<!-- /Sidebar -->

		</div>
	</div>	<!-- /container -->
	
