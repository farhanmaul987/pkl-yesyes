	<!-- container -->
	<div class="container">

		<div class="row">
			<!-- Article main content -->
			<article class="maincontent">

			<section class="content-header">
 			   	<h1>
      			<i class="fa fa-list-alt icon-title"></i> Daftar Kendaraan Dinas Operasional
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
					-
					<a href='../kendaraan/index.php?p=5&ida=<?php print $ida;?>' style='text-decoration: none'>Set Kendaraan Dinas</a>
				<?php }; 
				mysql_close();
				?>
				  </li>
				</ol>
				<br>
  			</section>
			  <div class="box box-primary">
        		<div class="box-body">
				
				<?php
				include '../index_files/conndb3.php';
				$query="select * from mst_kendaraandinas order by kendaraan";
				$result=mysql_query($query,$conn3) or die('Error, query failed');
				$no_urut = 1;
				?>
				<a href="index.php?p=6<?php print '&ida='.$ida;?>" class="btn btn-social btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
				</br><br>
				<?php
					if ($val=mysql_fetch_array($result)) { ?>
				<table id="dataTables1" class="table table-bordered table-striped table-hover">
					<thead>
					<tr>
						<?php
						$cfg_header=array("No","Jenis Kendaraan","Tahun", "Plat Nomor","Plat Hitam","Kode Barang","No Aset","");
						foreach ($cfg_header as $val1) {
							echo"<th bgcolor='#393E66'><font class='txttablehead'>".strtoupper($val1)."</font></th>";
						}?>
					</tr>
					</thead>
					<?php
						echo"
						<tr>
							<td style=vertical-align:top;width:40><font class='txttablecontent'>".$no_urut++."</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[kendaraan]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[tahun]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[no_plat]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[no_plathitam]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[kd_brg]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[no_aset]</font></td>
							<td style=vertical-align:top;width:90 align=center>
							<a href='index.php?p=15&ida=$ida&nm=$val[kendaraan]&no=$val[no_plat]&id=$val[sysid]' title='Ubah' style='margin-right:3px; margin-bottom:3px' class='btn btn-primary btn-sm'><i style='color:#fff' class='glyphicon glyphicon-edit'></i></a>
							</td>
						</tr>
						";
					while ($val=mysql_fetch_array($result)) {
						echo"
						<tr>
							<td style=vertical-align:top;width:40><font class='txttablecontent'>".$no_urut++."</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[kendaraan]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[tahun]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[no_plat]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[no_plathitam]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[kd_brg]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val[no_aset]</font></td>
							<td style=vertical-align:top;width:90 align=center>
							<a href='index.php?p=15&ida=$ida&nm=$val[kendaraan]&no=$val[no_plat]&id=$val[sysid]' title='Ubah' style='margin-right:3px; margin-bottom:3px' class='btn btn-primary btn-sm'><i style='color:#fff' class='glyphicon glyphicon-edit'></i></a>
							</td>
						</tr>
						";
					};mysql_close();
					
				echo "</table>";
				};
				
			?>
				</div>
			</div>

			</article>
			<!-- /Article -->
			

		</div>
	</div>	<!-- /container -->
	
