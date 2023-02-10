<?php include("include/inc_header.php"); ?>

<?php 
$nama       = "";
$keperluan  = "";
$ruangan    = "";
$waktu      = "";

$gagal		= "";
$sukses		= "";

// CREATE LOGIC
if(isset($_POST['tambahkan'])){
    $nama       = ($_POST['nama']);
    $keperluan  = ($_POST['keperluan']);
    $ruangan    = ($_POST['ruangan']);
    $waktu      = ($_POST['waktu']);

    if ($nama == '' or $keperluan == '' or $ruangan == '' or $waktu == '') {
		$gagal		= "Data yang dimasukkan kurang, silahkan teliti kembali";
	}

    if (empty($gagal)) {
        if($id != ""){
            $query = "INSERT INTO booking (nama, keperluan, ruangan, waktu) VALUES ('$nama', '$keperluan', '$ruangan', '$waktu')";
        }
        $result = mysqli_query(connection(), $query);

        if ($result) {
            $sukses = "Sukses memasukkan data!!";
        } else {
            $gagal  = 'Gagal memasukkan data, silahkan coba lagi';
        }
    }
} //END CREATE LOGIC
?>

<!-- LOGIC NOTIF GAGAL -->
<?php 
    if ($gagal) {
?>
    <div class="alert alert-danger" role="alert">
        <?php echo $gagal ?>
    </div>
<?php
    }
?>

<!-- LOGIC NOTIF SUKSES -->
<?php 
    if ($sukses) {
?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses ?>
    </div>
<?php
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking </title>
</head>

<body>
    <form action="", method="post" enctype="multipart/form-data">
        <ol style="list-style: none;">
        <li>

        </li>
            <li>
                <label for="ruangan">Ruangan:</label>
                <!-- <input id="ruangan" type="range"> -->
                <select name="ruangan" id="ruangan">
                    <option value="Ruangan-1">--- PILIH ---</option>
                    <option value="Ruangan-1">Ruangan-1</option>
                    <option value="Ruangan-2">Ruangan-2</option>
                    <option value="Ruangan-3">Ruangan-3</option>
                    <option value="Ruangan-4">Ruangan-4</option>
                </select>
            </li>
            <li>
                <label for="tanggal">Tanggal:</label>
                <input id="tanggal" type="datetime-local">
            </li>
            <li>
                
            </li>
        </ol>
    </form>
</body>

</html>