
	<link rel="stylesheet" type="text/css" href="../lib/tigra/1-simple-calendar/tcal.css" />
	<script type="text/javascript" src="../lib/tigra/1-simple-calendar/tcal.js"></script>
	
	
	<!-- container -->
	<div class="container">
		<?php
		$ida=$_GET['ida'];
		$nm=$_GET['nm'];
		$no=$_GET['no'];
		$id=$_GET['id'];
		?>
		<div class="row">
			<!-- Article main content -->
			<article class="maincontent">

			<section class="content-header">
 			   	<h1>
      			<i class="fa fa-edit icon-title"></i> Ubah Data Kendaraan Dinas Operasional
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
			

				<table width="100%">
				<?php
				include '../index_files/conndb3.php';
				$query1="select * from mst_kendaraandinas where sysid=$id";
				$result1=mysql_query($query1,$conn3) or die('Error, query failed');
				if ($val1=mysql_fetch_array($result1)) {
					$kendaraan=$val1['kendaraan'];
					$tahun=$val1['tahun'];
					$no_plat=$val1['no_plat'];
					$no_plathitam=$val1['no_plathitam'];
					$samsat=$val1['samsat'];
				}
				$errcode = $_GET['errcode'];
				if($errcode ==1) echo '<font class="txtwarning">Isikan data Nama dan No Telp !</font>'; 

				?>
				<form role="form" enctype="multipart/form-data" method="post" action="act_editkendaraanops.php">
					<tr>
						<td width="250" valign="top"><font class='txttablecontent'>Kode Barang<font color="#FF0000">&nbsp;*</font></font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:300px" id="a" class="form-control" name="kd_brg" type="text" value="<?php print $val1['kd_brg'];?>" disabled>
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="250" valign="top"><font class='txttablecontent'>NUP<font color="#FF0000">&nbsp;*</font></font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:300px" id="a" class="form-control" name="no_aset" type="text"  value="<?php print $val1['no_aset'];?>" disabled>
							</div>
						</td>
					 </tr>
					<tr>
						<td width="120" valign="top"><font class='txttablecontent'>Merk / Tipe Kendaraan</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:300px" id="a" class="form-control" name="kendaraan" type="text" value="<?php print $kendaraan;?>" >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Tahun</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:100px" id="a" class="form-control" name="tahun" type="text" value="<?php print $tahun;?>" >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Nomor Plat</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:100px" id="a" class="form-control" name="no_plat" type="text" value="<?php print $no_plat;?>" >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Nomor Plat Hitam</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:100px" id="a" class="form-control" name="no_plathitam" type="text" value="<?php print $no_plathitam;?>" >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="250" valign="top"><font class='txttablecontent'>Tanggal Pajak</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:300px" id="a" class="form-control" name="tgl_pajak" type="date" value="<?php print $val1['tgl_pajak'];?>" >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="250" valign="top"><font class='txttablecontent'>Tanggal Masa Berlaku</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:300px" id="a" class="form-control" name="masa_laku" type="date" value="<?php print $val1['masa_laku'];?>" >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="250" valign="top"><font class='txttablecontent'>Tanggal Masa Berlaku Plat Hitam</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:300px" id="a" class="form-control" name="masalaku_plathitam" type="date" value="<?php print $val1['masalaku_plathitam'];?>" >
							</div>
						</td>
					 </tr>
					 <tr>
						<td width="120" valign="top"><font class='txttablecontent'>Samsat</font></td>
						<td>
							<div class="form-group" style="padding-bottom:1px;">
							<input style="width:300px" id="a" class="form-control" name="samsat" type="text" value="<?php print $samsat;?>" >
							</div>
						</td>
					 </tr>
					 <tr>
						<td>
							<input type="hidden" name="ida" value=<?php print $ida;?>>
							<input type="hidden" name="id" value=<?php print $id;?>>
							<input type="hidden" name="nm" value="<?php print $nm;?>">
							<input type="hidden" name="no" value="<?php print $no;?>">
						</td>
						<td>
							<input type="submit" class="btn btn-primary" id="simpan" name="simpan" value="Simpan">
							<input type="submit" class="btn btn-danger" id="hapus" name="hapus" value="Hapus">
							<input type="submit" class="btn btn-secondary" id="batal" name="batal" value="Batal">
						</td>
					</tr>
				  </form>
				</table>

			</article>
			<!-- /Article -->
			

		</div>
	</div>	<!-- /container -->
	
