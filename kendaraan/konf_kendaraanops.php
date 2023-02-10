	<link rel="stylesheet" type="text/css" href="../lib/tigra/1-simple-calendar/tcal.css" />
	<script type="text/javascript" src="../lib/tigra/1-simple-calendar/tcal.js"></script>
	
	<!-- container -->
	<div class="container">

		<div class="row">
			<!-- Article main content -->
			<article class="maincontent">

			<section class="content-header">
 			   	<h1>
      			<i class="fa fa-edit icon-title"></i> Input Agenda Driver
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
				date_default_timezone_set('Asia/Jakarta');

				$errcode = $_GET['errcode'];
				if($errcode ==1) echo '<font class="txtwarning">Isikan Tanggal, Jam, Kendaraan, Driver, Satker, Keperluan, Kota Tujuan!</font>'; 
				?>
				<form role="form" enctype="multipart/form-data" method="post" action="act_agendadriver.php">
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Tanggal</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<font class='txttablecontent'>
							<input style="width:100px"  class="tcal" name="tgl_agenda" type="date" value="<?php print date('Y-m-d');?>" autofocus> 
							Jam <input style="width:100px" placeholder="07:00" name="jam" type="time" value="<?php print date('H:i');?>" autofocus >
							&nbsp; s.d. &nbsp; 
							<input style="width:100px"  class="tcal" name="tgl_agenda2" type="date" value="<?php print date('Y-m-d');?>" autofocus>                                                                                                      
							Jam <input style="width:100px" placeholder="07:00" name="jam2" type="time" autofocus > </font>  
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
								<option value=""></option>
								<option value="Tanpa Driver">Tanpa Driver</option>
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
								<option value=""></option>
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
							<input type="hidden" name="konfirm" value="1">
						</td>
						<td>
							<input type="submit" class="btn btn-primary" id="simpan" name="simpan" value="Simpan">
							<input type="submit" class="btn btn-secondary" id="batal" name="batal" value="Batal">
						</td>
					</tr>
				  </form>
				</table>
				
					</div>
				</div>


			<section class="content-header">
 			   	<h1>
      			<i class="fa fa-list-alt icon-title"></i> Daftar Permintaan Penggunaan Kendaraan Dinas Operasional dan Driver
				</h1>

				<br>
  			</section>
			  <div class="box box-primary">
        		<div class="box-body">
				
				<?php
				$tgl_sekarang=date('Y-m-d');
				$start=0;
				include '../index_files/conndb3.php';
				$query="select * from tbl_agenda_driver where tgl_agenda>='$tgl_sekarang' and konfirm=0";
				$result=mysql_query($query,$conn3) or die('Error, query failed');
				$no_urut = 1;
				if ($val=mysql_fetch_array($result)) {
				
				?>
				<table id="dataTables1" class="table table-bordered table-striped table-hover">
					<thead>
					<tr>
						<?php
						$cfg_header=array("No","Tanggal/Jam","Kendaraan/Driver","Satker/Keperluan","Tujuan/No SPD","User Req");
						foreach ($cfg_header as $val1) {
							echo"<th bgcolor='#393E66'><font class='txttablehead'>".strtoupper($val1)."</font></th>";
						}?>
					</tr>
					</thead>
					<?php

					echo"
						<tr>
							<td style='vertical-align:top;width:35'><font class='txttablecontent'>".$no_urut++."</font><br></td>
							<td style='vertical-align:top'><font class='txttablecontent'><a href='index.php?p=4&ida=$ida&s_id=$val[sysid]' style='text-decoration: none'>$val[tgl_agenda]<br>$val[jam]</a></font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[kendaraan]<br>$val[driver]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[satker]<br>$val[keperluan]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[kota_tujuan]<br>$val[no_spd]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[userins]</font></td>
						</tr>
						";
					while ($val=mysql_fetch_array($result)) {
						echo"
						<tr>
							<td style='vertical-align:top;width:35'><font class='txttablecontent'>".$no_urut++."</font><br></td>
							<td style='vertical-align:top'><font class='txttablecontent'><a href='index.php?p=4&ida=$ida&s_id=$val[sysid]' style='text-decoration: none'>$val[tgl_agenda]<br>$val[jam]</a></font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[kendaraan]<br>$val[driver]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[satker]<br>$val[keperluan]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[kota_tujuan]<br>$val[no_spd]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[userins]</font></td>
						</tr>
						";
					};mysql_close();
					
				echo "</table>";
				}else{
					echo" <font class='txttablecontent'>Tidak ada data...</font>";
				}
				?>
				
				</div>
			</div>


			<section class="content-header">
 			   	<h1>
      			<i class="fa fa-list-alt icon-title"></i> Riwayat Penggunaan Kendaraan Dinas Operasional dan Driver
				</h1>

				<br>
  			</section>
			  <div class="box box-primary">
        		<div class="box-body">
				
				<?php
				$tgl_kemarin=date('Y-m-d');
				$start=0;
				include '../index_files/conndb3.php';
				$query="select * from tbl_agenda_driver where tgl_agenda>='$tgl_kemarin' and konfirm=1 and f_selesai=1";
				$result=mysql_query($query,$conn3) or die('Error, query failed');
				$no_urut = 1;
				if ($val=mysql_fetch_array($result)) {
				
				?>
				<table id="dataTables1" class="table table-bordered table-striped table-hover">
					<thead>
					<tr>
						<?php
						$cfg_header=array("No","Tanggal/Jam","Kendaraan/Driver","Satker/Keperluan","Tujuan/No SPD","User Req");
						foreach ($cfg_header as $val1) {
							echo"<th bgcolor='#393E66'><font class='txttablehead'>".strtoupper($val1)."</font></th>";
						}?>
					</tr>
					</thead>
					<?php

					echo"
						<tr>
							<td style='vertical-align:top;width:35'><font class='txttablecontent'>".$no_urut++."</font><br></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[tgl_agenda]<br>$val[jam]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[kendaraan]<br>$val[driver]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[satker]<br>$val[keperluan]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[kota_tujuan]<br>$val[no_spd]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[userins]</font></td>
						</tr>
						";
					while ($val=mysql_fetch_array($result)) {
						echo"
						<tr>
							<td style='vertical-align:top;width:35'><font class='txttablecontent'>".$no_urut++."</font><br></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[tgl_agenda]<br>$val[jam]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[kendaraan]<br>$val[driver]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[satker]<br>$val[keperluan]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[kota_tujuan]<br>$val[no_spd]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[userins]</font></td>
						</tr>
						";
					};mysql_close();
					
				echo "</table>";
				}else{
					echo" <font class='txttablecontent'>Tidak ada data...</font>";
				}
				?>

				</div>
			</div>
			</article>
			<!-- /Article -->
			

		</div>
	</div>	<!-- /container -->
	
