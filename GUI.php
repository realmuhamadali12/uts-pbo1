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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    if ($_POST["action"] == "tambah") {
        tambahCatatan();
    }
}

function tampilkanCatatan() {
    if (file_exists('catatan.txt')) {
        $catatan = file_get_contents('catatan.txt');
        $catatanArray = explode("\n", $catatan);

        foreach ($catatanArray as $note) {
            echo "<div>";
            echo "<p>{$note}</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Tidak ada catatan.</p>";
    }
}

function tambahCatatan() {
    $judul = $_POST["judul"];
    $isi = $_POST["isi"];
    $catatanBaru = "<strong>{$judul}</strong><br>{$isi}<br><em>" . date('Y-m-d H:i:s') . "</em>\n";

    if (file_put_contents('catatan.txt', $catatanBaru, FILE_APPEND)) {
        echo "Catatan berhasil ditambahkan.";
    } else {
        echo "Error: Gagal menambahkan catatan.";
    }
}
?>

<!-- Formulir untuk menambahkan catatan -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="hidden" name="action" value="tambah">
    <label for="judul">Judul:</label>
    <input type="text" id="judul" name="judul" required>
    <label for="isi">Isi:</label>
    <textarea id="isi" name="isi" required></textarea>
    <input type="submit" value="Tambah Catatan">
</form>

<?php tampilkanCatatan(); ?>

</body>
</html>
