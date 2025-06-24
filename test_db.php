<?php
include 'koneksi.php';

$query = "SHOW TABLES";
$result = $conn->query($query);

if ($result) {
    echo "<h2>Koneksi Berhasil! Daftar Tabel:</h2>";
    while ($row = $result->fetch_array()) {
        echo "<p>• " . $row[0] . "</p>";
    }
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>