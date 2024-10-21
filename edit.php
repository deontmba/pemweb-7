<?php
require 'db.php';

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];
    $sql = "SELECT * FROM identitas WHERE npm = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$npm]);
    $identitas = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $email = $_POST['email'];

    $sql = "UPDATE identitas SET nama = ?, alamat = ?, jk = ?, tgl_lhr = ?, email = ? WHERE npm = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nama, $alamat, $jk, $tgl_lhr, $email, $npm]);

    header('Location: index.php');
}
?>

<h2>Edit Identitas</h2>
<form method="POST" action="edit.php?npm=<?= $identitas['npm'] ?>">
    <input type="hidden" name="npm" value="<?= $identitas['npm'] ?>"><br>
    Nama: <input type="text" name="nama" value="<?= $identitas['nama'] ?>"><br>
    Alamat: <input type="text" name="alamat" value="<?= $identitas['alamat'] ?>"><br>
    JK (L/P): <input type="text" name="jk" value="<?= $identitas['jk'] ?>"><br>
    Tanggal Lahir: <input type="date" name="tgl_lhr" value="<?= $identitas['tgl_lhr'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $identitas['email'] ?>"><br>
    <input type="submit" value="Simpan">
</form>
