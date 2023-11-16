<?php
$host = "localhost";
$username = "root";
$password = "ali123";
$database = "alidb";

// Membuat koneksi
$koneksi = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

// Mengeksekusi query SQL
$query = "SELECT * FROM contoh_table";
$result = $koneksi->query($query);

// Memproses hasil query
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nama: " . $row["nama"] . "<br>";
    }
} else {
    echo "Tidak ada data.";
}

// Menutup koneksi
$koneksi->close();
?>
