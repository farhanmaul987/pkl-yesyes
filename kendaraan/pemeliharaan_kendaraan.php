	<!-- container -->
	<div class="container">

		<div class="row">
			<!-- Article main content -->
			<article class="col-sm-8 maincontent">
				<font class='toplink'>
					<a href='../index_home/index.php?p=0' style='text-decoration: none'>Home</a> >
					<a href='../kendaraan/index.php?p=0&ida=<?php print $ida;?>' style='text-decoration: none'>Kendaraan Dinas Operasional</a> >
					<a href='../kendaraan/index.php?p=11&ida=<?php print $ida;?>' style='text-decoration: none'>Pemeliharaan Kendaraan</a>
				</font>
				
				<header class="page-header">
					<font class='txtstyleheader'>Daftar Kendaraan Dinas Operasional</font>
				</header>
				
				<?php
				include '../index_files/conndb3.php';
				$query="select * from mst_kendaraandinas order by kendaraan";
				$result=mysql_query($query,$conn3) or die('Error, query failed');
				$no_urut = 1;
				
				if ($val=mysql_fetch_array($result)) { ?>
				<table border="1" cellspacing="0" cellpadding='2' style="border-collapse: collapse" bordercolor="#B4B4B4" width="100%">
					<thead>
					<tr>
						<?php
						$cfg_header=array("No","Jenis Kendaraan","Tahun", "Plat Nomor","Plat Nomor Hitam","Kode Barang","No Aset");
						foreach ($cfg_header as $val1) {
							echo"<th bgcolor='#393E66'><font class='txttablehead'>".strtoupper($val1)."</font></th>";
						}?>
					</tr>
					</thead>
					<?php
						echo"
						<tr>
							<td style=vertical-align:top;width:40><font class='txttablecontent'>".$no_urut++."</font></td>
							<td style=vertical-align:top><font class='txttablecontent'><a href='index.php?p=12&ida=$ida&kb=$val[kd_brg]&na=$val[no_aset]'>$val[kendaraan]</a></font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[tahun]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[no_plat]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[no_plathitam]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[kd_brg]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[no_aset]</font></td>
							
						</tr>
						";
					while ($val=mysql_fetch_array($result)) {
						echo"
						<tr>
							<td style=vertical-align:top;width:40><font class='txttablecontent'>".$no_urut++."</font></td>
							<td style=vertical-align:top><font class='txttablecontent'><a href='index.php?p=12&ida=$ida&kb=$val[kd_brg]&na=$val[no_aset]'>$val[kendaraan]</a></font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[tahun]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[no_plat]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[no_plathitam]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[kd_brg]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[no_aset]</font></td>
							
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
	
