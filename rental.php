<?php 

session_start();
$username=$_SESSION["username"];
$name=$_SESSION["name"];
$conn = mysqli_connect('localhost','root','','kapitaputri');
$result = mysqli_query($conn, "SELECT * FROM rental");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Costume yang Dirental</title>
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
            <a href="rental.php">RENTED</a>
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
    <div class="bgadminmenu">
       <img src="adminmenu.jpg" alt="admin" class="adminmenupic">
        <div class="bgtext">
            <h1>DATA KOSTUM YANG TERENTAL</h1>
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
                    <th>Tanggal Rental</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["kostum"]; ?></td>
                    <td><?php echo $row["nama"]; ?></td>
                    <td><?php echo $row["tglrental"]; ?></td>
                </tr>
            <?php $i++; endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>