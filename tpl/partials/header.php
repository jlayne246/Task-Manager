<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Task Management System'; ?></title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="./">Home</a></li>
                <?php if (isset($_SESSION['authstatus']) && $_SESSION['authstatus'] === true): ?>
                    <li><a href=<?php "./{$_SESSION['role']}"?>>Dashboard</a></li>
                    <li><a href="./tasks">Tasks</a></li>
                    <li><a href="./logout">Logout</a></li>
                <?php else: ?>
                    <li><a href="./login">Login</a></li>
                    <li><a href="./register">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>