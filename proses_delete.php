<!-- proses_delete.php -->
<?php
session_start();

if (isset($_GET['indeks']) && is_numeric($_GET['indeks'])) {
    $indeks = (int)$_GET['indeks'];

    // Periksa apakah indeks ada dalam PHP session
    if (isset($_SESSION['data_array'][$indeks])) {
        // Hapus data sesuai dengan indeks yang dipilih
        unset($_SESSION['data_array'][$indeks]);
        // Setel ulang indeks agar berurutan
        $_SESSION['data_array'] = array_values($_SESSION['data_array']);
    }
}

// Alihkan kembali ke halaman utama
header('Location: index.php');
exit();
?>
