<!-- halaman_edit.php -->
<?php
session_start();

if (isset($_GET['no'])) {
    $no = $_GET['no'];
    if (isset($_SESSION['data_tabel'][$no])) {
        $data = $_SESSION['data_tabel'][$no];
    } else {
        header('Location: halaman_tampil_tabel.php');
        exit();
    }
} else {
    header('Location: halaman_tampil_tabel.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data dari formulir edit
    $nama_baru = $_POST['nama'];
    $usia_baru = $_POST['usia'];

    // Update data dalam sesi
    $_SESSION['data_tabel'][$no]['nama'] = $nama_baru;
    $_SESSION['data_tabel'][$no]['usia'] = $usia_baru;

    header('Location: halaman_tampil_tabel.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Tabel</title>
</head>
<body>
    <h1>Edit Data</h1>
    <form action="" method="post">
        Nama: <input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br>
        Usia: <input type="text" name="usia" value="<?php echo $data['usia']; ?>"><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
