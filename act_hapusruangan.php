<?php
    include('index_files/conndb3.php');

    if($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        if(isset($_GET['id_ruangan']))
        {
            $id_ruangan  = $_GET['id_ruangan'];

            $query  = "DELETE FROM t_ruangan WHERE id_ruangan = '$id_ruangan' ";
            $result = mysqli_query(connection(), $query);
            
            echo"<script>window.location='ruangan.php';</script>";
            // header('Location : status.php');
        }
    }

?>