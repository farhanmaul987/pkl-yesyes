<?php include('./index_files/conndb3.php'); ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="icon" type="image/png" href="./assets/BPK-Logo.png" />
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
                        $query1 = "SELECT * FROM t_pinjam";
                        $sql = mysqli_query(connection(), $query1);
                        while ($data1 = mysqli_fetch_array($sql)) {
                            $id = $data1['id_pinjam'] + 1;
                        }

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
                    <svg id="sar-btn1" class="insar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M11 17h2v-4h4v-2h-4V7h-2v4H7v2h4v4Zm-6 4q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.588 1.413T19 21H5Z" />
                    </svg>

                    <label class="labket" for="tambahan">Tambahan :</label>
                    <svg id="sar-btn2" class="inket" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M11 17h2v-4h4v-2h-4V7h-2v4H7v2h4v4Zm-6 4q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.588 1.413T19 21H5Z" />
                    </svg>

                    <input type="hidden" name="id_pinjam" id="id_pinjam" value="<?php echo $id; ?>">

                    <div id="modal1" class="mdl-sar-cont">
                        <div class="mdl-alat-sar">
                            <div>
                                <div class="mdl-head">
                                    <h2 class="t-table">Pilih Sarana Ruangan</h2>
                                    <svg class="close" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z" />
                                    </svg>
                                </div>

                                <table class="table-sar">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Perlengkapan</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                    </tr>

                                    <?php
                                    $query2  = "SELECT * FROM t_barang";
                                    $result2 = mysqli_query(connection(), $query2);
                                    $no = 1;
                                    $no1 = $no2 = $no3 = $no4 = 0;

                                    while ($data2 = mysqli_fetch_array($result2)) {
                                    ?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data2['n_barang']; ?></td>
                                            <td><input class="box" type="number" name="jml<?php echo $no1++; ?>" id="jml<?php echo $no2++; ?>"></td>
                                            <td><input class="box1" type="text" name="ket<?php echo $no3++; ?>" id="ket<?php echo $no4++; ?>"></td>
                                        </tr>

                                    <?php }; ?>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="modal2" class="mdl-ket-cont">
                        <div class="mdl-ket">
                            <div>
                                <div class="mdl-head">
                                    <h2 class="t-table">Silakan Isi Permintaan Tambahan</h2>
                                    <svg id="kntl2" class="close" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z" />
                                    </svg>
                                </div>
                                <div class="textArea">
                                    <textarea name="tambahan" id="req" cols="100" rows="20"></textarea>
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
</body>

</html>