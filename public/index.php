<?php
require_once __DIR__ . '/../vendor/autoload.php';
session_start();
if (!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

use Classes\User;

$user = new User();
$users = $user->getUsers();
?>

<h2>Welcome, <?= $_SESSION['user_name']; ?></h2>
<a href="logout.php">Logout</a>

<table border="1">
    <tr>
        <th>Name</th><th>Email</th><th>Actions</th>
    </tr>
    <?php foreach ($users as $u): ?>
        <tr>
            <td><?= $u['name'] ?></td>
            <td><?= $u['email'] ?></td>
            <td>
                <a href="edit.php?id=<?= $u['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $u['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
