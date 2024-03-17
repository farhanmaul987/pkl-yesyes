<?php
    include('index_files/conndb3.php');

    if($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        if(isset($_GET['id_pinjam']))
        {
            $id_pinjam  = $_GET['id_pinjam'];

            $query  = "DELETE FROM t_pinjam WHERE id_pinjam = '$id_pinjam' ";
            $result = mysqli_query(connection(), $query);
            
            echo"<script>window.location='status.php';</script>";
            // header('Location : status.php');
        }
    }

?>