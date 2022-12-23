<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $extension = ['jpeg', 'jpg', 'png', 'gif'];
    $imgsname = ['', '', ''];
    $index = 0;
    $id_paket_service = (int)$_POST['id_paket_service'];

    foreach ($_FILES['image']['tmp_name'] as $key => $value) {

        $filename = input($_FILES['image']['name'][$key]);
        $tmp_name = $_FILES['image']['tmp_name'][$key];
        $ext = input(strtolower(pathinfo($filename, PATHINFO_EXTENSION/*to get file extension*/)));
        

        if (in_array($ext, $extension)) {
            if (!file_exists('../images/' . $filename)) {
                var_dump($filename);
                var_dump($tmp_name);
                move_uploaded_file($tmp_name, '../images/' . $filename);
                $filename;
                $imgsname[$index] = $filename;
                $index += 1;
            } else {
                echo "<script>
            alert(`masukkan nama file yang valid(paket_service-urutan)`);
	        location.href = 'choose-image-pack.php'
            </script>";
            }
        } else {
            echo "<script>
            alert(`masukkan tipe data yang benar`);
	        location.href = 'choose-image-pack.php'
            </script>";
        }
    }

    
    $sql = "
    UPDATE `paket_service` 
    SET `gambar_1_paket_service`='$imgsname[0]',`gambar_2_paket_service`='$imgsname[1]',`gambar_3_paket_service`='$imgsname[2]' 
    WHERE 
    id_paket_service = $id_paket_service
    ";

    $hasil = mysqli_query($conn, $sql);

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

function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}