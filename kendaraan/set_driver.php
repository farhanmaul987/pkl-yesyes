	<!-- container -->
	<div class="container">

		<div class="row">
			<!-- Article main content -->
			<article class="col-sm-8 maincontent">
				<font class='toplink'>
					<a href='../index_home/index.php?p=0' style='text-decoration: none'>Home</a> >
					<a href='../kendaraan/index.php?p=0&ida=<?php print $ida;?>' style='text-decoration: none'>Kendaraan Dinas Operasional</a> >
					<a href='../kendaraan/index.php?p=8&ida=<?php print $ida;?>' style='text-decoration: none'>Set Driver</a>
				</font>
				
				<header class="page-header">
					<font class='txtstyleheader'>Pengaturan Driver Kendaraan Dinas Operasional</font>
				</header>
				
				<?php
				include '../index_files/conndb3.php';
				$query="select * from mst_driver order by nm_driver";
				$result=mysql_query($query,$conn3) or die('Error, query failed');
				$no_urut = 1;
				?>
				<a href="index.php?p=9<?php print '&ida='.$ida;?>" class="btn btn-lg btn-success">Tambah Data</a>
				</br><br>
				<?php
					if ($val=mysql_fetch_array($result)) { ?>
				<table border="1" cellspacing="0" cellpadding='2' style="border-collapse: collapse" bordercolor="#B4B4B4" width="650">
					<thead>
					<tr>
						<?php
						$cfg_header=array("No","Nama Driver","Telp","Default Kendaraan","");
						foreach ($cfg_header as $val1) {
							echo"<th bgcolor='#393E66'><font class='txttablehead'>".strtoupper($val1)."</font></th>";
						}?>
					</tr>
					</thead>
					<?php
						echo"
						<tr>
							<td style=vertical-align:top;width:40><font class='txttablecontent'>".$no_urut++."</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[nm_driver]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[telp]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[kendaraan_default]</font></td>
							<td style=vertical-align:top;width:100 align=center>
							<a href='index.php?p=10&ida=$ida&id=$val[sysid]' class='btn btn-lg btn-action'>Edit</a>
							</td>
						</tr>
						";
					while ($val=mysql_fetch_array($result)) {
						echo"
						<tr>
							<td style=vertical-align:top;width:40><font class='txttablecontent'>".$no_urut++."</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[nm_driver]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[telp]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[kendaraan_default]</font></td>
							<td style=vertical-align:top;width:100 align=center>
							<a href='index.php?p=10&ida=$ida&id=$val[sysid]' class='btn btn-lg btn-action'>Edit</a>
							</td>
						</tr>
						";
					};mysql_close();
					
				echo "</table>";
				};
				
			?>
				

			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<aside class="col-sm-4 sidebar sidebar-right">
				<?php include "r_kendaraan.php";?>
			</aside>
			<!-- /Sidebar -->

		</div>
	</div>	<!-- /container -->
	
