<!-- halaman_tampil_tabel.php -->
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tampil Tabel dan Formulir Edit</title>
</head>
<body>
    <h1>Data Tabel</h1>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Aksi</th>
        </tr>
        <?php
        if (isset($_SESSION['data_tabel'])) {
            $data_tabel = $_SESSION['data_tabel'];
            foreach ($data_tabel as $no => $row) {
                echo "<tr>";
                echo "<td>" . ($no + 1) . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['usia'] . "</td>";
                echo "<td><a href='halaman_edit.php?no=" . $no . "'>Edit</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>

