<?php
    include('./index_files/conndb3.php');

    $result    = mysqli_query(connection(), "SELECT * FROM t_pinjam,t_ruangan WHERE t_pinjam.id_ruangan = t_ruangan.id_ruangan and id_pinjam = '$_GET[id_pinjam]'");
    // var_dump(mysqli_fetch_array($result2));
    // die();
?>

<?php if (isset($_POST['proses'])) {
    mysqli_query(connection(), "UPDATE t_pinjam SET nama = '$_POST[namaUpd]', keperluan='$_POST[keperluanUpd]', telp='$_POST[telpUpd]', id_ruangan='$_POST[ruanganUpd]', tanggal='$_POST[tanggalUpd]', waktu='$_POST[waktuUpd]', status='$_POST[statusUpd]' WHERE id_pinjam=$_GET[id_pinjam]");

    // echo"<script>alert('Data berhasil dikonfirmasi'); window.location='status.php';</script>";
    echo"<script>window.location='status.php';</script>";
}?>

<script>window.location</script>
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
                <li class="drop-btn">
                    <p>Dropdown</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m12 15.4l-6-6L7.4 8l4.6 4.6L16.6 8L18 9.4l-6 6Z"/></svg>
                </li>
                <div class="drop">
                    <a href="index.php"><li>Ruangan 1</li></a>
                    <a href=""><li>Ruangan 2</li></a>
                    <a href=""><li>Ruangan 3</li></a>
                    <a href=""><li>Ruangan 4</li></a>
                    <a href=""><li>Ruangan 5</li></a>
                </div>
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
                        </select>

                        <label class="labsar1" for="sarana">Sarana :</label>
                        <svg id="sar-btn1" class="insar1" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24"><path d="M11 17h2v-4h4v-2h-4V7h-2v4H7v2h4v4Zm-6 4q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.588 1.413T19 21H5Z"/></svg>
                        
                        <label class="labket1" for="tambahan">Tambahan :</label>
                        <svg id="sar-btn2" class="inket1" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24"><path d="M11 17h2v-4h4v-2h-4V7h-2v4H7v2h4v4Zm-6 4q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.588 1.413T19 21H5Z"/></svg>

                        <div id="modal1" class="mdl-sar-cont">
                        <div class="mdl-alat-sar">
                            <div>
                                <div class="mdl-head">
                                    <h2 class="t-table">Pilih Sarana Ruangan</h2>
                                    <svg id="kntl1" class="close" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z"/></svg>
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
                                    $no1 = $no2 = $no3 = $no4 = 0;

                                    while ($data2 = mysqli_fetch_array($result2)) {
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data2['n_barang']; ?></td>
                                        <td><input class="box" type="number" name="jml<?php echo $no1++;?>" id="jml<?php echo $no2++;?>" value="<?php echo $data2['jumlah'] ?>"></td>
                                        <td><input class="box1" type="text" name="ket<?php echo $no3++;?>" id="ket<?php echo $no4++;?> "value="<?php echo $data2['keterangan']?>" ></td>
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
                                    <svg id="kntl2" class="close" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z"/></svg>
                                </div>
                                <div class="textArea">
                                    <textarea name="req" id="req" cols="100" rows="20"></textarea>
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

    <script src="script.js"></script>

</body>

</html>