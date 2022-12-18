<!DOCTYPE html>
<html>

<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
        //Include file koneksi, untuk koneksikan ke database
        include_once "koneksi.php";

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

            $nama_destinasi = input($_POST["nama_destinasi"]);
            $penjelasan_singkat = input($_POST["penjelasan_singkat"]);
            $gambar_1 = input($_POST["gambar_1"]);
            $gambar_2 = input($_POST["gambar_2"]);
            $gambar_3 = input($_POST["gambar_3"]);
            $penjelasan_detail = input($_POST["penjelasan_detail"]);

            //Query input menginput data kedalam tabel anggota
            $sql = "INSERT INTO destinasi 
        (nama_destinasi,penjelasan_singkat,penjelasan_detail,gambar_1,gambar_2,gambar_3) 
        VALUES
		('$nama_destinasi','$penjelasan_singkat','$penjelasan_detail','$gambar_1','$gambar_2','$gambar_3')";

            //Mengeksekusi/menjalankan query diatas
            $hasil = mysqli_query($conn, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                echo "
                <script>
                alert(`Data Berhasil dimasukkan`);
                location.href = 'index-admin.php'
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
                <label>Nama Destinasi:</label>
                <input type="text" name="nama_destinasi" class="form-control" placeholder="Masukan Destinasi" required />

            </div>
            <div class="form-group">
                <label>Penjelasan Singkat:</label>
                <input type="text" name="penjelasan_singkat" class="form-control" placeholder="Masukan Penjelasan Singkat" required />
            </div>

            <div class="form-group">
                <label>Gambar 1:</label>
                <input type="text" name="gambar_1" class="form-control" placeholder="Masukan Nama Gambar 1"/>
            </div>

            <div class="form-group">
                <label>Gambar 2:</label>
                <input type="text" name="gambar_2" class="form-control" placeholder="Masukan Nama Gambar 2"/>
            </div>

            <div class="form-group">
                <label>Gambar 3:</label>
                <input type="text" name="gambar_3" class="form-control" placeholder="Masukan Nama Gambar 3"/>
            </div>

            <div class="Penjelasan Detail">
                <label>Penjelasan Detail:</label>
                <textarea name="penjelasan_detail" class="form-control" rows="5" placeholder="Masukan Penjelasan Detail" required></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>