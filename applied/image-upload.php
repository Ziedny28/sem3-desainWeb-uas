<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $extension = ['jpeg', 'jpg', 'png', 'gif'];
    $imgsname = ['', '', ''];
    $index = 0;
    $id_destinasi = (int)$_POST['id_destinasi'];

    foreach ($_FILES['image']['tmp_name'] as $key => $value) {

        $filename = input($_FILES['image']['name'][$key]);
        $tmp_name = $_FILES['image']['tmp_name'][$key];
        $ext = input(strtolower(pathinfo($filename, PATHINFO_EXTENSION/*to get file extension*/)));
        

        if (in_array($ext, $extension)) {
            if (!file_exists('images/' . $filename)) {
                var_dump($filename);
                var_dump($tmp_name);
                move_uploaded_file($tmp_name, 'images/' . $filename);
                $filename;
                $imgsname[$index] = $filename;
                $index += 1;
            } else {
                echo "<script>
            alert(`masukkan nama file yang valid(destinasi-urutan)`);
	        location.href = 'choose-image.php'
            </script>";
            }
        } else {
            echo "<script>
            alert(`masukkan tipe data yang benar`);
	        location.href = 'choose-image.php'
            </script>";
        }
    }

    
    $sql = "
    UPDATE `destinasi` 
    SET `gambar_1`='$imgsname[0]',`gambar_2`='$imgsname[1]',`gambar_3`='$imgsname[2]' 
    WHERE 
    id_destinasi = $id_destinasi
    ";

    $hasil = mysqli_query($conn, $sql);

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

function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}