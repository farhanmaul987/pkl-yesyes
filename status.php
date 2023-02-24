<?php require_once('./index_files/conndb3.php')?>

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
                <li class="drop-btn">Dropdown</li>
                <div class="drop">
                    <a href=""><li>Ruangan 1</li></a>
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
                <a href="./add_agendaruangan.php">
                    <li>Form Peminjaman</li>
                </a>
                <a href="./status.php">
                    <li>Status Ajuan</li>
                </a>
            </ul>
        </div>
    </section>

    <section class="main">
        <div class="title">Status Ajuan Peminjaman Ruang Rapat</div>

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
                    <th>Status</th>
                </tr>

                <?php
                $no = 1;
                $query = mysqli_query(connection(), 'SELECT t_pinjam.nama, t_pinjam.telp, t_ruangan.n_ruangan, t_pinjam.keperluan, t_pinjam.tanggal, t_pinjam.waktu, t_pinjam.status FROM t_pinjam INNER JOIN t_ruangan ON t_pinjam.id_ruangan = t_ruangan.id_ruangan ORDER BY t_pinjam.id_pinjam DESC ;');
                while ($d = mysqli_fetch_array($query)) {
                    if ($d['status'] == "Pending"){
                        $color = "style= 'background-color: #FFBCD1'";
                    }
                    else if ($d['status'] == "Diterima"){
                        $color = "style= 'background-color: #00e00b'";
                    }
                    else if ($d['status'] == "Ditolak"){
                        $color = "style= 'background-color: #ff0000'";
                    }
                ?>


                    <tr class="">
                        <td class="qe"><?php echo $no++; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['telp']; ?></td>
                        <td><?php echo $d['n_ruangan']; ?></td>
                        <td><?php echo $d['keperluan']; ?></td>
                        <td><?php echo $d['tanggal']; ?></td>
                        <td><?php echo $d['waktu']; ?></td>
                        <td <?php echo $color?>><?php echo $d['status'];?></td>
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

    <script src="script.js"></script>
</body>

</html>