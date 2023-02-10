
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
					<a href='../kendaraan/index.php?p=17&ida=<?php print $ida;?>' style='text-decoration: none'>Input Selesai Tugas</a>
				</font>
				
				<header class="page-header">
					<font class='txtstyleheader'>Input Selesai Tugas Driver</font>
				</header>
				<table width="100%">
				<form role="form" enctype="multipart/form-data" method="post" action="act_inpselesai.php">
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Driver - Kendaraan</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<select name="s_id" class="form-control" style="width:400px">
								<option value=""></option>
								<?php
								$tgl_sekarang=date('Y-m-d');
								include '../index_files/conndb3.php';
								$query="select * from tbl_agenda_driver where f_selesai=0 and tgl_agenda='$tgl_sekarang' order by driver";
								$result=mysql_query($query,$conn3) or die('Error, query failed');
								while ($val=mysql_fetch_array($result)) {
								?>
									<option value="<?php print $val[sysid];?>"><?php print $val[driver].'  - '.$val[kendaraan];?></option>
								<?php };mysql_close();?>
							</select>
							</div>
						</td>
					 </tr>
					 <tr>
						<td>
							<input type="hidden" name="ida" value=<?php print $ida;?>>
							
						</td>
						<td>
							<input type="submit" class="btn btn-lg btn-success" id="simpan" name="simpan" value="Selesai">
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
	
