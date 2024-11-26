<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include 'koneksi.php';
        $ID = $_GET['ID'];
        $data = mysqli_query ($koneksi,"select * from buku where ID ='$ID' ");
        while($d = mysqli_fetch_array($data)){
        ?>
        <a href="admin.php">kembali</a>
        <br>
        <form method="post" action="update.php">
            <table>
                <tr>
                    <td>Judul Buku</td>
                    <td><input type="text" name="judul" value="<?php echo $d['judul']?>"></td>
                </tr>
                <tr>
                    <td>Genre</td>
                    <td><input type="text" name="genre" value="<?php echo $d['genre']?>"></td>
                </tr>
                <tr>
                    <td>Tanggal Rilis</td>
                    <td><input type="text" name="rilis" value="<?php echo $d['rilis']?>"></td>
                </tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN"></td>
            </table>
        </form>
        <?php
        }
        ?>
</body>
</html>