<?php

class Mahasiswa {
    private $nama;
    private $nim;

    // Getter untuk mendapatkan nilai $nama
    public function getNama() {
        return $this->nama;
    }

    // Setter untuk mengatur nilai $nama
    public function setNama($nama) {
        $this->nama = $nama;
    }

    // Getter untuk mendapatkan nilai $nim
    public function getNim() {
        return $this->nim;
    }

    // Setter untuk mengatur nilai $nim
    public function setNim($nim) {
        $this->nim = $nim;
    }
}

// Membuat objek dari kelas Mahasiswa
$mahasiswa1 = new Mahasiswa();

// Mengatur nilai menggunakan setter
$mahasiswa1->setNama("Muhamad Ali");
$mahasiswa1->setNim("123456");

// Mendapatkan nilai menggunakan getter
echo "Nama: " . $mahasiswa1->getNama() . "\n";
echo "NIM: " . $mahasiswa1->getNim() . "\n";

?>
