<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<?php
require 'koneksi.php';


if (!isset($_GET['id_paket_service'])) {
	echo "
	<script>
	alert(`Anda harus memilih data terlebih dahulu`);
	location.href = 'index-admin.php'
	</script>
	";
}

if(isset($_GET['id_paket_service'])){
    $id_paket_service = $_GET['id_paket_service'];  

    $sql = "select * from paket_service where id_paket_service=$id_paket_service";
    $hasil = mysqli_query($conn, $sql);
    $data_paket_service = mysqli_fetch_assoc($hasil);
}
?>


<body>
    <div class="top pt-3">
        <div class="row">
            <h3 class="orange-text col-1 offset-1   text-black">NGLMeriah</h3>
            <nav class="col-4 offset-2">
                <ul>
                    <li class="top-links-dark">Home</li>
                    <li class="top-links-dark">Destination</li>
                    <li class="orange-text">service</li>
                    <li class="top-links-dark">About us</li>
                </ul>
            </nav>

            <div class="register-login col-2 offset-2">
                <a href="" class="top-links">Register</a>
                <button type="button" class="btn btn-warning text-black" id="btn-login">Login</button>
            </div>
        </div>
    </div>

    <h1 class="text-center mt-5"><strong><?=$data_paket_service['nama_paket_service']?></strong></h1>
    <div class="row">
        <p class="col-6 offset-3 text-center"><?=$data_paket_service['penjelasan_detail_paket_service']?></p>
    </div>
    <div class="center"><button class="btn btn-warning text-white">Pesan Sekarnag</button></div>

    <div class="row mt-5">
        <div class="destination-images">
            <div class="col-4 offset-1">
                <div class="destination-image-main">
                    <img class="zoom blur" src="images/<?=$data_paket_service['gambar_1_paket_service']?>" alt="">
                    <div class="content fade">
                        <p><?=$data_paket_service['penjelasan_singkat_paket_service']?></p>
                    </div>
                </div>
            </div>

            <div class="col-2 offset-1">
                <div class="destination-image">
                    <img src="images/<?=$data_paket_service['gambar_2_paket_service']?>" alt="">
                </div>
            </div>
            <div class="col-2 offset-1">
                <div class="destination-image">
                    <img src="images/<?=$data_paket_service['gambar_3_paket_service']?>" alt="">
                </div>
            </div>
        </div>
    </div>

    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js"></script>
</body>

</html>