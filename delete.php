<?php
require 'db.php';

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];
    $sql = "DELETE FROM identitas WHERE npm = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$npm]);

    header('Location: index.php');
}
?>
