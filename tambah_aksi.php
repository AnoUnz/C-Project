<?php
include 'koneksi.php';

$ID = $_POST['ID'];
$judul = $_POST['judul'];
$genre = $_POST['genre'];
$rilis = $_POST['rilis'];

mysqli_query($koneksi,"insert into buku values('$ID','$judul','$genre','$rilis')");

header("location:admin.php");

?>