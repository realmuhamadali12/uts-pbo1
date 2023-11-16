<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    if ($_POST["action"] == "tambah") {
        tambahCatatan();
    }
}

function bukaKoneksi() {
    $host = "localhost";
    $username = "root";
    $password = "ali123";
    $database = "alidb";

    $koneksi = new mysqli($host, $username, $password, $database);

    if ($koneksi->connect_error) {
        die("Koneksi database gagal: " . $koneksi->connect_error);
    }

    return $koneksi;
}

function tampilkanCatatan() {
    $koneksi = bukaKoneksi();
    $query = "SELECT * FROM catatan ORDER BY tanggal_pembuatan DESC";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<p><strong>{$row['judul']}</strong><br>{$row['isi']}<br><em>{$row['tanggal_pembuatan']}</em></p>";
            echo "</div>";
        }
    } else {
        echo "<p>Tidak ada catatan.</p>";
    }

    $koneksi->close();
}

function tambahCatatan() {
    $koneksi = bukaKoneksi();
    $judul = $_POST["judul"];
    $isi = $_POST["isi"];
    $query = "INSERT INTO catatan (judul, isi) VALUES ('$judul', '$isi')";
    
    if ($koneksi->query($query) === TRUE) {
        echo "Catatan berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Catatan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 10px;
        }
        div {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<h2>Aplikasi Catatan</h2>

<?php tampilkanCatatan(); ?>

<!-- Formulir untuk menambahkan catatan -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="hidden" name="action" value="tambah">
    <label for="judul">Judul:</label>
    <input type="text" id="judul" name="judul" required>
    <label for="isi">Isi:</label>
    <textarea id="isi" name="isi" required></textarea>
    <input type="submit" value="Tambah Catatan">
</form>

</body>
</html>
