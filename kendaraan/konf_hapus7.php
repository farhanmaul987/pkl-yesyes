
<!-- container -->
	<div class="container">
		<?php
		$p=$_GET['p'];
		$pre=$_GET['pre'];
		$id=$_GET['id'];
		$nm=$_GET['nm'];
		$no=$_GET['no'];
		$ida=$_GET['ida'];
		
		if ($pre==5){
			$prelink="<a href='../kendaraan/index.php?p=5&ida=$ida' style='text-decoration: none'>Set Kendaraan Dinas</a> >";
			$warningtext=" $nm $no dari daftar Kendaraan Dinas Operasional ";
		} 
		if ($pre==8){
			$prelink="<a href='../kendaraan/index.php?p=8&ida=<?php print $ida;?>' style='text-decoration: none'>Set Driver</a> >";
			$warningtext=" dengan Nama $nm dari data Driver Kendaraan Operasional ";
		} 
		if ($pre==0){
			$prelink="<a href='../kendaraan/index.php?p=0&ida=<?php print $ida;?>' style='text-decoration: none'>Agenda kendaraan</a> >";
			$warningtext=" permintaan (penggunaan) kendaraan dinas untuk tanggal $nm ";
		} 
		?>

		<div class="row">
			<!-- Article main content -->
			<article class="maincontent">

			<section class="content-header">
 			   	<h1>
      			<i class="fa fa-info icon-title"></i> Konfirmasi Hapus Data
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
				
				<header class="page-header">
					<font class='txtstyleheader'>Konfirmasi Hapus Data</font>
				</header>
				<font class='txttablecontent'>Apakah anda yakin akan menghapus data <?php print $warningtext;?> ?</font>
				<br><br>
				<form role="form" method="post" action="act_hapusdata7.php">
				<input type="hidden" name="ida" value=<?php print $ida;?>>
				<input type="hidden" name="id" value="<?php print $id;?>">
				<input type="hidden" name="pre" value=<?php print $pre;?>>
				
				
				<input type="submit" class="btn btn-success" id="simpan" name="simpan" value="Ya">
				<input type="submit" class="btn btn-action" id="batal" name="batal" value="Tidak">
				</form>
				</div>
				</div>
			</article>
			<!-- /Article -->
			
		</div>
	</div>	<!-- /container -->