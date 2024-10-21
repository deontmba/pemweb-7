<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['level'] != '1') {
    header('Location: login.php');
    exit();
}

echo "Selamat datang, " . $_SESSION['username'] . " di dashboard user!";
?>
