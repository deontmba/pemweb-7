<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $npm = $_POST['npm'];
    $level = $_POST['level'];

    $sql = "INSERT INTO users (username, pass, npm, level) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $pass, $npm, $level]);

    header('Location: login.php');
}
?>

<h2>Register</h2>
<form method="POST" action="register.php">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="pass" required><br>
    NPM: <input type="text" name="npm" required><br>
    Level (1=user, 2=admin): <input type="text" name="level" required><br>
    <input type="submit" value="Register">
</form>
