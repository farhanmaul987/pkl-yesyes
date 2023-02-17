<?php require_once('./index_files/conndb3.php');?>

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

        <div class="tabel">
            <table style="width: 90%;">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Telepon</th>
                    <th>Ruang</th>
                    <th>Keperluan</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Action</th>
                </tr>

                <?php
                $no = 1;
                $query = mysqli_query(connection(), 'SELECT * FROM t_pinjam');
                while ($d = mysqli_fetch_array($query)) {
                ?>

                    <tr class="">
                        <td class="qe"><?php echo $no++; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['telp']; ?></td>
                        <td><?php echo $d['id_ruangan']; ?></td>
                        <td><?php echo $d['keperluan']; ?></td>
                        <td><?php echo $d['tanggal']; ?></td>
                        <td><?php echo $d['waktu']; ?></td>
                        <td class="icon"><a href="<?php echo "edit.php?id_pinjam=".$d['id_pinjam']; ?>"><iconify-icon icon="material-symbols:edit"></iconify-icon></a></td>
                    </tr>

                <?php
                }
                ?>

            </table>
        </div>

        <div class="footerCont">
            <div class="footer">
                <p class="p1">Copyright 2023 PKL UPNVJT </p>
                <p class="p2">@SIPERU</p>
            </div>
        </div>
    </section>


    <script src="https://code.iconify.design/iconify-icon/1.0.5/iconify-icon.min.js"></script>
</body>

</html>