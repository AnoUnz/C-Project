<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$ID = $_POST['ID'];
$judul = $_POST['judul'];
$genre = $_POST['genre'];
$rilis = $_POST['rilis'];
 
// update data ke database
mysqli_query($koneksi,"update buku set ID='$ID', judul='$judul', genre='$genre' where rilis='$rilis'");
 
// mengalihkan halaman kembali ke index.php
header("location:admin.php");
 
?>