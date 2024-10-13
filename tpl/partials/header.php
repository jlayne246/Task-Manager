<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Task Management System'; ?></title>
    <link rel="stylesheet" href="css/styles.css"/>
    <script src="js/toggleAdmin.js"></script>
    <script src="js/toggleEmployee.js"></script>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="./">Home</a></li>
                <?php if (isset($_SESSION['authstatus']) && $_SESSION['authstatus'] === true): ?>
                    <li><a href="./<?= SessionManager::get('role') ?>">Dashboard</a></li>
                    <li><a href="./tasks">Tasks</a></li>
                    <li style="float:right"><a href="./logout">Logout</a></li>
                <?php else: ?>
                    <li style="float:right"><a href="./login">Login</a></li>
                    <li style="float:right"><a href="./register">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>