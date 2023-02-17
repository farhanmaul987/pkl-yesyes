<?php

require_once('./index_files/conndb3.php');

    if (isset($_POST['submit'])) {
        $nama	            = ($_POST['nama']);
        $keperluan		    = ($_POST['keperluan']);
        $telp		        = ($_POST['telp']);
        $ruangan            = ($_POST['ruangan']);
        $tanggal            = ($_POST['tanggal']);
        $waktu              = ($_POST['waktu']);
    
        if ($nama == '' or $telp == '' or $keperluan == '') {
            $eror		= "Silahkan masukan semua data yakni data isi dan nama";
        }

        if (empty($eror)) {
            $query	 	= "INSERT INTO t_pinjam (nama, keperluan, telp, id_ruangan, tanggal, waktu) VALUES ('$nama', '$keperluan', '$telp', '$ruangan', '$tanggal', '$waktu')";
            $result = mysqli_query(connection(), $query);
    
            header("Location : status.php");
        }
    } // END CREATE LOGIC

?>