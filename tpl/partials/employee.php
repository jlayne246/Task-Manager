<?php if ($_SESSION['role'] === 'employee'): ?>
    <main>
        <p>Welcome to the employee page.</p>
    </main>
<?php else: ?>
    <main>
        <p>Access denied!</p>
    </main>
<?php endif; ?>