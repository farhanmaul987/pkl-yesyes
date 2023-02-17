<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('index_files/conndb3.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_pinjam'])) {
          //query SQL
          $id_pinjamUpd = $_GET['id_pinjam'];
          $query = "SELECT * FROM t_pinjam WHERE id_pinjam = '$id_pinjamUpd'";

          //eksekusi query
          $result = mysqli_query(connection(), $query);
      }
  }
//   melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_pinjam = $_POST['id_pinjam'];
        // $id_ruangan = $_POST['id_ruangan'];

        $nama = $_POST['nama'];
        $keperluan  = $_POST['keperluan'];
        $telp  = $_POST['telp'];
        $id_ruanganUpd  = $_POST['id_ruangan'];
        $tanggalUpd  = $_POST['tanggal'];
        $waktuUpd  = $_POST['waktu'];
        //query SQL
        $sql = "UPDATE t_pinjam 
                 SET nama='$nama', keperluan='$keperluan', telp='$telp', id_ruangan='$id_ruanganUpd', tanggal='$tanggalUpd', waktu='$waktuUpd' 
                 WHERE id_pinjam='$id_pinjam'";
        $result = mysqli_query(connection(), $sql);
    // if (isset($_POST['update'])) {
    //     // $sql = "UPDATE t_pinjam 
    //     //         INNER JOIN t_ruangan 
    //     //         ON t_pinjam.id_ruangan = t_ruangan.id_ruangan 
    //     //         SET nama='$nama', keperluan='$keperluan', telp='$telp', id_ruangan='$id_ruanganUpd', tanggal='$tanggalUpd', waktu='$waktuUpd' 
    //     //         WHERE id_pinjam='$id_pinjam' and id_ruangan='$id_ruanganUpd'";
  
    //     //eksekusi query
    //     if ($result) {
    //       $status = 'ok';
    //     }
    //     else{
    //       $status = 'err';
    //     }
    // }

      //redirect ke halaman lain
      echo"<script>window.location='status.php';</script>";
  }
    // if (isset($_POST['update'])) {
    //     $id_pinjam = $_POST['id_pinjam'];
    //     $id_ruangan= $_POST['id_ruangan'];

    //     $nama	            = ($_POST['nama']);
    //     $keperluan		    = ($_POST['keperluan']);
    //     $telp		        = ($_POST['telp']);
    //     $ruangan            = ($_POST['ruangan']);
    //     $tanggal            = ($_POST['tanggal']);
    //     $waktu              = ($_POST['waktu']);

    //     $query  = "UPDATE t_pinjam SET nama='$nama', keperluan='$keperluan', telp='$telp', id_ruangan='$ruangan', tanggal='$tanggal', waktu='$waktu' WHERE id_pinjam='$id_pinjam' and id_ruangan = '$id_ruangan'";
        
    //     $result  = mysqli_query(connection(), $query) or die('Error, update query failed');

    //     header('Loacation : status.php');
    // }
?>

<?php
//   if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//       if (isset($_GET['id_pinjam'])) {
//           //query SQL
//           $id_pinjam = $_GET['id_pinjam'];
//           $query = "SELECT * FROM t_pinjam WHERE id_pinjam = '$id_pinjam'";

//           //eksekusi query
//           $result = mysqli_query(connection(), $query) or die('Error');
//       }
//   }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/BPK-Logo.png" />
    <link rel="stylesheet" href="style.css">
    <title>SIPERU</title>
</head>


<body>
    <section class="sidebarr">
        <div class="sidebar">
            <img class="logo" src="./assets/cropped-Logo-BPK-crop.png" alt="Logo BPK">
            <ul>
                <a href="./konf_agendaruangan.php">
                    <li>Konfirmasi Peminjaman</li>
                </a>
                <a href="./add_agendaruangan.php">
                    <li>Form Peminjaman</li>
                </a>
                <a href="./status.php">
                    <li>Status Ajuan</li>
                </a>
            </ul>
        </div>

        <div class="sidebarDum">
            <img class="logo" src="./assets/cropped-Logo-BPK-crop.png" alt="Logo BPK">
            <ul>
                <a href="./konf_agendaruangan.php">
                    <li>Konfirmasi Peminjaman</li>
                </a>
                <a href="./index.php">
                    <li>Form Peminjaman</li>
                </a>
                <a href="./status.php">
                    <li>Status Ajuan</li>
                </a>
            </ul>
        </div>
    </section>

    <section class="main">
        <div class="title">Form Ajuan Peminjaman Ruang Rapat</div>

        <div class="forms">
        <?php while($data = mysqli_fetch_array($result)): ?>
            <?php date_default_timezone_set('Asia/Jakarta');?>
            <form role="form" action=" " enctype="multipart/form-data" method="POST">
                <div class="inputCont">
                    <label class="labnam" for="nama">Nama :</label>
                    <input class="box innam" type="text" name="nama" id="nama" value="<?php echo $data['nama'];?>" readonly>

                    <label class="labkep" for="keperluan">Keperluan :</label>
                    <input class="box inkep" type="text" name="keperluan" id="keperluan" value="<?php echo $data['keperluan'];?>" readonly>

                    <label class="labtel" for="telp">Nomor Telepon :</label>
                    <input class="box intel" type="text" name="telp" id="telp" value="<?php echo $data['telp'];?>" readonly>

                    <label class="labru" for="ruangan">Ruangan :</label>
                    <select class="box inru" id="ruangan" name="id_ruangan" size="1">
                        <option value="<?php echo $data['id_ruangan'];?>" selected><?php echo $data['id_ruangan'];?></option>
                        <?php 
                            $query  = "SELECT * FROM t_ruangan";
                            $result = mysqli_query(connection(), $query);

                            while ($val = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?= $val['id_ruangan'];?>">
                                    <?= $val['n_ruangan'];?>
                                </option>
                        <?php };?>
                    </select>
                    <!--<input class="box inru" type="text" name="ruang" id="ruang">-->

                    <label class="labtan" for="tanggal">Tanggal :</label>
                    <input class="box1 intan" type="date" name="tanggal" id="tanggal" name="tanggal" value="<?= $data['tanggal'];?>">

                    <label class="labwa" for="waktu">Waktu :</label>
                    <input class="box2 inwa" type="time" name="waktu" id="waktuUpd" value="<?= $data['waktu'];?>">

                    <input class="button" type="submit" value="Kumpulkan" name="update" />
                </div>
            </form>
            <?php endwhile; ?>
        </div>

        <div class="footerCont">
            <div class="footer">
                <p class="p1">Copyright 2023 PKL UPNVJT </p>
                <p class="p2">@SIPERU</p>
            </div>
        </div>
    </section>

</body>

</html>