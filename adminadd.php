<?php

session_start();

if (!isset($_SESSION["username"])) {
	header("Location:login.php");
	exit;
}

$username=$_SESSION["username"];

$conn = mysqli_connect('localhost','root','','kapitaputri');
if(isset($_POST["simpan"])){
    $kostum=$_POST["kostum"];
    $ukuran=$_POST["ukuran"];
    $harga=$_POST["harga"];
    $include=$_POST["include"];
    $gambar = $_FILES["gambar"]["name"];
    $tempname = $_FILES["gambar"]["tmp_name"];
    $folder = "./img/" . $gambar;

    $sql = "INSERT INTO kostum VALUES 
    ('','$kostum','$harga','$ukuran','$include','$gambar')";
    mysqli_query($conn,$sql);

    if (move_uploaded_file($tempname, $folder)) {
        echo "";
    } else {
        echo "<script>
            alert('Gagal mengupload gambar!');
            document.location.href='adminmenu.php';
            </script>";
    }

    if(mysqli_affected_rows($conn)>0){
        echo "<script>
            alert('Informasi kostum sudah ditambah!');
            document.location.href='adminmenu.php';
            </script>" ;
    } else {
        echo "<script>
            alert('Informasi kostum gagal ditambah!');
            document.location.href='adminmenu.php';
            </script>" ;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kostum</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <div class="head">
            <a href="index.php">pio.rent</a>
        </div>
        <div class="tengah">
            <a href="adminmenu.php">MENU</a>
            <a href="adminorder.php">ORDER</a>
        </div>
        <a href="logout.php" class="button">LOGOUT</a>
    </header>
    <hr>
        <div class="addbox">
            <div class="addtext">
                <h2>Tambah Kostum</h2>
            </div>
            <form method="post" class="addform">
                <p>Nama Kostum</p>
                <input type="text" name="kostum" placeholder="Enter your costume" required>
                <p>Harga</p>
                <input type="text" name="harga" placeholder="Enter your price" required>
                <p>Ukuran</p>
                <input type="text" name="ukuran" placeholder="Enter your price" required>
                <p>Include</p>
                <input type="text" name="include" placeholder="Enter your price" required>
                <p>Gambar</p>
                <input id="form-control" type="file" name="gambar">
                <button type="submit" name="simpan" class="addbutton">Tambah</button>
            </form>
        </div>
    </div>
</body>
</html>