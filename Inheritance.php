<?php

// Kelas Induk atau Superclass
class Kendaraan {
    protected $merk;
    protected $warna;

    // Konstruktor
    public function __construct($merk, $warna) {
        $this->merk = $merk;
        $this->warna = $warna;
    }

    public function infoKendaraan() {
        echo "Merk: {$this->merk}, Warna: {$this->warna}\n";
    }
}

// Kelas Turunan atau Subclass
class Mobil extends Kendaraan {
    protected $jenis;

    // Konstruktor
    public function __construct($merk, $warna, $jenis) {
        // Memanggil konstruktor kelas induk
        parent::__construct($merk, $warna);
        $this->jenis = $jenis;
    }

    public function infoMobil() {
        echo "Jenis: {$this->jenis}\n";
    }
}

// Membuat objek dari kelas turunan
$mobil1 = new Mobil("Toyota", "Merah", "Sedan");

// Memanggil metode dari kelas induk
$mobil1->infoKendaraan();

// Memanggil metode dari kelas turunan
$mobil1->infoMobil();

?>
