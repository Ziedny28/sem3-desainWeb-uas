<!DOCTYPE html>
<html>

<head>
    <title>mengubah data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <?php
        
        //Include file koneksi, untuk koneksikan ke database
        include_once "../koneksi.php";

        //Fungsi untuk mencegah inputan karakter yang tidak sesuai

        //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_destinasi
        if (isset($_GET['id_paket_service'])) {
            $id_paket_service = input($_GET["id_paket_service"]);

            $sql = "select * from paket_service where id_paket_service=$id_paket_service";
            $hasil = mysqli_query($conn, $sql);
            $data_paket_service = mysqli_fetch_assoc($hasil);
        }


        //make sure the thing is a htmlspecialchars
        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") { // versi lain isset['post']

            $id_paket_service = input($_POST["id_paket_service"]);
            $nama_paket_service = input($_POST["nama_paket_service"]);
            $penjelasan_singkat_paket_service = input($_POST["penjelasan_singkat_paket_service"]);
            $gambar_1_paket_service = input($_POST["gambar_1_paket_service"]);
            $gambar_2_paket_service = input($_POST["gambar_2_paket_service"]);
            $gambar_3_paket_service = input($_POST["gambar_3_paket_service"]);
            $penjelasan_detail_paket_service = input($_POST["penjelasan_detail_paket_service"]);
            $harga_paket_service = input($_POST["harga_paket_service"]);
            $rating_paket_service = input($_POST["rating_paket_service"]);


            //Query update data pada tabel anggota
            $sql = "UPDATE 
            paket_service 
            SET
			nama_paket_service='$nama_paket_service',
			penjelasan_singkat_paket_service='$penjelasan_singkat_paket_service',
			gambar_1_paket_service='$gambar_1_paket_service',
			gambar_2_paket_service='$gambar_2_paket_service',
			gambar_3_paket_service='$gambar_3_paket_service',
			penjelasan_detail_paket_service='$penjelasan_detail_paket_service'
			WHERE id_paket_service=$id_paket_service";

            //Mengeksekusi atau menjalankan query diatas
            $hasil = mysqli_query($conn, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                echo "
                <script>
                alert(`Data Berhasil diubah`);
                location.href = 'index-admin-pack.php'
                </script>

                ";
            } else {
                echo "
                <script>
                alert(`Data Gagal diubah`);
                location.href = 'index-admin-pack.php'
                </script>

                ";
            }
        }

        ?>
        <h2>Update Data</h2>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); //return file name
                        ?>" method="post">

            <div class="form-group">
                <label>Nama Paket Service:</label>
                <input type="text" name="nama_paket_service" class="form-control" placeholder="Masukan nama paket service" required value="<?= $data_paket_service["nama_paket_service"] ?>" />

            </div>
            <div class="form-group">
                <label>Penjelasan Singkat:</label>
                <input type="text" name="penjelasan_singkat_paket_service" class="form-control" placeholder="Masukan Penjelasan Singkat" required value="<?= $data_paket_service["penjelasan_singkat_paket_service"] ?>"/>
            </div>

            <div class="form-group">
                <label>Gambar 1:</label>
                <input type="text" name="gambar_1_paket_service" class="form-control" placeholder="Masukan Nama Gambar 1" value="<?= $data_paket_service["gambar_1_paket_service"] ?>"/>
            </div>

            <div class="form-group">
                <label>Gambar 2:</label>
                <input type="text" name="gambar_2_paket_service" class="form-control" placeholder="Masukan Nama Gambar 2" value="<?= $data_paket_service["gambar_2_paket_service"] ?>"/>
            </div>

            <div class="form-group">
                <label>Gambar 3:</label>
                <input type="text" name="gambar_3_paket_service" class="form-control" placeholder="Masukan Nama Gambar 3" value="<?= $data_paket_service["gambar_3_paket_service"] ?>"/>
            </div>

            <div class="form-group">
                <label>harga:</label>
                <input type="text" name="harga_paket_service" class="form-control" placeholder="Masukan harga" value="<?= $data_paket_service["harga_paket_service"] ?>"/>
            </div>

            <div class="form-group">
                <label>rating:</label>
                <input type="text" name="rating_paket_service" class="form-control" placeholder="Masukan rating" value="<?= $data_paket_service["rating_paket_service"] ?>"/>
            </div>

            <div class="Penjelasan Detail">
                <label>Penjelasan Detail:</label>
                <textarea name="penjelasan_detail_paket_service" class="form-control" rows="5" placeholder="Masukan Penjelasan Detail" required ><?= $data_paket_service["penjelasan_detail_paket_service"]?>
            </textarea>
            </div>

            <input type="hidden" name="id_paket_service" value="<?php echo $data_paket_service['id_paket_service']; ?>"/>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>