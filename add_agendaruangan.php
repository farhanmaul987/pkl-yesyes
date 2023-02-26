<?php include('./index_files/conndb3.php'); ?>

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
                <li class="drop-btn">
                    <p>Dropdown</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m12 15.4l-6-6L7.4 8l4.6 4.6L16.6 8L18 9.4l-6 6Z"/></svg>
                </li>
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
        <h1 class="title">Form Ajuan Peminjaman Ruang Rapat</h1>

        <div class="forms">
            <?php date_default_timezone_set('Asia/Jakarta'); ?>
            <form role="form" action="act_reqagendaruangan.php" enctype="multipart/form-data" method="POST" autocomplete="off">
                <div class="inputCont">
                    <label class="labnam" for="nama">Nama :</label>
                    <input class="innam" type="text" name="nama" id="nama" required>

                    <label class="labkep" for="keperluan">Keperluan :</label>
                    <input class="inkep" type="text" name="keperluan" id="keperluan" required>

                    <label class="labtel" for="telp">Nomor Telepon :</label>
                    <input class="intel" type="text" name="telp" id="telp" required>

                    <label class="labru" for="ruangan">Ruangan :</label>
                    <select class="inru" id="ruangan" name="ruangan" size="1" required>
                        <option value="-" selected>-</option>
                        <?php
                        $query  = "SELECT * FROM t_ruangan";
                        $result = mysqli_query(connection(), $query);

                        while ($data = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $data['id_ruangan']; ?>">
                                <?= $data['n_ruangan']; ?>
                            </option>
                        <?php }; ?>
                    </select>

                    <label class="labtan" for="tanggal">Tanggal :</label>
                    <input class="intan" type="date" name="tanggal" id="tanggal" value="<?= date('Y-m-d'); ?>" required autofocus>

                    <label class="labwa" for="waktu">Waktu :</label>
                    <input class="inwa" type="time" name="waktu" id="waktu" value="<?= date('H:i'); ?>" required autofocus>

                    <label class="labsar" for="sarana">Sarana :</label>
                    <svg id="sar-btn1" class="insar" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24"><path d="M11 17h2v-4h4v-2h-4V7h-2v4H7v2h4v4Zm-6 4q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.588 1.413T19 21H5Z"/></svg>
                    
                    <label class="labket" for="tambahan">Tambahan :</label>
                    <svg id="sar-btn2" class="inket" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24"><path d="M11 17h2v-4h4v-2h-4V7h-2v4H7v2h4v4Zm-6 4q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.588 1.413T19 21H5Z"/></svg>

                    <div id="modal1" class="mdl-sar-cont">
                        <div class="mdl-alat-sar">
                            <div>
                                <div class="mdl-head">
                                    <h2 class="t-table">Pilih Sarana Ruangan</h2>
                                    <svg id="kntl1" class="close" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z"/></svg>
                                </div>

                                <table class="table-sar">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Perlengkapan</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>TV</td>
                                        <td><input class="box" type="number" name="tv" id="tv"></td>
                                        <td><input class="box1" type="text" name="kettv" id="kettv"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Printer</td>
                                        <td><input class="box" type="number" name="printer" id="printer"></td>
                                        <td><input class="box1" type="input" name="ketpr" id="ketpr"></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>sofa</td>
                                        <td><input class="box" type="number" name="sofa" id="sofa"></td>
                                        <td><input class="box1" type="text" name="ketso" id="ketso"></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Meja Sofa</td>
                                        <td><input class="box" type="number" name="mjSofa" id="mjSofa"></td>
                                        <td><input class="box1" type="text" name="ketmj" id="ketmj"></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Item</td>
                                        <td><input class="box" type="number" name="flipC" id="flipC"></td>
                                        <td><input class="box1" type="text" name="ketfl" id="ketfl"></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Item</td>
                                        <td><input class="box" type="number" name="flipC" id="flipC"></td>
                                        <td><input class="box1" type="text" name="ketfl" id="ketfl"></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Item</td>
                                        <td><input class="box" type="number" name="flipC" id="flipC"></td>
                                        <td><input class="box1" type="text" name="ketfl" id="ketfl"></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Item</td>
                                        <td><input class="box" type="number" name="flipC" id="flipC"></td>
                                        <td><input class="box1" type="text" name="ketfl" id="ketfl"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div id="modal2" class="mdl-ket-cont">
                        <div class="mdl-ket">
                            <div>
                                <div class="mdl-head">
                                    <h2 class="t-table">Silakan Isi Permintaan Tambahan</h2>
                                    <svg id="kntl2" class="close" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z"/></svg>
                                </div>
                                <div class="textArea">
                                    <textarea name="req" id="req" cols="100" rows="20"></textarea>
                                </div>
                               
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="status" name="status" value="Pending"> 

                    <input class="button1" type="submit" value="Kumpulkan" name="submit" />
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

    <script src="script.js"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
</body>

</html>