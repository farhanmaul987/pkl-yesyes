<?php 
    require_once('./index_files/conndb3.php');

    if (isset($_POST['submit'])):
        $n_ruangan	            = $_POST['n_ruangan'];
        $kuota	            = $_POST['kuota'];

        if (empty($eror)):
            $query	 	= "INSERT INTO t_ruangan (n_ruangan, kuota) VALUES ('$n_ruangan', '$kuota')";
            $result     = mysqli_query(connection(), $query);
    
            if ($result):
                echo"<script>alert('Data berhasil ditambahkan'); window.location='ruangan.php';</script>";
            else:
                echo"<script>alert('Data gagal ditambahkan'); window.location='add_ruangan.php.php';</script>";
            endif;
        endif;
    endif; // END CREATE LOGIC
?>