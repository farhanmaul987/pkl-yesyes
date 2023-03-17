<?php require_once('./index_files/conndb3.php'); ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/BPK-Logo.png" />
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://kalenderindonesia.com/api/j8aUX5uv7sar/kalender/masehi/2023">
    <title>SIPERU</title>
</head>


<body>
    <section class="sidebarr">
        <div class="sidebar">
            <img class="logo" src="./assets/cropped-Logo-BPK-crop.png" alt="Logo BPK">
            <ul>
                <a href="./index.php">
                    <li>Dashboard</li>
                </a>
                <a href="./konf_agendaruangan.php">
                    <li>Konfirmasi Peminjaman</li>
                </a>
                <a href="./add_agendaruangan.php">
                    <li>Form Peminjaman</li>
                </a>
                <a href="./status.php">
                    <li>Status Ajuan</li>
                </a>
                <a href="./add_ruangan.php">
                    <li>Tambah Ruangan</li>
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
        <div class="title">Agenda Ajuan Peminjaman Ruang Rapat</div>

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
                    <th colspan="" style="text-align:center">Action</th>
                </tr>

                <?php
                $no = 1;
                $query = mysqli_query(connection(), 'SELECT * FROM t_pinjam INNER JOIN t_ruangan ON t_pinjam.id_ruangan = t_ruangan.id_ruangan ORDER BY t_pinjam.id_pinjam DESC ;');
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
                        <td class="icon">
                            <a href="<?php echo "edit.php?id_pinjam=" . $d['id_pinjam']; ?>"><iconify-icon class="edit" icon="mdi:pencil-box" width="25" height="25"></iconify-icon></a>
                            <a href="<?php echo "act_hapusagendaruangan.php?id_pinjam=" . $d['id_pinjam']; ?>"><iconify-icon class="decline" icon="mdi:close-box" width="25" height="25" onclick="return confirm('Yakin akan menghapus data ?')"></iconify-icon></a>
                        </td>

                        <!-- <td class="icon"><a href=""><iconify-icon class="accept" icon="material-symbols:check-box-rounded" width="25" height="25"></iconify-icon></a></td> -->

                        
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
    <script src="https://code.iconify.design/iconify-icon/1.0.5/iconify-icon.min.js"></script>
    <script src="script.js"></script>
</body>

</html>