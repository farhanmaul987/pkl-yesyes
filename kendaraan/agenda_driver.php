	<!-- container -->
	<div class="container">

		<div class="row">
			<!-- Article main content -->
			<article class="maincontent">
			<section class="content-header">
 			   	<h1>
      			<i class="fa fa-car icon-title"></i> Agenda Kendaraan Dinas Operasional dan Driver
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

				<font class='txttablecontent'>Hari : <?php print $hari[date('w')].', '.date('j ').$bulan[date('n')-1].date(' Y');?></font>
				<br><br>
				<?php
				$tgl_sekarang=date('Y-m-d');
				$start=0;
				include '../index_files/conndb3.php';
				$query="select * from tbl_agenda_driver where (tgl_agenda>='$tgl_sekarang' or tgl_agenda2>='$tgl_sekarang') and konfirm=1 order by f_selesai,tgl_agenda desc";
				$result=mysql_query($query,$conn3) or die('Error, query failed');
				$no_urut = 1;
				if ($val=mysql_fetch_array($result)) {
				
				?>
				<table id="dataTables1" class="table table-bordered table-striped table-hover">
					<thead>
					<tr>
						<?php
						$cfg_header=array("No","Tanggal<br>Jam","Kendaraan<br>Driver","Satker<br>Keperluan","Tujuan<br>No SPD","Pulang","User Req");
						foreach ($cfg_header as $val1) {
							echo"<th bgcolor='#393E66'><font class='txttablehead'>".strtoupper($val1)."</font></th>";
						}?>
					</tr>
					</thead>
					<?php

					echo"
						<tr  bgcolor='#CEF6CE'>
							<td style='vertical-align:top;width:25'><font class='txttablecontent'>".$no_urut++."</font><br></td>";
							if (($val[tgl_agenda]==$val[tgl_agenda2]) or ($val[tgl_agenda2]='0000-00-00')){
							echo "
							<td style='vertical-align:top;width:100'><font class='txttablecontent'>$val[tgl_agenda]<br>$val[jam]</font></td>";
							}else{
							echo "
							<td style='vertical-align:top;width:100'><font class='txttablecontent'>$val[tgl_agenda]<br>$val[jam]<br>s.d.<br>$val[tgl_agenda2]<br>$val[jam2]</font></td>";
							};
							echo "
							<td style='vertical-align:top;width:160'><font class='txttablecontent'>$val[kendaraan]<br>$val[driver]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[satker]<br>$val[keperluan]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[kota_tujuan]<br>$val[no_spd]</font></td>
							<td style='vertical-align:top;width:100'><font class='txttablecontent'>$val[pulang]</font></td>
							<td style='vertical-align:top;width:100'><font class='txttablecontent'>$val[userins]</font></td>";
							if ($_SESSION['ses_usrakses']=='Superuser'){
							echo "
							<td style='width:80' align='right'><font class='rightlink'><a href='index.php?p=16&ida=$ida&id=$val[sysid]' style='text-decoration: none'>...Update<img src='../images/edit_icon.png' height='22' align='right'></a></font></td>";
							};
						echo "
						</tr>
						";
					while ($val=mysql_fetch_array($result)) {
						echo"
						<tr bgcolor='#CEF6CE'>
							<td style='vertical-align:top;width:25'><font class='txttablecontent'>".$no_urut++."</font><br></td>";
							if (($val[tgl_agenda]==$val[tgl_agenda2]) or ($val[tgl_agenda2]='0000-00-00')){
							echo "
							<td style='vertical-align:top;width:100'><font class='txttablecontent'>$val[tgl_agenda]<br>$val[jam]</font></td>";
							}else{
							echo "
							<td style='vertical-align:top;width:100'><font class='txttablecontent'>$val[tgl_agenda]<br>$val[jam]<br>s.d.<br>$val[tgl_agenda2]<br>$val[jam2]</font></td>";
							};
							echo "
							<td style='vertical-align:top;width:160'><font class='txttablecontent'>$val[kendaraan]<br>$val[driver]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[satker]<br>$val[keperluan]</font></td>
							<td style='vertical-align:top'><font class='txttablecontent'>$val[kota_tujuan]<br>$val[no_spd]</font></td>
							<td style='vertical-align:top;width:100'><font class='txttablecontent'>$val[pulang]</font></td>
							<td style='vertical-align:top;width:100'><font class='txttablecontent'>$val[userins]</font></td>";
							if ($_SESSION['ses_usrakses']=='Superuser'){
							echo "
							<td style='width:80' align='right'><font class='rightlink'><a href='index.php?p=16&ida=$ida&id=$val[sysid]' style='text-decoration: none'>...Update<img src='../images/edit_icon.png' height='22' align='right'></a></font></td>";
							};
						echo "
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
      			<i class="fa fa-list-alt icon-title"></i> Permintaan Penggunaan Kendaraan Dinas Operasional dan Driver
				</h1>
				<br>
  		</section>
			  <div class="box box-primary">
        		<div class="box-body">
			<?php
			$start=0;
			include '../index_files/conndb3.php';
			$query="select * from tbl_agenda_driver where konfirm=0 order by tgl_agenda & jam desc";
			$result=mysql_query($query,$conn3) or die('Error, query failed');
			$no_urut = 1;
			if ($val=mysql_fetch_array($result)) {
			
			?>
				<table id="dataTables1" class="table table-bordered table-striped table-hover">
				<thead>
				<tr>
					<?php
					$cfg_header=array("No","Tanggal<br>Jam","Kendaraan","Satker<br>Keperluan","Tujuan/No SPD","User Req");
					foreach ($cfg_header as $val1) {
						echo"<th bgcolor='#393E66'><font class='txttablehead'>".strtoupper($val1)."</font></th>";
					}?>
				</tr>
				</thead>
				<?php

				echo"
					<tr bgcolor='#F5F6CE'>
						<td style='vertical-align:top;width:25'><font class='txttablecontent'>".$no_urut++."</font><br></td>";
						if ($_SESSION['ses_usrakses']=='Superuser'){
							echo "
							<td style='vertical-align:top;width:100'><font class='txttablecontent'><a href='index.php?p=4&ida=$ida&s_id=$val[sysid]' style='text-decoration: none'>$val[tgl_agenda] $val[jam]</a></font></td>";
							}else{;
							echo "
							<td style='vertical-align:top;width:100'><font class='txttablecontent'>$val[tgl_agenda] $val[jam]</font></td>";
							};
						echo "
						<td style='vertical-align:top;width:160'><font class='txttablecontent'>$val[kendaraan]<br>$val[driver]</font></td>
						<td style='vertical-align:top'><font class='txttablecontent'>$val[satker]<br>$val[keperluan]</font></td>
						<td style='vertical-align:top'><font class='txttablecontent'>$val[kota_tujuan]<br>$val[no_spd]</font></td>
						<td style='vertical-align:top;width:100'><font class='txttablecontent'>$val[userins]</font></td>";
						if ($_SESSION['ses_usrname']==$val['userins']){
						echo "
						<td style='width:80' align='right'><font class='rightlink'><a href='index.php?p=7&pre=0&ida=$ida&nm=$val[tgl_agenda]&id=$val[sysid]' style='text-decoration: none'>...Batal<img src='../images/del1_icon.png' height='22' align='right'></a></font></td>";
						};
					echo "</tr>
					";
				while ($val=mysql_fetch_array($result)) {
					echo"
					<tr bgcolor='#F5F6CE'>
						<td style='vertical-align:top;width:25'><font class='txttablecontent'>".$no_urut++."</font><br></td>";
						if ($_SESSION['ses_usrakses']=='Superuser'){
							echo "
							<td style='vertical-align:top;width:100'><font class='txttablecontent'><a href='index.php?p=4&ida=$ida&s_id=$val[sysid]' style='text-decoration: none'>$val[tgl_agenda]<br>$val[jam]</a></font></td>";
							}else{;
							echo "
							<td style='vertical-align:top;width:100'><font class='txttablecontent'>$val[tgl_agenda]<br>$val[jam]</font></td>";
							};
						echo "
						<td style='vertical-align:top;width:160'><font class='txttablecontent'>$val[kendaraan]<br>$val[driver]</font></td>
						<td style='vertical-align:top'><font class='txttablecontent'>$val[satker]<br>$val[keperluan]</font></td>
						<td style='vertical-align:top'><font class='txttablecontent'>$val[kota_tujuan]<br>$val[no_spd]</font></td>
						<td style='vertical-align:top;width:100'><font class='txttablecontent'>$val[userins]</font></td>";
						if ($_SESSION['ses_usrname']==$val['userins']){
						echo "
						<td style='width:80' align='right'><font class='rightlink'><a href='index.php?p=7&pre=0&ida=$ida&nm=$val[tgl_agenda]&id=$val[sysid]' style='text-decoration: none'>...Batal<img src='../images/del1_icon.png' height='22' align='right'></a></font></td>";
						};
					echo "</tr>
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
      			<i class="fa fa-list-alt icon-title"></i> Permintaan Penggunaan Kendaraan Dinas Operasional Yang <strong>Tidak Bisa Dipenuhi</strong>
				</h1>
				<br>
  		</section>
			  <div class="box box-primary">
        		<div class="box-body">
			<?php
			$start=0;
			include '../index_files/conndb3.php';
			$query="select * from tbl_agenda_driver where konfirm=2 and tgl_agenda >='$tgl_sekarang'";
			$result=mysql_query($query,$conn3) or die('Error, query failed');
			$no_urut = 1;
			if ($val=mysql_fetch_array($result)) {
			
			?>
			<table border="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#7380E7" width="100%">
				<thead>
				<tr>
					<?php
					$cfg_header=array("No","Tanggal<br>Jam","Kendaraan,<br>Driver","Satker,br>Keperluan","Tujuan,br>No SPD","User Req");
					foreach ($cfg_header as $val1) {
						echo"<th bgcolor='#393E66'><font class='txttablehead'>".strtoupper($val1)."</font></th>";
					}?>
				</tr>
				</thead>
				<?php

				echo"
					<tr bgcolor='#F6CECE'>
						<td style='vertical-align:top;width:25'><font class='txttablecontent'>".$no_urut++."</font><br></td>
						<td style='vertical-align:top;width:100'><font class='txttablecontent'>$val[tgl_agenda]<br>$val[jam]</font></td>
						<td style='vertical-align:top;width:160'><font class='txttablecontent'>$val[kendaraan]<br>$val[driver]</font></td>
						<td style='vertical-align:top'><font class='txttablecontent'>$val[satker]<br>$val[keperluan]</font></td>
						<td style='vertical-align:top'><font class='txttablecontent'>$val[kota_tujuan]<br>$val[no_spd]</font></td>
						<td style='vertical-align:top;width:100'><font class='txttablecontent'>$val[userins]</font></td>
					</tr>
					";
				while ($val=mysql_fetch_array($result)) {
					echo"
					<tr bgcolor='#F6CECE'>
						<td style='vertical-align:top;width:25'><font class='txttablecontent'>".$no_urut++."</font><br></td>
						<td style='vertical-align:top;width:100'><font class='txttablecontent'>$val[tgl_agenda]<br>$val[jam]</font></td>
						<td style='vertical-align:top;width:160'><font class='txttablecontent'>$val[kendaraan]<br>$val[driver]</font></td>
						<td style='vertical-align:top'><font class='txttablecontent'>$val[satker]<br>$val[keperluan]</font></td>
						<td style='vertical-align:top'><font class='txttablecontent'>$val[kota_tujuan]<br>$val[no_spd]</font></td>
						<td style='vertical-align:top;width:100'><font class='txttablecontent'>$val[userins]</font></td>
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
	
