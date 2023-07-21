<?php
$conn = mysqli_connect('localhost','root','','kapitaputri');
$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM kostum WHERE id='$id'");

if (mysqli_affected_rows($conn)>0){
    echo"<script>
    alert('Data berhasil dihapus');
    document.location.href='adminmenu.php';
    </script>";
}
?>