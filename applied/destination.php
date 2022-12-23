<?php 
include_once 'koneksi.php'
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destination</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<?php
if (!isset($_GET['id_destinasi'])) {
	echo "
	<script>
	alert(`Anda harus memilih data terlebih dahulu`);
	location.href = 'index-admin.php'
	</script>
	";
}

$id_destinasi;

if(isset($_GET['id_destinasi'])){
    $id_destinasi = $_GET['id_destinasi'];  

    $sql = "select * from destinasi where id_destinasi=$id_destinasi";
    $hasil = mysqli_query($conn, $sql);
    $data_destinasi = mysqli_fetch_assoc($hasil);
}
?>

<?php 
function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<body>
    <div class="top-content">
        <div class="top pt-3">
            <div class="row">
                <h3 class="orange-text col-1 offset-1">NGLMeriah</h3>
                <nav class="col-4 offset-2">
                    <ul>
                        <li class="top-links">Home</li>
                        <li class="top-links orange-text">Destination</li>
                        <li class="top-links">Content 2</li>
                        <li class="top-links">About us</li>
                    </ul>
                </nav>

                <div class="register-login col-2 offset-2">
                    <a href="" class="top-links">Register</a>
                    <button type="button" class="btn btn-outline-warning">Login</button>
                </div>
            </div>
        </div>
        <hr>

        <h1 class="white-text text-center"></h1>
        <div class="row">
            <div class="col-4 offset-4">
                <p class="white-text text-center"><?=$data_destinasi['penjelasan_detail']?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-2 offset-5">
                <button type="button" class="btn btn-warning">Dapatkan Tiket Sekarang</button>
            </div>
        </div>
        <div class="row mt-5">
            <div class="destination-images">
                <div class="col-4 offset-1">
                    <div class="destination-image-main">
                        <img class="zoom blur" src="images/<?=$data_destinasi['gambar_1']?>" alt="">
                        <div class="content fade">
                            <p><?=$data_destinasi['penjelasan_singkat']?></p>
                        </div>
                    </div>
                </div>

                <div class="col-2 offset-1">
                    <div class="destination-image">
                        <img src="images/<?=$data_destinasi['gambar_2']?>" alt="">
                    </div>
                </div>
                <div class="col-2 offset-1">
                    <div class="destination-image">
                        <img src="images/<?=$data_destinasi['gambar_3']?>" alt="">
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="services-destination reveal  mt-200">
        <div class="row">
            <div class="col offset-1">
                <h2>Layanan Yang Akan Membawa <br> Anda Ke <span class="orange-text"><?=$data_destinasi['nama_destinasi']?></span></h2>
            </div>
        </div>
        <div class="row">
        <?php
            $nama_destinasi = $data_destinasi['nama_destinasi'];
            $sql = "SELECT * FROM paket_service 
            WHERE nama_paket_service LIKE '%$nama_destinasi%'
                        ORDER BY RAND() 
                        LIMIT 3
                        ";
            $hasil = mysqli_query($conn, $sql);

            $cardIndex = 0;
            while ($data_card = mysqli_fetch_array($hasil)) {

                if ($cardIndex === 0) {
            ?>
                    <div class="col-3 offset-2">

                        <div class="card" style="width: 18rem;">
                            <img src="images/<?= $data_card['gambar_1_paket_service'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $data_card['nama_paket_service'] ?></h5>
                                <p class="card-text"><?= $data_card['penjelasan_singkat_paket_service'] ?></p>
                                <a href="paket-service.php?id_paket_service=<?= $data_card['id_paket_service'] ?>">
                                    <button type="button" class="btn btn-warning " style="color: white;">Dapatkan Sekarang</button>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php
                } else {
                ?>
                    <div class="col-3">

                        <div class="card" style="width: 18rem;">
                            <img src="images/<?= $data_card['gambar_1_paket_service'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $data_card['nama_paket_service'] ?></h5>
                                <p class="card-text"><?= $data_card['penjelasan_singkat_paket_service'] ?></p>
                                <a href="paket-service.php?id_paket_service=<?= $data_card['id_paket_service'] ?>">
                                    <button type="button" class="btn btn-warning " style="color: white;">Dapatkan Sekarang</button>
                                </a>
                            </div>
                        </div>
                    </div>

            <?php
                }
                $cardIndex += 1;
            }
            ?>


        </div>
    </div>

    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js"></script>
</body>

</html>