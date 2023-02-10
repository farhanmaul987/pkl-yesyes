
	<link rel="stylesheet" type="text/css" href="../lib/tigra/1-simple-calendar/tcal.css" />
	<script type="text/javascript" src="../lib/tigra/1-simple-calendar/tcal.js"></script>
	
	
	<!-- container -->
	<div class="container">

		<div class="row">
			<!-- Article main content -->
			<?php $id = $_GET['id'];?>
			<article class="col-sm-8 maincontent">
				<font class='toplink'>
					<a href='../index_home/index.php?p=0' style='text-decoration: none'>Home</a> >
					<a href='../kendaraan/index.php?p=0&ida=<?php print $ida;?>' style='text-decoration: none'>Kendaraan Dinas Operasional</a> >
					<a href='../kendaraan/index.php?p=8&ida=<?php print $ida;?>' style='text-decoration: none'>Set Driver</a> >
					<a href='../kendaraan/index.php?p=10&ida=<?php print $ida;?>&id=<?php print $id;?>' style='text-decoration: none'>Edit Data</a>
				</font>
				
				<header class="page-header">
					<font class='txtstyleheader'>Edit Data Driver Kendaraan Dinas Operasional</font>
				</header>
				<table width="100%">
				<?php
				include '../index_files/conndb3.php';
				$query1="select * from mst_driver where sysid=$id";
				$result1=mysql_query($query1,$conn3) or die('Error, query failed');
				if ($val1=mysql_fetch_array($result1)) {
					$nm_driver=$val1[nm_driver];
					$telp=$val1[telp];
					$kendaraan_default=$val1[kendaraan_default];
				}
				$errcode = $_GET['errcode'];
				if($errcode ==1) echo '<font class="txtwarning">Isikan data Nama dan No Telp !</font>'; 

				?>
				<form role="form" enctype="multipart/form-data" method="post" action="act_editdriverops.php">
					<tr>
						<td width="120" valign="top"><font class='txttablecontent'>Nama Driver</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:200px" id="a" class="form-control" placeholder="Isikan Nama Driver" name="nm_driver" type="text" value="<?php print $nm_driver;?>" >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Nomor Telp</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:200px" id="a" class="form-control" placeholder="Isikan Nomor Telp Driver" name="telp" type="text" value="<?php print $telp;?>" >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Default Kendaraan</font></td>
						<td><font class='txttablecontent'>
							<div class="form-group" style="padding-bottom:1px;">
							<select name="kendaraan_default" style="width:300px" class="form-control">
								<option value="<?php print $nm_driver;?>"><?php print $kendaraan_default;?></option>
								<?php
								$query="select * from mst_kendaraandinas";
								$result=mysql_query($query,$conn3) or die('Error, query failed');
								while ($val=mysql_fetch_array($result)) {
								?>
								<option value="<?php echo $val[kendaraan].' '.$val[no_plat]; ?>"><?php echo $val[kendaraan].' '.$val[no_plat]; ?></option>
								<?php
								}
								?>
							</select>
							</div></font>
						</td>
					 </tr>
					 <tr>
						<td>
							<input type="hidden" name="ida" value=<?php print $ida;?>>
							<input type="hidden" name="id" value=<?php print $id;?>>
							<input type="hidden" name="nm" value=<?php print $nm_driver;?>>
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
	
