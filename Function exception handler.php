<?php

// Fungsi exception handler kustom
function customExceptionHandler($exception) {
    echo "Exception caught: " . $exception->getMessage() . "\n";
}

// Mengatur fungsi exception handler kustom
set_exception_handler('customExceptionHandler');

// Fungsi untuk membagi dua angka
function bagi($a, $b) {
    if ($b == 0) {
        // Menghasilkan pengecualian jika pembagi adalah 0
        throw new Exception("Pembagi tidak boleh nol");
    }
    return $a / $b;
}

// Contoh penggunaan fungsi bagi dengan pengecualian
try {
    $hasil = bagi(10, 2);
    echo "Hasil: " . $hasil . "\n";

    // Mencoba membagi dengan pembagi 0
    $hasil = bagi(8, 0);
    echo "Hasil: " . $hasil . "\n"; // Baris ini tidak akan tercapai
} catch (Exception $e) {
    // Penanganan pengecualian
    echo "Error: " . $e->getMessage() . "\n";
}

?>
