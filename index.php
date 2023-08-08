<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP Tanpa Database</title>
</head>
<body>
    <h1>CRUD PHP Tanpa Database</h1>

    <!-- Formulir untuk membuat data baru -->
    <h2>Buat Data Baru</h2>
    <form action="proses_create.php" method="post">
        Nama: <input type="text" name="nama" required><br>
        Usia: <input type="number" name="usia" required><br>
        <input type="submit" value="Simpan Data">
    </form>

    <!-- Tabel untuk menampilkan data yang ada -->
    <h2>Data Tersimpan:</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Aksi</th>
        </tr>
        <?php
        session_start();

        if (isset($_SESSION['data_array'])) {
            foreach ($_SESSION['data_array'] as $index => $data) {
                echo "<tr>";
                echo "<td>" . ($index + 1) . "</td>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['usia'] . "</td>";
                echo "<td><a href='proses_update.php?indeks=$index'>Edit</a> | <a href='proses_delete.php?indeks=$index'>Hapus</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Belum ada data tersimpan.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
