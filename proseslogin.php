<?php
session_start();

$conn = mysqli_connect('localhost','root','','kapitaputri');
if(!$conn){
	echo "Koneksi gagal";
}

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$hasil = mysqli_query ($conn,$sql);
$jumlah = mysqli_num_rows($hasil);

	if ($jumlah>0) {
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["id"]=$row["id"];
		$_SESSION["username"]=$row["username"];
		$_SESSION["name"]=$row["name"];
		header("Location:index.php");
	}else {
		header("Location:user.php");
	}
	if ($_SESSION["username"] == 'admin') {
		header("Location:adminmenu.php");
	}
?>