-- Active: 1727621525051@@127.0.0.1@3306
<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['level'] != '2') {
    header('Location: login.php');
    exit();
}

echo "Selamat datang, " . $_SESSION['username'] . " di dashboard admin!";
?>
