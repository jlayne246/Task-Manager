<?php

$item = $data['tasks'][0];

if ($_SESSION['role'] === 'manager'): ?>
    <main class="content">
        <p>This is a task <?=$item['task_id']?>.</p>
        <div class="view-task-mode">
            <div class="task-box">Title: <?=$item['title']?></div>
            <div class="task-box">Description: <?=$item['description']?></div>
            <div class="task-box">Assigned to: <?=$item['assigned_to']?></div>
            <div class="task-box">Created by: <?=$item['created_by']?></div>
            <div class="task-box">Comments: <br> <?php
                if (array_key_exists($item['task_id'], $data['comments'])) {
                    foreach ($data['comments'][$item['task_id']] as $comments) {
                        echo "> \t[" . $comments['user_id'] . "]: " . $comments['comment'] . "<br>";
                    }
                } else {
                    echo "\t N/A";
                }
            ?></div>
            <div class="task-box">Due Date: <?=$data['tasks'][0]['due_date']?></div>
        </div>
    </main>
<?php else: ?>
    <main>
        <p>Access denied!</p>
    </main>
<?php endif; ?>