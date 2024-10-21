<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

echo "<h2>Data Pengguna</h2>";

// Menampilkan semua data dari tabel identitas
$sql_identitas = "SELECT * FROM identitas";
$stmt_identitas = $pdo->query($sql_identitas);
$identitas_list = $stmt_identitas->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>Daftar Semua Identitas</h2>";
echo "<table border='1'>
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>JK</th>
            <th>Tanggal Lahir</th>
            <th>Email</th>
        </tr>";
foreach ($identitas_list as $id) {
    echo "<tr>
            <td>{$id['npm']}</td>
            <td>{$id['nama']}</td>
            <td>{$id['alamat']}</td>
            <td>{$id['jk']}</td>
            <td>{$id['tgl_lhr']}</td>
            <td>{$id['email']}</td>
          </tr>";
}
echo "</table>";

// Cek level pengguna untuk menampilkan data tambahan
if ($_SESSION['level'] == '2') {
    // Untuk admin, tampilkan semua pengguna
    $sql_users = "SELECT * FROM users";
    $stmt_users = $pdo->query($sql_users);
    $users_list = $stmt_users->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<h2>Daftar Semua Pengguna</h2>";
    echo "<table border='1'>
            <tr>
                <th>Username</th>
                <th>NPM</th>
                <th>Level</th>
            </tr>";
    foreach ($users_list as $user) {
        echo "<tr>
                <td>{$user['username']}</td>
                <td>{$user['npm']}</td>
                <td>{$user['level']}</td>
              </tr>";
    }
    echo "</table>";

} elseif ($_SESSION['level'] == '1') {
    // Untuk user biasa, tampilkan data sendiri
    $npm = $_SESSION['npm'];
    $sql_user = "SELECT * FROM users WHERE npm = ?";
    $stmt_user = $pdo->prepare($sql_user);
    $stmt_user->execute([$npm]);
    $user = $stmt_user->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "<h2>Data Pengguna Anda</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Username</th>
                    <th>NPM</th>
                    <th>Level</th>
                </tr>
                <tr>
                    <td>{$user['username']}</td>
                    <td>{$user['npm']}</td>
                    <td>{$user['level']}</td>
                </tr>
              </table>";
    } else {
        echo "<h2>Tidak ada data pengguna yang ditemukan.</h2>";
    }
}
?>
