<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($pass, $user['pass'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['level'] = $user['level'];

        if ($user['level'] == '1') {
            header('Location: user_dashboard.php');
        } elseif ($user['level'] == '2') {
            header('Location: admin_dashboard.php');
        }
    } else {
        echo "Login gagal!";
    }
}
?>

<h2>Login</h2>
<form method="POST" action="login.php">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="pass" required><br>
    <input type="submit" value="Login">
</form>
