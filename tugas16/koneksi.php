<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_shop";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
else{
    
}

// Menutup koneksi
$conn->close();
?>