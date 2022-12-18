<!DOCTYPE html>
<html>

<head>
    <title>Form Pendaftaran Anggota</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <?php

        //Include file koneksi, untuk koneksikan ke database
        include_once "koneksi.php";

        //Fungsi untuk mencegah inputan karakter yang tidak sesuai

        //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_destinasi
        if (isset($_GET['id_destinasi'])) {
            $id_destinasi = input($_GET["id_destinasi"]);

            $sql = "select * from destinasi where id_destinasi=$id_destinasi";
            $hasil = mysqli_query($conn, $sql);
            $data_destinasi = mysqli_fetch_assoc($hasil);
            var_dump($data_destinasi);
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

            $nama_destinasi = input($_POST["nama_destinasi"]);
            $penjelasan_singkat = input($_POST["penjelasan_singkat"]);
            $gambar_1 = input($_POST["gambar_1"]);
            $gambar_2 = input($_POST["gambar_2"]);
            $gambar_3 = input($_POST["gambar_3"]);
            $penjelasan_detail = input($_POST["penjelasan_detail"]);
            $id_destinasi = input($_POST["id_destinasi"]);

            //Query update data pada tabel anggota
            $sql = "UPDATE 
            destinasi 
            SET
			nama_destinasi='$nama_destinasi',
			penjelasan_singkat='$penjelasan_singkat',
			gambar_1='$gambar_1',
			gambar_2='$gambar_2',
			gambar_3='$gambar_3',
			penjelasan_detail='$penjelasan_detail'
			WHERE id_destinasi=$id_destinasi";

            //Mengeksekusi atau menjalankan query diatas
            $hasil = mysqli_query($conn, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                echo "
                <script>
                alert(`Data Berhasil diubah`);
                location.href = 'index-admin.php'
                </script>

                ";
            } else {
                echo "
                <script>
                alert(`Data Gagal diubah`);
                location.href = 'index-admin.php'
                </script>

                ";
            }
        }

        ?>
        <h2>Update Data</h2>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); //return file name
                        ?>" method="post">

            <div class="form-group">
                <label>Nama Destinasi:</label>
                <input type="text" name="nama_destinasi" class="form-control" placeholder="Masukan Destinasi" required value="<?= $data_destinasi["nama_destinasi"] ?>" />

            </div>
            <div class="form-group">
                <label>Penjelasan Singkat:</label>
                <input type="text" name="penjelasan_singkat" class="form-control" placeholder="Masukan Penjelasan Singkat" required value="<?= $data_destinasi["penjelasan_singkat"] ?>"/>
            </div>

            <div class="form-group">
                <label>Gambar 1:</label>
                <input type="text" name="gambar_1" class="form-control" placeholder="Masukan Nama Gambar 1" value="<?= $data_destinasi["gambar_1"] ?>"/>
            </div>

            <div class="form-group">
                <label>Gambar 2:</label>
                <input type="text" name="gambar_2" class="form-control" placeholder="Masukan Nama Gambar 2" value="<?= $data_destinasi["gambar_2"] ?>"/>
            </div>

            <div class="form-group">
                <label>Gambar 3:</label>
                <input type="text" name="gambar_3" class="form-control" placeholder="Masukan Nama Gambar 3" value="<?= $data_destinasi["gambar_3"] ?>"/>
            </div>

            <div class="Penjelasan Detail">
                <label>Penjelasan Detail:</label>
                <textarea name="penjelasan_detail" class="form-control" rows="5" placeholder="Masukan Penjelasan Detail" required ><?= $data_destinasi["penjelasan_detail"]?>
            </textarea>
            </div>

            <input type="hidden" name="id_destinasi" value="<?php echo $data_destinasi['id_destinasi']; ?>"/>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>