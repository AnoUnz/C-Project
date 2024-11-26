<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <a href="admin.php">kembali</a>
        <br>
        <form method="post" action="tambah_aksi.php">
            <table>
                <tr>
                    <td>ID</td>
                    <td><input type="text" name="ID"></td>
                </tr>
                <tr>
                    <td>Judul Buku</td>
                    <td><input type="text" name="judul"></td>
                </tr>
                <tr>
                    <td>Genre</td>
                    <td><input type="text" name="genre"></td>
                </tr>
                <tr>
                    <td>Tanggal Rilis</td>
                    <td><input type="text" name="rilis"></td>
                </tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN"></td>
            </table>
        </form>
</body>
</html>