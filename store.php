<?php 

session_start();
$conn = mysqli_connect('localhost','root','','kapitaputri');
if(!$conn){
	echo "Koneksi gagal";
}
if (!isset($_SESSION["username"])) {
    header("Location:login.php");
    exit;
}
$username=$_SESSION["username"];
$name=$_SESSION["name"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="head">
            <a href="index.php">pio.rent</a>
        </div>
        <div class="tengah">
            <a href="index.php#about">ABOUT</a>
            <a href="store.php">STORE</a>
        </div>
        <?php 
            if(isset($_SESSION["username"])){
                echo "<a href='logout.php' class='button'>LOGOUT</a>";
            } else {
                echo "<a href='login.php' class='button'>LOGIN</a>";
            }
        ?>
    </header>
    <hr>
    <div class="katalog">
        <div class="headkatalog">
            <p>Catalogue Costume</p>
        </div>
        <div class="isikatalog">
            <?php 
                $db = "SELECT * FROM kostum";
                $query = mysqli_query($conn, $db);
                while ($data=mysqli_fetch_object($query)) {?>
                <div class="card">
                    <div class="detailcard">
                        <p><?php echo $data->kostum; ?></p>
                        <div class="infocard">
                            <p>Rp.<?php echo $data->harga; ?>,-</p>
                            <div class="size">
                                <h5><?php echo $data->ukuran; ?></h5>
                                <p>Size</p>
                            </div>
                        </div>
                    </div>
                    <img src="img/<?php echo $data->gambar; ?>">
                    <a href="checkout.php?id=<?php echo $data->id; ?>"class="button">Rental Sekarang</a>
                </div>
            <?php    
            }
            ?>
        </div>
    </div>
</body>
</html>