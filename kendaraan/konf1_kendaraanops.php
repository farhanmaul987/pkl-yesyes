
	<link rel="stylesheet" type="text/css" href="../lib/tigra/1-simple-calendar/tcal.css" />
	<script type="text/javascript" src="../lib/tigra/1-simple-calendar/tcal.js"></script>
	
	
	<!-- container -->
	<div class="container">

		<div class="row">
			<!-- Article main content -->
			<article class="maincontent">

			<section class="content-header">
 			   	<h1>
      			<i class="fa fa-edit icon-title"></i> Konfirmasi Permintaan Penggunaan Kendaraan Dinas Operasional dan Driver
				</h1>

				<ol class="breadcrumb">

				<?php
				include '../index_files/conndb.php';
				$query="select * from t_aplikasi where sysid=$ida";
				$result=mysql_query($query,$conn3) or die('Error, query failed');
				if ($val=mysql_fetch_array($result)) {

				?>
			      <li>
					<a href="<?php print $val['home_app'];?>"><i class="fa fa-home"></i> Beranda <?php print $val['nama_app'];?></a>
    			<?php }; 
				mysql_close();
				?>
				  </li>
				</ol>
				<br>
  			</section>
			  <div class="box box-primary">
        		<div class="box-body">
			
				<table width="100%">
				<?php
				$s_id=$_GET['s_id'];
				include '../index_files/conndb3.php';
				$query="select * from tbl_agenda_driver where sysid=$s_id";
				$result=mysql_query($query,$conn3) or die('Error, query failed');
				if ($val=mysql_fetch_array($result)) {
					$tgl_agenda=$val['tgl_agenda'];
					$jam=$val['jam'];
					$tgl_agenda2=$val['tgl_agenda2'];
					$jam2=$val['jam2'];
					$satker=$val['satker'];
					$kendaraan=$val['kendaraan'];
					$driver=$val['driver'];
					$keperluan=$val['keperluan'];
					$kota_tujuan=$val['kota_tujuan'];
					$no_spd=$val['no_spd'];
				}

				$errcode = $_GET['errcode'];
				if($errcode ==1) echo '<font class="txtwarning">Isikan Tanggal, Jam, Kendaraan, Driver, Satker, Keperluan, Kota Tujuan!</font>'; 
				?>
				<form role="form" enctype="multipart/form-data" method="post" action="act_konfkendaraan.php">
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Tanggal</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<font class='txttablecontent'>
							<input style="width:100px"  class="tcal" name="tgl_agenda" type="date" value="<?php print $tgl_agenda;?>" autofocus> 
							Jam <input style="width:100px" value="<?php print $jam;?>" name="jam" type="time" autofocus >
							&nbsp; s.d. &nbsp; 
							<input style="width:100px"  class="tcal" name="tgl_agenda2" type="date" value="<?php print $tgl_agenda2;?>" autofocus>                                                                                                      
							Jam <input style="width:100px" value="<?php print $jam2;?>" name="jam2" type="time" autofocus > </font>  
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
									<option value="<?php print $val['kendaraan'].' '.$val['no_plat'];?>"><?php print $val['kendaraan'].' '.$val['no_plat'];?></option>
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
									<option value="<?php print $val['nm_driver'].' ('.$val['telp'].')';?>"><?php print $val['nm_driver'].' ('.$val['telp'].'), --> '.$val['kendaraan_default'];?></option>
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
									<option value="<?php print $val['nm_satker'];?>"><?php print $val['nm_satker'];?></option>
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
						<td width="120" valign="top"><font class='txttablecontent'>Status Konfirm</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<select name="konfirm" class="form-control" style="width:200px">
								<option value="0"></option>
								<option value="1">Dipenuhi</option>
								<option value="2">Tidak Dipenuhi</option>
							</select>
							</div>
						</td>
					 </tr>
					 <tr>
						<td>
							<input type="hidden" name="ida" value=<?php print $ida;?>>
							<input type="hidden" name="s_id" value=<?php print $s_id;?>>
						</td>
						<td>
							<input type="submit" class="btn btn-primary" id="simpan" name="simpan" value="Simpan">
							<input type="submit" class="btn btn-secondary" id="batal" name="batal" value="Batal">
							<input type="submit" class="btn btn-danger" id="hapus" name="hapus" value="Hapus">
						</td>
					</tr>
				  </form>
				</table>
			
				</div>
			</div>
			</article>
			<!-- /Article -->
			

		</div>
	</div>	<!-- /container -->
	
