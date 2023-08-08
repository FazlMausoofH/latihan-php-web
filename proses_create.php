<!-- proses_create.php -->
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nama']) && isset($_POST['usia'])) {
        $nama = $_POST['nama'];
        $usia = $_POST['usia'];

        // Buat data baru dalam PHP session
        if (!isset($_SESSION['data_array'])) {
            $_SESSION['data_array'] = array();
        }

        array_push($_SESSION['data_array'], array('nama' => $nama, 'usia' => $usia));
    }
}

// Alihkan kembali ke halaman utama
header('Location: index.php');
exit();
?>
