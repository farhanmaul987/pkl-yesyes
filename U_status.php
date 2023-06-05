<?php require_once('./index_files/conndb3.php')?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/BPK-Logo.png" />
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/style.css">
    <title>SIPERU</title>
</head>


<body>
    <section class="sidebarr">
        <?php
            include ('./sidebar/sidebar_user.php')
        ?>
    </section>

    <section class="main">
        <div class="title">Status Ajuan Peminjaman Ruang Rapat</div>

        <!-- <div>
            <button type="button" class="btn btn-outline-primary">Primary</button>
        </div> -->
        <div class="tabel">
            <table style="width: 90%;">
            <div class="kontol">
                <a class="link" href="./add_agendaruangan.php">
                    <svg xmlns="http://www.w3.org/2000/svg" class="addel" viewBox="0 0 24 24"><path fill="black" d="M11 19v-6H5v-2h6V5h2v6h6v2h-6v6Z"/></svg>

                </a>
                <div class="hoveredText">
                    <p>Tambah Agenda</p>
                    <span>&#129305;</span>
                </div>
            </div>

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
                    else if ($d['status'] == "Selesai"){
                        $color = "style= 'background-color: #00e00b'";
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
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>