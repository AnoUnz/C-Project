<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/css/lc.css">
	<title>Login cenah</title>
    <link rel="stylesheet" href="lc.css">
</head>
<body>
	<?php
	if(isset($_GET['pesan'])){
		if($_GET['pesan']== "gagal"){
			echo "Login gagal! username dan password salah";
		}else if($_GET['pesan']=="Logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan']== "belum_login"){
			echo "anda harus login untuk mengakses halaman berikutnya";
		}
	}
	?>
	<div class="login-wrap">
	<form method="POST" action="aksi_login.php">
  <h2>Login</h2>
  
  <div class="form">
    <input type="text" placeholder="Username" name="Username" id="username" />
    <input type="password" placeholder="Password" name="Password" id="password" />
    <button> Sign in </button>
	</form>
    <a href="#"> <p> Don't have an account? Register </p></a>
  </div>
</div>
</body>
</html>