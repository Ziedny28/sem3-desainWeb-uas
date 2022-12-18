<?php

$host="localhost";
$user="root";
$password="";
$db="youtube_rahden_adebos_crud_applied";

$conn = mysqli_connect($host,$user,$password,$db);
if (!$conn){
        die("Koneksi Gagal:".mysqli_connect_error());
        
}
?>