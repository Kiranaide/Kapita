<?php

session_start();

$username=$_SESSION["username"];
$conn = mysqli_connect('localhost','root','','kapitaputri');
$result = mysqli_query($conn, "SELECT * FROM rental");

if ($_SESSION["username"] != 'admin') {
    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Order</title>
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
    <div class="bgadminmenu">
       <img src="adminmenu.jpg" alt="admin" class="adminmenupic">
        <div class="bgtext">
            <h1>DATA ORDER</h1>
        </div>
    </div>
    <div class="headtabel">
        <h2>List Perental</h2>
    </div>
    <div class="datakostum">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kostum</th>
                    <th>Penyewa</th>
                    <th>Alamat</th>
                    <th>No.Telepon</th>
                    <th>Tanggal Rental</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["kostum"]; ?></td>
                    <td><?php echo $row["nama"]; ?></td>
                    <td><?php echo $row["alamat"]; ?></td>
                    <td><?php echo $row["notelpon"]; ?></td>
                    <td><?php echo $row["tglrental"]; ?></td>
                </tr>
            <?php $i++; endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>