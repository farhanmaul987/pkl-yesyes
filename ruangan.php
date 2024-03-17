<?php require_once('./index_files/conndb3.php') ?>

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
        include('./sidebar/sidebar.php')
        ?>
    </section>

    <section class="main">
        <div class="title">Daftar Nama Ruangan</div>

        <!-- <div>
            <button type="button" class="btn btn-outline-primary">Primary</button>
        </div> -->
        <div class="tabel">
            <table style="width: 90%;">
                <a class="link" href="./add_ruangan.php">
                    <svg xmlns="http://www.w3.org/2000/svg" class="addel" viewBox="0 0 24 24">
                        <path fill="black" d="M11 19v-6H5v-2h6V5h2v6h6v2h-6v6Z" />
                    </svg>

                </a>
                <div class="hoveredText">
                    <p>Tambah Ruangan</p>
                    <span>&#129305;</span>
                </div>
                <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Kuota</th>
                    <th colspan="" style="text-align:center">Action</th>
                </tr>

                <?php
                $no = 1;
                $query = mysqli_query(connection(), 'SELECT * FROM t_ruangan ;');
                while ($d = mysqli_fetch_array($query)) : ?>
                    <tr class="">
                        <td class="qe"><?php echo $no++; ?></td>
                        <td><?php echo $d['n_ruangan']; ?></td>
                        <td> <?php echo $d['kuota']; ?> orang</td>
                        <td class="icon">
                            <a href="<?php echo "edit_ruangan.php?id_ruangan=" . $d['id_ruangan']; ?>"><iconify-icon class="edit" icon="mdi:pencil-box" width="25" height="25"></iconify-icon></a>
                            <a href="<?php echo "act_hapusruangan.php?id_ruangan=" . $d['id_ruangan']; ?>"><iconify-icon class="decline" icon="mdi:close-box" width="25" height="25" onclick="return confirm('Yakin akan menghapus data ?')"></iconify-icon></a>
                        </td>
                    </tr>

                <?php endwhile; ?>

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
    <script src="script.js"></script>
</body>

</html>