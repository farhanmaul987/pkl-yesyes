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
        <div class="title">Daftar Nama Ruangan</div>

        <!-- <div>
            <button type="button" class="btn btn-outline-primary">Primary</button>
        </div> -->
        <div class="tabel">
            <table style="width: 90%;">
                <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th style="text-align:center">Kuota Ruangan</th>
                </tr>

                <?php
                $no = 1;
                $query = mysqli_query(connection(), 'SELECT * FROM t_ruangan ;');
                while ($d = mysqli_fetch_array($query)):?>
                    <tr class="">
                        <td class="qe"><?php echo $no++; ?></td>
                        <td><?php echo $d['n_ruangan']; ?></td>
                        <td style="text-align:center"> <?php echo $d['kuota']; ?> orang</td>
                    </tr>
                    
                <?php endwhile;?>

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