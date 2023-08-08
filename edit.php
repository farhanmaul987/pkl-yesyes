<?php
include('./index_files/conndb3.php');

$result    = mysqli_query(connection(), "SELECT * FROM t_pinjam,t_ruangan WHERE t_pinjam.id_ruangan = t_ruangan.id_ruangan and id_pinjam = '$_GET[id_pinjam]'");
?>

<?php 
    if (isset($_POST['proses'])) {
        $namaUpd = $_POST['namaUpd'];
        $keperluanUpd = $_POST['keperluanUpd'];
        $telpUpd = $_POST['telpUpd'];
        $ruanganUpd = $_POST['ruanganUpd'];
        $tanggalUpd = $_POST['tanggalUpd'];
        $waktuUpd = $_POST['waktuUpd'];
        $statusUpd = $_POST['statusUpd'];
    
        // Update data pada tabel t_pinjam
        mysqli_query(connection(), "UPDATE t_pinjam SET nama = '$namaUpd', keperluan = '$keperluanUpd', telp = '$telpUpd', id_ruangan = '$ruanganUpd', tanggal = '$tanggalUpd', waktu = '$waktuUpd', status = '$statusUpd' WHERE id_pinjam = $_GET[id_pinjam]");
        
        // Loop through existing sarana data and update quantities and descriptions
        foreach ($_POST['jml'] as $id_barang => $jml) {
            $ket = $_POST['ket'][$id_barang];
    
            if ($jml != NULL && $jml != 0) {
                // Update existing sarana data
                mysqli_query(connection(), "UPDATE t_pinjamBarang SET jumlah = $jml, keterangan = '$ket' WHERE id_pinjam = $_GET[id_pinjam] AND id_barang = $id_barang");
            }
        }
        echo "<script>window.location='status.php';</script>";
    } 
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/BPK-Logo.png" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/style.css">
    <title>SIPERU</title>
</head>

<body>
    <section class="sidebarr">
        <?php
        include('./sidebar/sidebar.php')
        ?>
    </section>

    <section class="main">
        <div class="title">Form Ajuan Peminjaman Ruang Rapat</div>

        <div class="forms">
            <?php while ($data = mysqli_fetch_array($result)) : ?>
                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                <form role="form" action="" enctype="multipart/form-data" method="POST" autocomplete="off">
                    <div class="inputCont">
                        <label class="labnam" for="nama">Nama :</label>
                        <input class="innam" type="text" name="namaUpd" id="nama" value="<?= $data['nama']; ?> " readonly>

                        <label class="labkep" for="keperluan">Keperluan :</label>
                        <input class="inkep" type="text" name="keperluanUpd" id="keperluan" value="<?= $data['keperluan']; ?>" readonly>

                        <label class="labtel" for="telp">Nomor Telepon :</label>
                        <input class="intel" type="text" name="telpUpd" id="telp" value="<?= $data['telp']; ?>" readonly>

                        <label class="labru" for="ruanganUpd">Ruangan :</label>
                        <select class="inru" id="ruanganUpd" name="ruanganUpd" size="1">
                            <option value="<?= $data['id_ruangan']; ?>" selected><?= $data['n_ruangan']; ?></option>
                            <?php
                            $queryy  = "SELECT * FROM t_ruangan";
                            $resultt = mysqli_query(connection(), $queryy);

                            while ($val = mysqli_fetch_array($resultt)) {
                            ?>
                                <option value="<?= $val['id_ruangan']; ?>">
                                    <?= $val['n_ruangan']; ?>
                                </option>
                            <?php }; ?>
                        </select>

                        <label class="labtan" for="tanggalUpd">Tanggal :</label>
                        <input class="intan" type="date" name="tanggalUpd" id="tanggalUpd" name="tanggalUpd" value="<?= $data['tanggal']; ?>">

                        <label class="labwa" for="Upd">Waktu :</label>
                        <input class="inwa" type="time" name="waktuUpd" id="Upd" value="<?= $data['waktu']; ?>">

                        <label class="labsta" for="statusUpd">Status :</label>
                        <select class="insta" id="statusUpd" name="statusUpd" size="1">
                            <option value="Pending" selected>Pending</option>
                            <option value="Diterima">Diterima</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Selesai">Selesai</option>
                        </select>

                        <label class="labsar1" for="sarana">Sarana :</label>
                        <svg id="sar-btn1" class="insar1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M11 17h2v-4h4v-2h-4V7h-2v4H7v2h4v4Zm-6 4q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.588 1.413T19 21H5Z" />
                        </svg>

                        <label class="labket1" for="tambahan">Tambahan :</label>
                        <svg id="sar-btn2" class="inket1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M11 17h2v-4h4v-2h-4V7h-2v4H7v2h4v4Zm-6 4q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.588 1.413T19 21H5Z" />
                        </svg>

                        <div id="modal1" class="mdl-sar-cont">
                            <div class="mdl-alat-sar">
                                <div>
                                    <div class="mdl-head">
                                        <h2 class="t-table">Pilih Sarana Ruangan</h2>
                                        <svg id="cls1" class=" close" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z" />
                                        </svg>
                                    </div>

                                    <table class="table-sar">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Perlengkapan</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                        </tr>
                                        <?php
                                        $query2  = "SELECT a.*, b.n_barang FROM t_pinjambarang a, t_barang b WHERE a.id_pinjam = '$_GET[id_pinjam]' and b.id_barang = a.id_barang";
                                        $result2 = mysqli_query(connection(), $query2);
                                        $no = 1;
                                        // $no1 = $no2 = $no3 = $no4 = 0;

                                        while ($data2 = mysqli_fetch_array($result2)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data2['n_barang']; ?></td>
                                                <td><input class="box" type="number" name="jml[<?php echo $data2['id_barang']; ?>]" value="<?php echo $data2['jumlah']; ?>"></td>
                                                <td><input class="box1" type="text" name="ket[<?php echo $data2['id_barang']; ?>]" value="<?php echo $data2['keterangan']; ?>"></td>
                                            </tr>
                                        <?php }; ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div id="modal2" class="mdl-ket-cont">
                            <div class="mdl-ket">
                                <div>
                                    <div class="mdl-head">
                                        <h2 class="t-table">Silakan Isi Permintaan Tambahan</h2>
                                        <svg id="cls2" class="close" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z" />
                                        </svg>
                                    </div>
                                    <div class="textArea">
                                        <textarea name="tambahan" id="req" cols="100" rows="20" value=""><?php echo $data['tambahan'] ?></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <input class="button" type="submit" value="Kumpulkan" name="proses" />
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>