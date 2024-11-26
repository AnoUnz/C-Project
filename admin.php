<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center"> Perpustakaan</h1>
	<a href="tambah.php">tambah</a>
	<div >
    <table align="center" border="2">
		<tr>
			<th>Nomor</th>
			<th>Judul Buku</th>
			<th>Genre Buku</th>
			<th>Tamggal Rilis Buku</th>
			<th>update</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from buku");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['judul']; ?></td>
				<td><?php echo $d['genre']; ?></td>
				<td><?php echo $d['rilis']; ?></td>
				<td>
					<a href="edit.php?ID=<?php echo $d['ID']; ?>">Edit   </a>	
					<a href="hapus.php?id=<?php echo $d['ID']; ?>">Hapus</a>
				</td>
			<?php 
		}
		?>
	</table>
	</div>
</body>
</html>