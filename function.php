<?php

$conn = mysqli_connect("localhost", "root", "", "nimeku");


function getAllFilm()
{
    global $conn;
    $films = mysqli_query($conn, "SELECT * FROM anime");
    $rows = [];
    while ($row = mysqli_fetch_array($films)) {
        $rows[] = $row;
    }
    return $rows;
}

function searchFilm($data) {
    global $conn;
    $input = $data['inputSearch'];
    
    $films = mysqli_query($conn,"SELECT * FROM anime WHERE title LIKE '%$input%'");
    $rows = [];
    while($row = mysqli_fetch_array($films)) {
        $rows[] = $row;
    }
    return $rows;
}
function login($data)
{
    $email = $data["email"];
    $password = $data["password"];
    global $conn;

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' ");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['identifier'] = $email;
            $_SESSION['login'] = true;
            if ($_SESSION['identifier'] == 'admin123@gmail.com') {
                $_SESSION['admin'] = true;
            }
            return mysqli_affected_rows($conn);
        }
    }
    return false;
}

function register($data)
{
    global $conn;

    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];

    $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    if (mysqli_num_rows($duplicate)) {
        echo "<script>
        alert('Email sudah digunakan!');
    </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO user VALUES ('', '$username', '$email', '$password')";
    mysqli_query($conn, $query);
    $_SESSION['login'] = true;
    $_SESSION['identifier'] = $email;
    if ($_SESSION['identifier'] == 'admin123@gmail.com') {
        $_SESSION['admin'] = true;
    }
    return mysqli_affected_rows($conn);
}

function tambahFilm($data)
{
    $judul = $data['judul'];

    $nameGambar = $_FILES['film']['name'];
    $tmpGambar = $_FILES['film']['tmp_name'];
    $errGambar = $_FILES['film']['error'];


    $eksGambarValid = ['jpg', 'jpeg', 'png'];
    $eksGambar = explode('.', $nameGambar);
    $eksGambar = strtolower(end($eksGambar));

    if ($errGambar == 4) {
        echo "<script>
    Swal.fire({
     title: 'Gagal!',
     text: 'Mohon masukkan gambar!',
     icon: 'error'
  });
</script>";
        return false;
    }

    if (!in_array($eksGambar, $eksGambarValid)) {
        echo "<script>
    Swal.fire({
     title: 'Gagal!',
     text: 'Mohon masukkan gambar sesuai ekstensi!',
     icon: 'error'
  });
</script>";
        return false;
    }

    move_uploaded_file($tmpGambar, 'img/' . $nameGambar);

    global $conn;

    $lokasiGambar = "img/$nameGambar";

    $result = mysqli_query($conn, "INSERT INTO anime VALUES('','$judul','$lokasiGambar')");
    return mysqli_affected_rows($conn);
}

function updateFilm($data)
{
    $title = $data['title'];
    $id = $data['id'];

    $nameGambar = $_FILES['img']['name'];
    $tmpGambar = $_FILES['img']['tmp_name'];
    $errGambar = $_FILES['img']['error'];


    $eksGambarValid = ['jpg', 'jpeg', 'png'];
    $eksGambar = explode('.', $nameGambar);
    $eksGambar = strtolower(end($eksGambar));

    if ($errGambar == 4) {
        echo "<script>
    Swal.fire({
     title: 'Gagal!',
     text: 'Mohon masukkan Gambar',
     icon: 'error'
  });
</script>";
        return false;
    }

    if (!in_array($eksGambar, $eksGambarValid)) {
        echo "<script>
    Swal.fire({
     title: 'Gagal!',
     text: 'Mohon masukkan gambar sesuai ekstensi!',
     icon: 'error'
  });
</script>";
        return false;
    }

    move_uploaded_file($tmpGambar, 'img/' . $nameGambar);

    global $conn;

    $lokasiGambar = "img/$nameGambar";

    mysqli_query($conn, "UPDATE anime SET title='$title',img='$lokasiGambar' WHERE id='$id'");
    return mysqli_affected_rows($conn);
}

function getUsername()
{
    global $conn;
    if (isset($_SESSION['identifier'])) {
        $email = $_SESSION['identifier'];
        $username = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
        $username = mysqli_fetch_assoc($username);
        return $username['username'];
    } else {
        return null;
    }
}