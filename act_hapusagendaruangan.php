<?php
    include('index_files/conndb3.php');

    // $query  = "DELETE FROM t_pinjam WHERE id_pinjam = '$_GET[$id_pinjam]' ";
    // mysqli_query(connection(), $query) or die (mysqli_error(connection()));
    // header('Location : status.php');

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