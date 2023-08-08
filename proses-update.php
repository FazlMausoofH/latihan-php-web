<!-- proses_update.php -->
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['indeks']) && is_numeric($_GET['indeks'])) {
    $indeks = (int)$_GET['indeks'];

    if (isset($_POST['nama']) && isset($_POST['usia'])) {
        $nama = $_POST['nama'];
        $usia = $_POST['usia'];

        // Periksa apakah indeks ada dalam PHP session
        if (isset($_SESSION['data_array'][$indeks])) {
            // Perbarui data sesuai dengan indeks yang dipilih
            $_SESSION['data_array'][$indeks]['nama'] = $nama;
            $_SESSION['data_array'][$indeks]['usia'] = $usia;
        }
    }
}

// Alihkan kembali ke halaman utama
header('Location: index.php');
exit();
?>
