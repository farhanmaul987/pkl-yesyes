<?php
    include('./index_files/conndb3.php');

    $result    = mysqli_query(connection(), "SELECT * FROM t_pinjam,t_ruangan WHERE t_pinjam.id_ruangan = t_ruangan.id_ruangan and id_pinjam = '$_GET[id_pinjam]'");
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
                <form role="form" action="" enctype="multipart/form-data" method="POST">
                    <div class="inputCont">
                        <label class="labnam" for="nama">Nama :</label>
                        <input class="box innam" type="text" name="namaUpd" id="nama" value="<?= $data['nama']; ?> " readonly>

                        <label class="labkep" for="keperluan">Keperluan :</label>
                        <input class="box inkep" type="text" name="keperluanUpd" id="keperluan" value="<?= $data['keperluan']; ?>" readonly>

                        <label class="labtel" for="telp">Nomor Telepon :</label>
                        <input class="box intel" type="text" name="telpUpd" id="telp" value="<?= $data['telp']; ?>" readonly>

                        <label class="labru" for="ruanganUpd">Ruangan :</label>
                        <select class="box inru" id="ruanganUpd" name="ruanganUpd" size="1">
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
                        <input class="box1 intan" type="date" name="tanggalUpd" id="tanggalUpd" name="tanggalUpd" value="<?= $data['tanggal']; ?>">

                        <label class="labwa" for="Upd">Waktu :</label>
                        <input class="box2 inwa" type="time" name="waktuUpd" id="Upd" value="<?= $data['waktu']; ?>">

                        <label class="labsta" for="statusUpd">Status :</label>
                        <select class="box insta" id="statusUpd" name="statusUpd" size="1">
                            <option value="Pending" selected>Pending</option>
                            <option value="Diterima">Diterima</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>

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

</body>

</html>