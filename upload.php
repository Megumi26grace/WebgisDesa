<?php
// Koneksi database
$conn = new mysqli("localhost", "username", "password", "nama_database");

// Tangani upload
if(isset($_FILES['foto'])) {
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    
    // Ubah nama file sesuai dengan ID atau nama infrastruktur
    $infra_id = $_POST['id'];
    $new_filename = $target_dir . $infra_id . '.jpg';
    
    if(move_uploaded_file($_FILES["foto"]["tmp_name"], $new_filename)) {
        // Update path foto di database
        $sql = "UPDATE infrastruktur SET foto = '$new_filename' WHERE id = $infra_id";
        $conn->query($sql);
        echo "success";
    } else {
        echo "error";
    }
}
$conn->close();
?>