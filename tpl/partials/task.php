<?php if ($_SESSION['role'] === 'manager'): ?>
    <main class="content">
        <p>This is a task <?=$data['tasks'][0]['task_id']?>.</p>
    </main>
<?php else: ?>
    <main>
        <p>Access denied!</p>
    </main>
<?php endif; ?>