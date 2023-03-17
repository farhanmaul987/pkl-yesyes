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
        <h1 class="title">Tambah Data Ruangan</h1>

        <div class="forms">
            <?php date_default_timezone_set('Asia/Jakarta'); ?>
            <form role="form" action="act_addruangan.php" method="POST" autocomplete="off">
                <div class="inputCont">
                    <label class="labnaru" for="n_ruangan">Nama Ruangan:</label>
                    <input class="innaru" type="text" name="n_ruangan" id="n_ruangan" required>

                    <!-- <input type="hidden" id="status" name="status" value="Pending">  -->
                    
                    <input class="button2" type="submit" value="Kumpulkan" name="submit" />
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

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script src="script.js"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
</body>

</html>