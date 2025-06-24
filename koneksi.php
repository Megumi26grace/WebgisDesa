<?php
$host = "localhost";
$user = "webgis_user26"; // Ganti dengan user yang dibuat
$password = "Webgis123!"; // Ganti dengan password
$database = "webgis_purwosaribaru"; // Ganti jika nama db berbeda

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>