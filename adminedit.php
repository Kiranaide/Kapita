<?php

session_start();

if (!isset($_SESSION["username"])) {
	header("Location:login.php");
	exit;
}

$username=$_SESSION["username"];

$conn = mysqli_connect('localhost','root','','kapitaputri');
$id=$_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM kostum WHERE id='$id'");
if(isset($_POST["edit"])){
    $kostum=$_POST["kostum"];
    $harga=$_POST["harga"];
    $ukuran=$_POST["ukuran"];
    $include=$_POST["include"];
    $gambar = $_FILES["gambar"]["name"];
    $tempname = $_FILES["gambar"]["tmp_name"];
    $folder = "./img/" . $gambar;

    $sql = "UPDATE kostum SET
    kostum='$kostum',
    harga='$harga',
    ukuran='$ukuran',
    'include'='$include',
    gambar='$gambar'
    WHERE id='$id'";

    mysqli_query($conn,$sql);

    if(mysqli_affected_rows($conn)>0){
        echo "<script>
            alert('Informasi kostum sudah diedit!');
            document.location.href='adminmenu.php';
            </script>" ;
    } else {
        echo "<script>
            alert('Informasi kostum gagal diedit!');
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
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <form method="post" class="addform">
                <p>Nama Kostum</p>
                <input type="text" value="<?php echo $row ["kostum"]; ?>" name="kostum" placeholder="Enter your costume" required>
                <p>Harga</p>
                <input type="text" value="<?php echo $row ["harga"]; ?>" name="harga" placeholder="Enter your price" required>
                <p>Ukuran</p>
                <input type="text" value="<?php echo $row ["ukuran"]; ?>" name="ukuran" placeholder="Enter your price" required>
                <p>Include</p>
                <input type="text" value="<?php echo $row ["include"]; ?>" name="include" placeholder="Enter your price" required>
                <p>Gambar</p>
                <input id="form-control" type="file" name="gambar">
                <button type="submit" name="edit" class="addbutton">Edit</button>
            </form>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>