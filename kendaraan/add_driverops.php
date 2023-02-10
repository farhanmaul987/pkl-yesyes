
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
					<a href='../kendaraan/index.php?p=8&ida=<?php print $ida;?>' style='text-decoration: none'>Set Driver</a> >
					<a href='../kendaraan/index.php?p=9&ida=<?php print $ida;?>' style='text-decoration: none'>Tambah Data Baru</a>
				</font>
				
				<header class="page-header">
					<font class='txtstyleheader'>Tambah Data Driver Kendaraan Dinas Operasional</font>
				</header>
				<table width="100%">
				<?php
				$errcode = $_GET['errcode'];
				if($errcode ==1) echo '<font class="txtwarning">Isikan data Nama dan No Telp !</font>'; 
				?>
				<form role="form" enctype="multipart/form-data" method="post" action="act_adddriverops.php">
					<tr>
						<td width="120" valign="top"><font class='txttablecontent'>Nama Driver</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:200px" id="a" class="form-control" placeholder="Isikan Nama Driver" name="nm_driver" type="text" autofocus >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Nomor Telp</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:200px" id="a" class="form-control" placeholder="Isikan Nomor Telp Driver" name="telp" type="text" autofocus >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Default Kendaraan</font></td>
						<td><font class='txttablecontent'>
							<div class="form-group" style="padding-bottom:1px;">
							<select name="kendaraan_default" style="width:300px" class="form-control">
								<option value=""></option>
								<?php
								include '../index_files/conndb3.php';
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
	
