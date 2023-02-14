<?php include('./index_files/conndb3.php');?>

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
                <a href="./add_agendaruangan.php">
                    <li>Form Peminjaman</li>
                </a>
                <a href="./status.php">
                    <li>Status Ajuan</li>
                </a>
                <a href="">
                    <li>Slot Tersedia</li>
                </a>
            </ul>
        </div>

        <div class="sidebarDum">
            <img class="logo" src="./assets/cropped-Logo-BPK-crop.png" alt="Logo BPK">
            <ul>
                <a href="./index.php">
                    <li>Form Peminjaman</li>
                </a>
                <a href="./status.php">
                    <li>Status Ajuan</li>
                </a>
                <a href="">
                    <li>Slot Tersedia</li>
                </a>
            </ul>
        </div>
    </section>

    <section class="main">
        <div class="title">Form Ajuan Peminjaman Ruang Rapat</div>

        <div class="forms">
            <form role="form" action="act_reqagendaruangan.php" enctype="multipart/form-data" method="POST">
                <div class="inputCont">
                    <label class="labnam" for="nama">Nama :</label>
                    <input class="box innam" type="text" name="nama" id="nama" value="<?php //echo $nama;?>">

                    <label class="labkep" for="keperluan">Keperluan :</label>
                    <input class="box inkep" type="text" name="keperluan" id="keperluan" value="<?php //echo $keperluan;?>">

                    <label class="labtel" for="telp">Nomor Telepon :</label>
                    <input class="box intel" type="text" name="telp" id="telp" value="<?php //echo $telp;?>">

                    <label class="labru" for="ruangan">Ruangan :</label>
                    <select class="box inru" id="ruangan" name="ruangan" size="1">
                        <option value="-" selected>-</option>
                        <?php 
                            $query  = "SELECT * FROM t_ruangan";
                            $result = mysqli_query(connection(), $query);

                            while ($data = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?= $data['id_ruangan'];?>">
                                    <?= $data['n_ruangan'];?>
                                </option>
                        <?php };?>
                    </select>
                    <!--<input class="box inru" type="text" name="ruang" id="ruang">-->

                    <label class="labtan" for="tanggal">Tanggal :</label>
                    <input class="box1 intan" type="date" name="tanggal" id="tanggal" value="<?= date('Y-m-d');?>" autofocus>

                    <label class="labwa" for="waktu">Waktu :</label>
                    <input class="box2 inwa" type="time" name="waktu" id="waktu" value="<?= date('H:i');?>" autofocus>

                    <input class="button" type="submit" value="Kumpulkan" name="submit" />
                </div>
            </form>
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