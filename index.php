<?php
require 'db.php';

$sql = "SELECT * FROM identitas";
$stmt = $pdo->query($sql);
$identitas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Daftar Identitas</h2>
<a href="create.php">Tambah Identitas</a>
<table border="1">
    <tr>
        <th>NPM</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>JK</th>
        <th>Tanggal Lahir</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($identitas as $id): ?>
        <tr>
            <td><?= $id['npm'] ?></td>
            <td><?= $id['nama'] ?></td>
            <td><?= $id['alamat'] ?></td>
            <td><?= $id['jk'] ?></td>
            <td><?= $id['tgl_lhr'] ?></td>
            <td><?= $id['email'] ?></td>
            <td>
                <a href="edit.php?npm=<?= $id['npm'] ?>">Edit</a>
                <a href="delete.php?npm=<?= $id['npm'] ?>" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
