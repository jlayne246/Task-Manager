<?php if ($_SESSION['role'] === 'manager'): ?>
    <main>
        <p>Welcome to the manager page.</p>
    </main>
<?php else: ?>
    <main>
        <p>Access denied!</p>
    </main>
<?php endif; ?>