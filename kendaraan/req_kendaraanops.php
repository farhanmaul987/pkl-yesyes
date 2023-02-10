
	<link rel="stylesheet" type="text/css" href="../lib/tigra/1-simple-calendar/tcal.css" />
	<script type="text/javascript" src="../lib/tigra/1-simple-calendar/tcal.js"></script>
	
	
	<!-- container -->
	<div class="container">

		<div class="row">
			<!-- Article main content -->
			<article class="maincontent">

			<section class="content-header">
 			   	<h1>
      			<i class="fa fa-file icon-title"></i> Permintaan Penggunaan Kendaraan Operasional
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
				if($errcode ==1) echo '<font class="txtwarning">Isikan Tanggal, Jam, Satker, Keperluan, Kota Tujuan!</font>'; 
				?>
				<form role="form" enctype="multipart/form-data" method="post" action="act_reqkendaraanops.php">
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
						<td>
							<input type="hidden" name="ida" value=<?php print $ida;?>>
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

			</article>
			<!-- /Article -->
			
		</div>
	</div>	<!-- /container -->
	
