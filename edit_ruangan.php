<?php
    include('./index_files/conndb3.php');

    $result    = mysqli_query(connection(), "SELECT * FROM t_ruangan");
?>
<?php
    if(isset($_POST['proses'])):
        mysqli_query(connection(), "UPDATE t_ruangan SET n_ruangan = '$_POST[namaUpd]' WHERE id_ruangan=$_GET[id_ruangan]");
        echo "<script>window.location='ruangan.php';</script>";
    endif;
?>


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
            include ('./sidebar/sidebar.php')
        ?>
    </section>

    <section class="main">
        <h1 class="title">Ubah Data Ruangan</h1>

        <div class="forms">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <form role="form" action="act_addruangan.php" method="POST" autocomplete="off">
                <div class="inputCont">
                    <label class="labnam" for="n_ruangan">Nama Ruangan:</label>
                    <input class="innam" type="text" name="n_ruangan" id="n_ruangan" value="<?= $data['n_ruangan']?>" required>

                    <!-- <input type="hidden" id="status" name="status" value="Pending">  -->
                    
                    <input class="button1" type="submit" value="Kumpulkan" name="proses" />
                </div>
            </form>
            <?php endwhile;?>
        </div>

        <div class="footerCont">
            <div class="footer">
                <p class="p1">Copyright 2023 PKL UPNVJT </p>
                <p class="p2">@SIPERU</p>
            </div>
        </div>
    </section>

    <!-- Script -->
    <script src="script.js"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
</body>

</html>