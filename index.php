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
        <div class="title">Ruangan 1</div>
        <?php for ($i=0; $i < 5; $i++) { 
        ?>
            <div class="tabel">
                <table style="width: 90%;">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keperluan</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                    </tr>

                    <?php
                    $no = 1;
                    $query = mysqli_query(connection(), 'SELECT t_ruangan.n_ruangan, t_pinjam.keperluan, t_pinjam.tanggal, t_pinjam.waktu 
                    FROM t_pinjam 
                    INNER JOIN t_ruangan 
                    ON t_pinjam.id_ruangan = t_ruangan.id_ruangan 
                    WHERE t_pinjam.id_ruangan = t_ruangan.id_ruangan AND t_pinjam.id_ruangan = 1
                    ORDER BY t_pinjam.id_pinjam DESC;');
                    while ($d = mysqli_fetch_array($query)) {
                    ?>
                        <tr class="">
                            <td class="qe"><?php echo $no++; ?></td>
                            <td><?php echo $d['n_ruangan']; ?></td>
                            <td><?php echo $d['keperluan']; ?></td>
                            <td><?php echo $d['tanggal']; ?></td>
                            <td><?php echo $d['waktu']; ?></td>
    
                        </tr>
                        
                    <?php
                    }
                    ?>

                </table>
            </div>
        <?php };?>
        <div class="footerCont">
            <div class="footer">
                <p class="p1">Copyright 2023 PKL UPNVJT </p>
                <p class="p2">@SIPERU</p>
            </div>
        </div>
    </section>

</body>

</html>