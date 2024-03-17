<?php

require_once('./index_files/conndb3.php');

    if (isset($_POST['submit'])) {
        $nama	            = ($_POST['nama']);
        $keperluan		    = ($_POST['keperluan']);
        $telp		        = ($_POST['telp']);
        $ruangan            = ($_POST['ruangan']);
        $tanggal            = ($_POST['tanggal']);
        $waktu              = ($_POST['waktu']);
        $tambahan           = ($_POST['tambahan']);
        $status             = ($_POST['status']);
        
        if ($nama == '' or $telp == '' or $keperluan == '') {
            $eror		= "Silahkan masukan semua data yakni data isi dan nama";
        }

        if (empty($eror)) {
            $query	 	= "INSERT INTO t_pinjam (nama, keperluan, telp, id_ruangan, tanggal, waktu, tambahan, status) VALUES ('$nama', '$keperluan', '$telp', '$ruangan', '$tanggal', '$waktu', '$tambahan', '$status')";
            $result = mysqli_query(connection(), $query);
    
            if ($result) {
                echo"<script>alert('Data berhasil ditambahkan'); window.location='status.php';</script>";
            } else {
                echo"<script>alert('Data gagal ditambahkan'); window.location='add_agendaruangan.php';</script>";
            }
        }

        $result = mysqli_query(connection(), "SELECT * FROM t_barang");
        $j = 0;
        while ($data = mysqli_fetch_array($result)){
            $j++;
        }

        //$barang = unserialize(serialize(array("TV", "Printer", "Projector")));
        $id_pinjam          = ($_POST['id_pinjam']);

        $result2 = mysqli_query(connection(), "SELECT * FROM t_barang");

        for ($i=0; $i<$j; $i++) {
            $data1 = mysqli_fetch_array($result2);
            $id_barang         = $data1['id_barang'];
            $jml               = ($_POST['jml'.$i]);
            $ket               = ($_POST['ket'.$i]);

            if ($jml != NULL && $jml != 0){
                $query1= "INSERT INTO t_pinjamBarang (id_pinjam, id_barang, jumlah, keterangan) VALUES ('$id_pinjam', '$id_barang', '$jml', '$ket')";
                $result1 = mysqli_query(connection(), $query1);
            }
        }
        // header('Location: status.php?status='.$status);
    } // END CREATE LOGIC
