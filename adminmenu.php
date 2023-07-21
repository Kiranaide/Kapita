<?php

session_start();

$username=$_SESSION["username"];
$conn = mysqli_connect('localhost','root','','kapitaputri');
$result = mysqli_query($conn, "SELECT * FROM kostum");

if ($_SESSION["username"] != 'admin') {
    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Menu</title>
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
            <h1>DATA COSTUME</h1>
        </div>
    </div>
    <div class="headtabel">
        <h2>List Kostum</h2>
        <a href='adminadd.php' class='button'>Tambah</a>
    </div>
    <div class="datakostum">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kostum</th>
                    <th>Harga</th>
                    <th>Ukuran</th>
                    <th>Include</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["kostum"]; ?></td>
                    <td><?php echo $row["harga"]; ?></td>
                    <td><?php echo $row["ukuran"]; ?></td>
                    <td><?php echo $row["include"]; ?></td>
                    <td><a href="adminedit.php?id=<?php echo $row["id"]; ?>">Edit</a> / <a href="admindelete.php?id=<?php echo $row["id"]; ?>">Hapus</a></td>
                </tr>
            <?php $i++; endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>