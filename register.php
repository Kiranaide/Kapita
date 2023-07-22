<?php
    session_start();

    $conn = mysqli_connect('localhost','root','','kapitaputri');

    if (isset($_POST["register"])){
        $nama=$_POST["nama"];
        $username=$_POST["username"];
        $password=$_POST["password"];
        $alamat=$_POST["alamat"];
        $notelpon=$_POST["notelpon"];

        $q="INSERT INTO user VALUES('','$nama','$username','$password','$alamat','$notelpon') ";
        mysqli_query($conn,$q);

        if(mysqli_affected_rows($conn)>0){
            echo"<script>
            alert('Terima kasih sudah bergabung dengan kami! Silahkan melanjutkan proses login.');
            document.location.href='login.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="margin-left: 0;">
    <header style="margin: 0;">
        <div class="headerregister">
            <a href="index.php">pio.rent</a>
        </div>
    </header>
    <div class="registerpage">
        <img src="register.jpg" alt="register" class="registerpic">
        <div class="registerbox">
            <div class="registertext">
                <h2>Create an Account</h2>
                <h3>The faster you register, the faster you can book your costume</h3>
            </div>
            <form method="post" class="registerform">
                <p>Nama</p>
                <input type="text" name="nama" placeholder="Enter your name" required>
                <p>Username</p>
                <input type="text" name="username" placeholder="Enter your username" required>
                <p>Password</p>
                <input type="password" name="password" placeholder="********" required>
                <p>Alamat</p>
                <input type="text" name="alamat" placeholder="Enter your address" required>
                <p>Nomor Telepon</p>
                <input type="text" name="notelpon" placeholder="Enter your phone number" required>
                <button type="submit" name="register" class="registerbutton">Register</button>
            </form>
            <p>Have an account?<a href="login.php"> Login </a></p>
        </div>
    </div>
</body>
</html>