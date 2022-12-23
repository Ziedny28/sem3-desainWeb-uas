<!DOCTYPE html>
<html>

<head>
    <title>memasukkan data baru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
        //Include file koneksi, untuk koneksikan ke database
        include_once "../koneksi.php";

        //Fungsi untuk mencegah inputan karakter yang tidak sesuai
        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nama_paket_service = input($_POST["nama_paket_service"]);
            $penjelasan_singkat_paket_service = input($_POST["penjelasan_singkat_paket_service"]);
            $gambar_1_paket_service = input($_POST["gambar_1_paket_service"]);
            $gambar_2_paket_service = input($_POST["gambar_2_paket_service"]);
            $gambar_3_paket_service = input($_POST["gambar_3_paket_service"]);
            $penjelasan_detail_paket_service = input($_POST["penjelasan_detail_paket_service"]);
            $harga_paket_service = input($_POST["harga_paket_service"]);
            $rating_paket_service = input($_POST["rating_paket_service"]);

            //Query input menginput data kedalam tabel anggota
            $sql = "INSERT INTO `paket_service`
            (`nama_paket_service`, `penjelasan_singkat_paket_service`, `penjelasan_detail_paket_service`, `gambar_1_paket_service`, `gambar_2_paket_service`, `gambar_3_paket_service`, `harga_paket_service`, `rating_paket_service`) 
            VALUES ('$nama_paket_service','$penjelasan_singkat_paket_service','$penjelasan_detail_paket_service','$gambar_1_paket_service','$gambar_2_paket_service','$gambar_3_paket_service','$harga_paket_service','$rating_paket_service')";

            //Mengeksekusi/menjalankan query diatas
            $hasil = mysqli_query($conn, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                echo "
                <script>
                alert(`Data Berhasil dimasukkan`);
                location.href = 'index-admin-pack.php'
                </script>

                ";
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
        ?>
        <h2>Input Data</h2>


        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="form-group">
                <label>Nama Paket Service:</label>
                <input type="text" name="nama_paket_service" class="form-control" placeholder="Masukkan Nama Paket Service" required />

            </div>
            <div class="form-group">
                <label>Penjelasan Singkat:</label>
                <input type="text" name="penjelasan_singkat_paket_service" class="form-control" placeholder="Masukan Penjelasan Singkat" required />
            </div>

            <div class="form-group">
                <label>Gambar 1:</label>
                <input type="text" name="gambar_1_paket_service" class="form-control" placeholder="Masukan Nama Gambar 1"/>
            </div>

            <div class="form-group">
                <label>Gambar 2:</label>
                <input type="text" name="gambar_2_paket_service" class="form-control" placeholder="Masukan Nama Gambar 2"/>
            </div>

            <div class="form-group">
                <label>Gambar 3:</label>
                <input type="text" name="gambar_3_paket_service" class="form-control" placeholder="Masukan Nama Gambar 3"/>
            </div>

            <div class="form-group">
                <label>harga paket service:</label>
                <input type="text" name="harga_paket_service" class="form-control" placeholder="Masukan harga paket service"/>
            </div>

            <div class="form-group">
                <label>rating paket service</label>
                <input type="text" name="rating_paket_service" class="form-control" placeholder="Masukan rating paket service"/>
            </div>

            <div class="Penjelasan Detail">
                <label>Penjelasan Detail:</label>
                <textarea name="penjelasan_detail_paket_service" class="form-control" rows="5" placeholder="Masukan Penjelasan Detail" required></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>