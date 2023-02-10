	<link rel="stylesheet" type="text/css" href="../lib/tigra/1-simple-calendar/tcal.css" />
	<script type="text/javascript" src="../lib/tigra/1-simple-calendar/tcal.js"></script>

	<!-- container -->
	<div class="container">
		<?php
		$kd_brg=$_GET['kb'];
		$no_aset=$_GET['na'];
		?>
		<div class="row">
			<!-- Article main content -->
			<article class="col-sm-8 maincontent">
				<font class='toplink'>
					<a href='../index_home/index.php?p=0' style='text-decoration: none'>Home</a> >
					<a href='../kendaraan/index.php?p=0&ida=<?php print $ida;?>' style='text-decoration: none'>Kendaraan Dinas Operasional</a> >
					<a href='../kendaraan/index.php?p=13&ida=<?php print $ida;?>' style='text-decoration: none'>Pajak Kendaraan</a> >
					<a href='../kendaraan/index.php?p=14&ida=<?php print $ida;?>&kb=<?php print $kd_brg;?>&na=<?php print $nup;?>' style='text-decoration: none'>Input Data Pembayaran</a>
				</font>
				<header class="page-header">
					<font class='txtstyleheader'>Informasi Aset</font>
				</header>
				<?php
				include '../index_files/conndb2.php';
				$query="select a.ur_gol,b.ur_bid,c.ur_kel,d.ur_skel,e.ur_sskel from t_gol a, t_bid b, t_kel c, t_skel d, t_sskel e where a.kd_gol=left('$kd_brg',1) and b.kd_bidbrg=left('$kd_brg',3) and c.kd_kelbrg=left('$kd_brg',5) and d.kd_skelbrg=left('$kd_brg',7) and e.kd_brg='$kd_brg'";
				$result=mysql_query($query,$conn2) or die('Error, query failed');
				if ($val=mysql_fetch_array($result)) {
					$nm_aset=$val['ur_sskel'];
				echo "
				<table border='1' cellspacing='2' cellpadding='2' style='border-collapse: collapse' bordercolor='#B4B4B4' width='100%'>
					<tr>
						<td style=vertical-align:top;width:140><font class='txttablecontent'>Golongan Aset</font></td>
						<td style=vertical-align:top><font class='txttablecontent'>$val[ur_gol]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width:140><font class='txttablecontent'>Bidang</font></td>
						<td style=vertical-align:top><font class='txttablecontent'>$val[ur_bid]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width:140><font class='txttablecontent'>Kelompok</font></td>
						<td style=vertical-align:top><font class='txttablecontent'>$val[ur_kel]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width:140><font class='txttablecontent'>Sub Kelompok</font></td>
						<td style=vertical-align:top><font class='txttablecontent'>$val[ur_skel]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width:140><font class='txttablecontent'>Nama</font></td>
						<td style=vertical-align:top><font class='txttablecontent'>$val[ur_sskel]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width:140><font class='txttablecontent'>Kode Barang/Aset</font></td>
						<td style=vertical-align:top><font class='txttablecontent'>$kd_brg/$no_aset</font></td>
					</tr>
				</table><br>";
				}
				$query="select * from t_masteru where kd_brg='$kd_brg' and no_aset=$no_aset and jns_trn<200 ";
				$result=mysql_query($query,$conn2) or die('Error, query failed');
				if ($val=mysql_fetch_array($result)) {
				echo "
				<table border='1' cellspacing='2' cellpadding='2' style='border-collapse: collapse' bordercolor='#B4B4B4' width='100%'>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Periode : $val[periode] &nbsp;&nbsp;&nbsp; Tahun Anggaran : $val[thn_ang]</font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>No SPPA : $val[no_sppa]  &nbsp;&nbsp;&nbsp; Kondisi : $val[kondisi]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Asal Perolehan : $val[asal_perlh]</font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>No Bukti : $val[no_bukti]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Tgl Perolehan : $val[tgl_perlh] &nbsp;&nbsp;&nbsp; Tgl Buku : $val[tgl_buku]</font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Kode KPKNL : $val[kdkpknl]  &nbsp;&nbsp;&nbsp; Kode KPPN : $val[kdkppn]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top><font class='txttablecontent'>Merk/Type : $val[merk_type]</font></td>
						<td style=vertical-align:top><font class='txttablecontent'>Nilai Perolehan (Rp) : ".number_format($val['rph_aset'],2,",",".")."</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top><font class='txttablecontent'>Keterangan :<br>$val[keterangan]</font></td>
						<td style=vertical-align:top><font class='txttablecontent'></font></td>
					</tr>";
					$query="select b.* from t_ruang b,t_dir d where b.kd_ruang=d.kd_ruang and d.kd_brg='$kd_brg' and d.no_aset=$no_aset";
					$result=mysql_query($query,$conn2) or die('Error, query failed');
					if ($val=mysql_fetch_array($result)) {
					echo "
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Lokasi(Ruang) : $val[ur_ruang]/$val[kd_ruang]</font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>PJ Ruang : $val[pj_ruang]/$val[nip_pjrug]</font></td>
					</tr>";
					};
					
					$query="select * from t_kangk where kd_brg='$kd_brg' and no_aset=$no_aset";
					$result1=mysql_query($query,$conn2) or die('Error, query failed');
					if ($val1=mysql_fetch_array($result1)) {
					echo "
					<tr>
						<td colspan=2 bgcolor='#808080'></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>No Kendaraan : <b>$val1[no_polisi]</b>  &nbsp;&nbsp;&nbsp; No BPKB : $val1[no_bpkb]</font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'> No Mesin: $val1[no_mesin] &nbsp;&nbsp;&nbsp; No Rangka : $val1[no_rangka]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Merk : $val1[merk] &nbsp;&nbsp;&nbsp; Type/CC : $val1[type]/$val1[daya]</font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Pabrik : $val1[pabrik]  &nbsp;&nbsp;&nbsp; Tahun Rakit/Buat : $val1[thn_rakit]/$val1[thn_buat]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'> Dari: $val1[dari] </font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Tgl Perl : $val1[tgl_prl]  &nbsp;&nbsp;&nbsp; Rp Aset : $val1[rph_aset]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'> No Dana: $val1[no_dana] &nbsp;&nbsp;&nbsp; Tgl Dana : $val1[tgl_dana]</font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Tgl Buku : $val1[tgl_buku]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'> Unit Pmk: $val1[unit_pmk]</font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Alamat Pmk : $val1[alm_pmk]</font></td>
					</tr>";
					};

					$query="select * from t_kbdg where kd_brg='$kd_brg' and no_aset=$no_aset";
					$result1=mysql_query($query,$conn2) or die('Error, query failed');
					if ($val1=mysql_fetch_array($result1)) {
					echo "
					<tr>
						<td colspan=2 bgcolor='#808080'></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Alamat : $val1[alamat]</font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'> Kelurahan: $val1[kd_kel] &nbsp;&nbsp;&nbsp; Kecamatan : $val1[kd_kec]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Luas Bangunan : $val1[luas_bdg] m2 &nbsp;&nbsp;&nbsp; Type/Jml Lantai : $val1[type]/$val1[jml_lt]</font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Tahun Selesai : $val1[thn_sls]  &nbsp;&nbsp;&nbsp; Tahun Pakai : $val1[thn_pakai]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>No IMB : $val1[no_imb] &nbsp;&nbsp;&nbsp; Tanggal IMB : $val1[tgl_imb]</font></td>
						<td style=vertical-align:top;width=50%></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'> Dari: $val1[dari] </font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>No Dana: $val1[no_dana] &nbsp;&nbsp;&nbsp; Tgl Dana : $val1[tgl_dana]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'> Unit Pmk: $val1[unit_pmk]</font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Alamat Pmk : $val1[alm_pmk]</font></td>
					</tr>";
					};
					
					$query="select * from t_ktnh where kd_brg='$kd_brg' and no_aset=$no_aset";
					$result1=mysql_query($query,$conn2) or die('Error, query failed');
					if ($val1=mysql_fetch_array($result1)) {
					echo "
					<tr>
						<td colspan=2 bgcolor='#808080'></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Alamat : $val1[alamat]</font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'> Kelurahan: $val1[kd_kel] &nbsp;&nbsp;&nbsp; Kecamatan : $val1[kd_kec]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Luas Tanah : $val1[luas_tnhs] m2 &nbsp;&nbsp;&nbsp; Bangunan : $val1[luas_tnhb] m2</font></td>
						<td style=vertical-align:top;width=50%></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Batas Utara : $val1[batas_u]</font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Batas Selatan : $val1[batas_s]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Batas Timur : $val1[batas_t]</font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Batas Barat : $val1[batas_b]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'> Dari: $val1[dari] </font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Tgl Perl : $val1[tgl_prl]  &nbsp;&nbsp;&nbsp; Rp Aset : $val1[rph_aset]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'> No Dana: $val1[no_dana] &nbsp;&nbsp;&nbsp; Tgl Dana : $val1[tgl_dana]</font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Tgl Buku : $val1[tgl_buku]</font></td>
					</tr>
					<tr>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'> Unit Pmk: $val1[unit_pmk]</font></td>
						<td style=vertical-align:top;width=50%><font class='txttablecontent'>Alamat Pmk : $val1[alm_pmk]</font></td>
					</tr>";
					};

				echo "</table>";
				};
				
				echo "<br><font class='txttablecontent'><b>Riwayat Aset</b></font>";
				$query="select a.*,b.ur_trn from t_masteru a,t_croleh b where a.jns_trn=b.jns_trn and a.kd_brg='$kd_brg' and a.no_aset=$no_aset order by tgl_buku";
				$result=mysql_query($query,$conn2) or die('Error, query failed1');
				if ($val2=mysql_fetch_array($result)) {
					$no=1;
					$rph_aset=0;
					echo "<table border='1' cellspacing='0' style='border-collapse: collapse' bordercolor='#B4B4B4' width='100%'>";
					$cfg_header=array("No","Tgl Buku","Jenis Transaksi","Rp Satuan","Rp Aset","Keterangan","No Bukti");
					foreach ($cfg_header as $val1) {
						echo"<th bgcolor='#808080'><font class='txttablehead'>".strtoupper($val1)."</font></th>";
					};
					$rph_aset=$rph_aset+$val2['rph_aset'];
					echo "
						<tr>
							<td style=vertical-align:top;width:40><font class='txttablecontent'>".$no++."</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val2[tgl_buku]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val2[ur_trn]</font></td>
							<td style=vertical-align:top align='right'><font class='txttablecontent'>".number_format($val2['rph_sat'],2,",",".")."</font></td>
							<td style=vertical-align:top align='right'><font class='txttablecontent'>".number_format($rph_aset,2,",",".")."</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val2[keterangan]</font></td>
							<td style=vertical-align:top><font class='txttablecontent'>$val2[no_bukti]</font></td>
						</tr>
					";
					while ($val2=mysql_fetch_array($result)) {
					$rph_aset=$rph_aset+$val2['rph_aset'];
					echo "
					<tr>
						<td style=vertical-align:top;width:40><font class='txttablecontent'>".$no++."</font></td>
						<td style=vertical-align:top><font class='txttablecontent'>$val2[tgl_buku]</font></td>
						<td style=vertical-align:top><font class='txttablecontent'>$val2[ur_trn]</font></td>
						<td style=vertical-align:top align='right'><font class='txttablecontent'>".number_format($val2['rph_sat'],2,",",".")."</font></td>
						<td style=vertical-align:top align='right'><font class='txttablecontent'>".number_format($rph_aset,2,",",".")."</font></td>
						<td style=vertical-align:top><font class='txttablecontent'>$val2[keterangan]</font></td>
						<td style=vertical-align:top><font class='txttablecontent'>$val2[no_bukti]</font></td>
					</tr>
					";};
					echo "</table>";
				};
				
				mysql_close();
				include '../index_files/conndb3.php';
				$query1="select * from tbl_datadukung_aset where kd_brg='$kd_brg' and no_aset=$no_aset";
				$result1=mysql_query($query1,$conn3) or die('Error, query1 failed');
				if ($val1=mysql_fetch_array($result1)) {
					$spesifikasi=$val1['spesifikasi'];
					$keterangan=$val1['keterangan'];
					$pengguna=$val1['pengguna'];
					$kondisi=$val1['kondisi'];
					$file_gb1=$val1['file_gb1'];
					$file_gb2=$val1['file_gb2'];
				};
				if (empty($file_gb1)) $file_gb1='no_image.jpg';
				if (empty($file_gb2)) $file_gb2='no_image.jpg';
				?>
				<br>
				<table cellspacing="2" cellpadding="4" width="100%">
					<tr>
						<td colspan=2><img border="1" src="../assetbmn/ref_images/<?php print $file_gb1;?>" height="200">
						<img border="1" src="../assetbmn/ref_images/<?php print $file_gb2;?>" height="200"></td>
					</tr>
					<tr>
						<td width='120' valign='top'><font class='txttablecontent'>Spesifikasi</font></td>
						<td><font class='txttablecontent'>: <?php print $spesifikasi;?></font></td>
					</tr>
					<tr>
						<td width='120' valign='top'><font class='txttablecontent'>Keterangan</font></td>
						<td><font class='txttablecontent'>: <?php print $keterangan;?></font></td>
					</tr>
					<tr>
						<td width='120' valign='top'><font class='txttablecontent'>Pengguna</font></td>
						<td><font class='txttablecontent'>: <?php print $pengguna;?></font></td>
					</tr>
					<tr>
						<td width='120' valign='top'><font class='txttablecontent'>Kondisi saat ini</font></td>
						<td><font class='txttablecontent'>: <?php print $kondisi;?></font></td>
					</tr>

					<form role="form" method="post" action="act_inppajak.php">
					<?php
					$query1="select * from mst_kendaraandinas where kd_brg='$kd_brg' and no_aset=$no_aset";
					$result1=mysql_query($query1,$conn3) or die('Error, query failed');
					if ($val1=mysql_fetch_array($result1)) {
						$no_plat=$val1['no_plat'];
						$no_plathitam=$val1['no_plathitam'];
						$samsat=$val1['samsat'];
					}
					?>
					<tr>
						<td colspan='2' height='40' valign='bottom'><font class='txttablecontent'><b>Input Data Pembayaran Pajak</b></font></td>
					</tr>
					<tr>
						<td width='120' valign='top'><font class='txttablecontent'>Plat Merah</font></td>
						<td><font class='txttablecontent'>: <?php print $no_plat;?></font></td>
					</tr>
					<tr>
						<td width='120' valign='top'><font class='txttablecontent'>Tanggal Pembayaran</font></td>
						<td><font class='txttablecontent'>: 
						<input style="width:100px"  class="tcal" name="tgl_pajak" type="text" value="<?php print date('Y-m-d');?>" autofocus> </font></td>
					</tr>
					<tr>
						<td width='120' valign='top'><font class='txttablecontent'>Masa Berlaku</font></td>
						<td><font class='txttablecontent'>: 
						<input style="width:100px"  class="tcal" name="masa_laku" type="text" value="<?php print date('Y-m-d');?>" autofocus> </font></td>
					</tr>
					<tr>
						<td width='120' valign='top'><font class='txttablecontent'>Samsat</font></td>
						<td><font class='txttablecontent'>: <input style="width: 300px" id="samsat" name="samsat" value="<?php print $samsat;?>"/></font></td>
					</tr>
					<tr>
						<td width='120' valign='top'><font class='txttablecontent'>Plat Hitam</font></td>
						<td><font class='txttablecontent'>: <?php print $no_plathitam;?></font></td>
					</tr>
					<tr>
						<td width='120' valign='top'><font class='txttablecontent'>Masa Berlaku</font></td>
						<td><font class='txttablecontent'>: 
						<input style="width:100px"  class="tcal" name="masalaku_plathitam" type="text" value="<?php print date('Y-m-d');?>" autofocus> </font></td>
					</tr>
					<tr>
						<td height='40'>
							<input type="hidden" name="kd_brg" value="<?php print $kd_brg;?>"/>
							<input type="hidden" name="no_aset" value="<?php print $no_aset;?>"/>
							<input type="hidden" name="ida" value="<?php print $ida;?>"/>
							<input type="hidden" name="k" value="<?php print $k;?>"/>
							<input type="hidden" name="nm_aset" value="<?php print $nm_aset;?>"/>
						</td>
						<td><font class='txttablecontent'>&nbsp;
							<input type="submit" class="btn btn-lg btn-success" id="simpan" name="simpan" value="Proses">
							<input type="submit" class="btn btn-lg btn-action" id="batal" name="batal" value="Batal"> </font></td>
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
	
