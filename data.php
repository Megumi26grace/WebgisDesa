<?php
include 'koneksi.php';

$sql = "SELECT * FROM infrastruktur";
$result = $conn->query($sql);

$features = [];

while ($row = $result->fetch_assoc()) {
    // Format nama file yang sangat ketat
    $namaFile = $row['Nama Infrastruktur'];
    $namaFile = mb_strtolower($namaFile, 'UTF-8'); // Handle case sensitive
    $namaFile = preg_replace('/\s+/', '_', $namaFile); // Ganti spasi dengan underscore
    $namaFile = preg_replace('/[^\w_]/u', '', $namaFile); // Hapus karakter khusus
    $namaFile .= '.jpg';
    
    // Log untuk debugging
    error_log("Mencocokkan: " . $row['Nama Infrastruktur'] . " -> " . $namaFile);
    
    $features[] = [
        "type" => "Feature",
        "properties" => [
            "nama" => $row['Nama Infrastruktur'],
            "kondisi" => $row['Kondisi'],
            "keterangan" => $row['Keterangan'],
            "alamat" => $row['Alamat'],
            "foto" => 'img/' . $namaFile
        ],
        "geometry" => [
            "type" => "Point",
            "coordinates" => [
                floatval($row['longitude']),
                floatval($row['latitude'])
            ]
        ]
    ];
}

$geojson = [
    "type" => "FeatureCollection",
    "features" => $features
];

header('Content-Type: application/json');
echo json_encode($geojson, JSON_PRETTY_PRINT);
?>