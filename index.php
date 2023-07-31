<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="head">
            <a href="index.php">pio.rent</a>
        </div>
        <div class="tengah">
            <a href="#about">ABOUT</a>
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
    <div class="home">
        <div class="deskripsi">
            <h3>SOLUSI KEBUTUHAN COSTUME ANIME KALIAN</h3>
            <hr>
            <p>pio.rent adalah platform sewa kostum anime yang inovatif, 
            yang bertujuan untuk memenuhi hasrat dan imajinasi penggemar anime di seluruh dunia. 
            Dengan koleksi kostum yang luas dan berkualitas tinggi, kami menyediakan kesempatan bagi Anda 
            untuk mengenakan kostum pahlawan atau karakter anime favorit Anda dalam acara cosplay, 
            pesta kostum, acara komunitas, atau bahkan untuk sesi foto yang epik.</p>
            <?php 
            if(isset($_SESSION["username"])){
                echo "<a href='store.php' class='button'>PILIH SEKARANG</a>";
            } else {
                echo "<a href='register.php' class='button'>MULAI MENDAFTAR</a>";
            }
        ?>
        </div> 
        <img src="home.jpg" alt="home" class="homepic">
    </div>
    <div class="about" id="about">
        <div class="bgaboutme">
            <img src="about.jpg" alt="about" class="aboutpic">
            <div class="bgtext">
                <h1>ABOUT ME</h1>
            </div>
        </div>
        <div class="introduction">
            <div class="intro">
                <h2>PUTRI DELIMA</h2>
                <h3>20101152610075</h2>
                <p>Saya adalah seorang mahasiswi yang sedang menempuh pendidikan di Universitas Putra Indonesia YPTK Padang. 
                Saya aktif dalam kegiatan akademik dan berdedikasi untuk mencapai prestasi yang baik. 
                Saya juga memiliki minat dan semangat belajar yang tinggi</p>
            </div>
            <img src="introduction.jpg" alt="introduction" class="introductionpic">
        </div>
    </div>
</body>
</html>