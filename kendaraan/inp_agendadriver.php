
	<link rel="stylesheet" type="text/css" href="../lib/tigra/1-simple-calendar/tcal.css" />
	<script type="text/javascript" src="../lib/tigra/1-simple-calendar/tcal.js"></script>
	
	
	<!-- container -->
	<div class="container">

		<div class="row">
			<!-- Article main content -->
			<article class="col-sm-8 maincontent">
				<font class='toplink'>
					<a href='../index_home/index.php?p=0' style='text-decoration: none'>Home</a> >
					<a href='../kendaraan/index.php?p=0&ida=<?php print $ida;?>' style='text-decoration: none'>Kendaraan Dinas Operasional</a> >
					<a href='../kendaraan/index.php?p=1&ida=<?php print $ida;?>' style='text-decoration: none'>Input Agenda Driver</a>
				</font>
				
				<header class="page-header">
					<font class='txtstyleheader'>Input Agenda Driver</font>
				</header>
				<table width="100%">
				<?php 
				$errcode = $_GET['errcode'];
				if($errcode ==1) echo '<font class="txtwarning">Isikan Tanggal, Jam, Kendaraan, Driver, Satker, Keperluan, Kota Tujuan!</font>'; 
				?>
				<form role="form" enctype="multipart/form-data" method="post" action="act_agendadriver.php">
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Tanggal</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<font class='txttablecontent'>
							<input style="width:150px"  class="tcal" name="tgl_agenda" type="text" value="<?php print date('Y-m-d');?>" autofocus> </font>
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Jam</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:150px" class="form-control" placeholder="07:00 s.d. 13:00" name="jam" type="text" autofocus > 
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Kendaraan</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<select name="kendaraan" class="form-control" style="width:400px">
								<option value=""></option>
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
								<option value=""></option>
								<?php
								$query="select * from mst_driver order by nm_driver";
								$result=mysql_query($query,$conn3) or die('Error, query failed');
								while ($val=mysql_fetch_array($result)) {
								?>
									<option value="<?php print $val[nm_driver].' ('.$val[telp].')';?>"><?php print $val[nm_driver].' ('.$val[telp].')';?></option>
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
								<option value=""></option>
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
							<input style="width:400px" class="form-control" placeholder="Isikan keperluan" name="keperluan" type="text" autofocus >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Kota Tujuan</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:200px" class="form-control" placeholder="Isikan kota tujuan" name="kota_tujuan" type="text" autofocus >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>No SPD</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:400px" class="form-control" placeholder="Isikan No SPD bila ada" name="no_spd" type="text" autofocus >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Permintaan Dari</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:200px" class="form-control" placeholder="Isikan Nama Yang Request" name="userins" type="text" autofocus >
							</div>
						</td>
					 </tr>
					 <tr>
						<td>
							<input type="hidden" name="ida" value=<?php print $ida;?>>
							<input type="hidden" name="konfirm" value="0">
						</td>
						<td>
							<input type="submit" class="btn btn-lg btn-success" id="simpan" name="simpan" value="Simpan">
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
	
