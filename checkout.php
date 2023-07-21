<?php

session_start();

if (!isset($_SESSION["username"])) {
	header("Location:login.php");
	exit;
}

$username=$_SESSION["username"];

$conn = mysqli_connect('localhost','root','','kapitaputri');
if(isset($_POST["rental"])){
    $kostum=$_POST["kostum"];
    $ukuran=$_POST["ukuran"];
    $nama=$_POST["nama"];
    $alamat=$_POST["alamat"];
    $notelpon=$_POST["notelpon"];
    $tglrental=$_POST["tglrental"];

    $sql = "INSERT INTO rental VALUES
    ('','$kostum','$ukuran','$nama','$alamat','$notelpon','$tglrental')";

    mysqli_query($conn,$sql);

    if(mysqli_affected_rows($conn)>0){
        echo "<script>
            alert('Selamat pemesanan kamu telah berhasil!');
            document.location.href='store.php';
            </script>" ;
    } else {
        echo "<script>
            alert('Yah pemesanan kamu gagal');
            document.location.href='store.php';
            </script>" ;
    }
}

$id=$_GET["id"];
$checkout = mysqli_query($conn, "SELECT * FROM kostum WHERE id='$id'");
$pelanggan = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="margin-left:0;">
    <header style="margin: 0;">
        <div class="headerregister">
            <a href="index.php">pio.rent</a>
        </div>
    </header>
    <div class="checkoutpage">
        <img src="checkout.jpg" alt="checkout" class="checkoutpic">
        <div class="checkoutbox">
            <div class="checkouttext">
                <h2>Checkout</h2>
                <p>Ayo checkout kostum yang ingin kamu rental!</p>
            </div>
            <?php while ($row1 = mysqli_fetch_assoc($checkout)): ?>
            <form method="POST" class="checkoutform">
                <p>Kostum</p>
                <input type="text" value="<?php echo $row1["kostum"]; ?>" name="kostum" placeholder="Enter your costume name" readonly>
                <p>Ukuran</p>
                <input type="text" value="<?php echo $row1["ukuran"]; ?>" name="ukuran" placeholder="Enter your size" readonly>
                <?php while ($row2 = mysqli_fetch_assoc($pelanggan)): ?>
                <p>Penyewa</p>
                <input type="text" value="<?php echo $row2["nama"]; ?>" name="nama" placeholder="Enter your name" readonly>
                <p>Alamat</p>
                <input type="text" value="<?php echo $row2["alamat"]; ?>" name="alamat" placeholder="Enter your address" readonly>
                <p>Nomor Telepon</p>
                <input type="text" value="<?php echo $row2["notelpon"]; ?>" name="notelpon" placeholder="Enter your phone number" readonly>
                <?php endwhile; ?>
                <p>Tanggal Rental</p>
                <input type="date" name="tglrental">
                <div class="harga">
                    <h2>Harga</h2>
                    <h2>Rp.<?php echo $row1['harga']; ?></h2>
                </div>
                <button type="submit" name="rental" class="rentalbutton">Rental Sekarang!</button>
            </form>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>