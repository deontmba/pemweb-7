<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $email = $_POST['email'];

    $sql = "INSERT INTO identitas (npm, nama, alamat, jk, tgl_lhr, email) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$npm, $nama, $alamat, $jk, $tgl_lhr, $email]);

    header('Location: index.php');
}

?>

<h2>Tambah Identitas</h2>
<form method="POST" action="create.php">
    NPM: <input type="text" name="npm" required><br>
    Nama: <input type="text" name="nama" required><br>
    Alamat: <input type="text" name="alamat" required><br>
    JK (L/P): <input type="text" name="jk" required><br>
    Tanggal Lahir: <input type="date" name="tgl_lhr" required><br>
    Email: <input type="email" name="email" required><br>
    <input type="submit" value="Simpan">
</form>
