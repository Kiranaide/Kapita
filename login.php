<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="margin-right: 0">
    <header style="margin: 0;">
        <div class="headerlogin">
            <a href="index.php">pio.rent</a>
        </div>
    </header>
    <div class="loginpage">
        <div class="loginbox">
            <div class="logintext">
                <h2>Welcome Back!</h2>
                <h3>The faster you fill up, the faster you can book your costume</h3>
            </div>
            <form method="post" action="proseslogin.php" class="loginform">
                <p>Username</p>
                <input type="text" name="username" placeholder="Enter your username" required>
                <p>Password</p>
                <input type="password" name="password" placeholder="********" required>
                <button type="submit" name="login" class="loginbutton">Login</button>
            </form>
            <p>Don't have an account?<a href="register.php"> Sign Up </a></p>
        </div>
        <img src="login.jpg" alt="login" class="loginpic">
    </div>
</body>
</html>