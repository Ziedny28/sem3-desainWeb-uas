<?php include_once "../koneksi.php"; ?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    halaman admin</title>

<body>
    <div class="container">
        <br>
        <h4>
            <center>DAFTAR DESTINASI WISATA</center>
        </h4>
        <?php

        //Cek apakah ada kiriman form dari method post
        if (isset($_GET['id_destinasi'])) {
            $id_destinasi = htmlspecialchars($_GET["id_destinasi"]);

            $sql = "delete from destinasi where id_destinasi='$id_destinasi' ";
            $hasil = mysqli_query($conn, $sql);

            //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                echo "
                <script>
                alert(`Data Berhasil dihapus`);
                location.href = 'index-admin.php'
                </script>
                ";
                
            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }
        ?>


        <tr class="table-danger">
            <br>
            <thead>
                <tr>
                    <table class="my-3 table table-bordered">
                        <tr class="table-warning">
                            <th>No</th>
                            <th>Nama Paket Service </th>
                            <th>penjelasan singkat</th>
                            <th>penjelasan detail</th>
                            <th>Nama Gambar1</th>
                            <th>Nama Gambar2</th>
                            <th>Nama Gambar3</th>
                            <th>Harga</th>
                            <th>rating</th>
                            <th colspan='2'>Aksi</th>

                        </tr>
            </thead>

            <?php
            
            $sql = "select * from paket_service order by id_paket_service asc";

            $hasil = mysqli_query($conn, $sql);
            $index = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                $index++;

            ?>
                <tbody>
                    <tr>
                        <td><?php echo $index; ?></td>
                        <td><?php echo $data["nama_paket_service"]; ?></td>
                        <td><?php echo $data["penjelasan_singkat_paket_service"];   ?></td>
                        <td><?php echo $data["penjelasan_detail_paket_service"];   ?></td>
                        <td><?php echo $data["gambar_1_paket_service"];   ?></td>
                        <td><?php echo $data["gambar_2_paket_service"];   ?></td>
                        <td><?php echo $data["gambar_3_paket_service"];   ?></td>
                        <td><?php echo $data["harga_paket_service"];   ?></td>
                        <td><?php echo $data["rating_paket_service"];   ?></td>
                        <td>
                            <a href="update-pack.php?id_paket_service=<?php echo htmlspecialchars($data['id_paket_service']); ?>" class="btn btn-warning" role="button">Update</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_paket_service=<?php echo $data['id_paket_service']; ?>" class="btn btn-danger" role="button">Delete</a>
                            <a href="choose-image-pack.php?id_paket_service=<?=$data['id_paket_service']?>" class="btn btn-primary">Pilih Gambar</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
            </table>
            <a href="create-pack.php" class="btn btn-primary" role="button">Tambah Data</a>
    </div>
</body>

</html>