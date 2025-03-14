<?php
require_once __DIR__ . '/../vendor/autoload.php';
session_start();
if (isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit;
}

use Classes\User;

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->login($email, $password)) {
        header("Location: index.php");
    } else {
        echo "Login failed!";
    }
}
?>
<form method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
