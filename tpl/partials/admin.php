<?php if ($_SESSION['role'] === 'admin'): ?>
    <main>
        <p>Welcome to the admin page.</p>
    </main>
<?php else: ?>
    <main>
        <p>Access denied!</p>
    </main>
<?php endif; ?>