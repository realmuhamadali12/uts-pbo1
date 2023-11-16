<?php

// Kelas Induk atau Superclass
class Bentuk {
    // Metode untuk menghitung luas
    public function hitungLuas() {
        return 0; // Default implementation
    }
}

// Kelas Turunan atau Subclass 1
class Persegi extends Bentuk {
    private $sisi;

    // Konstruktor
    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    // Override metode hitungLuas
    public function hitungLuas() {
        return $this->sisi * $this->sisi;
    }
}

// Kelas Turunan atau Subclass 2
class Segitiga extends Bentuk {
    private $alas;
    private $tinggi;

    // Konstruktor
    public function __construct($alas, $tinggi) {
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }

    // Override metode hitungLuas
    public function hitungLuas() {
        return 0.5 * $this->alas * $this->tinggi;
    }
}

// Fungsi untuk menghitung dan mencetak luas bentuk
function cetakLuas(Bentuk $bentuk) {
    echo "Luas: " . $bentuk->hitungLuas() . "\n";
}

// Membuat objek dan menghitung luas
$persegi = new Persegi(4);
$segitiga = new Segitiga(3, 6);

// Menggunakan polymorphism untuk mencetak luas
cetakLuas($persegi);
cetakLuas($segitiga);

?>
