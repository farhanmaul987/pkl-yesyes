<?php require_once('./index_files/conndb3.php') ?>

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
        <?php
        $query = mysqli_query(connection(), 'SELECT id_ruangan 
            FROM t_ruangan;');
        // print_r(mysqli_fetch_array($query));
        while ($d = mysqli_fetch_array($query)) {
        ?>
            <div class="title mySlides">Ruangan <?php echo $d['id_ruangan']; ?></div>
            <div class="tabel">
                <table style="width: 90%;">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                    </tr>
                    <?php 
                        $query2 = mysqli_query(connection(), 'SELECT tanggal, waktu FROM t_pinjam WHERE id_ruangan = '. $d['id_ruangan']);
                        $no = 1;
                        while($d2 = mysqli_fetch_array($query2)){
                    ?>
                        <tr class="">
                            <td class="qe"><?php echo $no++; ?></td>
                            <td><?php echo $d2['tanggal']; ?></td>
                            <td><?php echo $d2['waktu']; ?></td>
                        </tr>
                        <?php }; ?>
                </table>
            </div>
        <?php }; ?>

        <div class="footerCont">
            <div class="footer">
                <p class="p1">Copyright 2023 PKL UPNVJT </p>
                <p class="p2">@SIPERU</p>
            </div>
        </div>
    </section>

</body>

</html>