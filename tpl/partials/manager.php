<?php if ($_SESSION['role'] === 'manager'): ?>
    <main class="content">
        <div class="sub-container">
            <div class="tasks col-8 col-m-8">
                <h1>Tasks</h1>
                <div class="manager-tasks-con">
                    <!-- <div class="user-header"> -->
                    <div class="tasks-box tasks-header">Title</div>
                    <div class="tasks-box tasks-header">Description</div>
                    <div class="tasks-box tasks-header">Status</div>
                    <div class="tasks-box tasks-header">Assigned To</div>
                    <div class="tasks-box tasks-header">Created By</div>
                    <div class="tasks-box tasks-header">Due Date</div>
                    <div class="tasks-box tasks-header">View?</div>
                    <!-- </div> -->
                    <?php foreach ($data['tasks'] as $item): ?>
                        <!-- <div class="user-row"> -->
                            <div class="tasks-box"><?php echo $item['title']; ?> </div>
                            <div class="tasks-box"><?php echo $item['description']; ?> </div>
                            <div class="tasks-box"><?php echo $item['status']; ?> </div>
                            <div class="tasks-box"><?php echo $item['assigned_to']; ?> </div>
                            <div class="tasks-box"><?php echo $item['created_by']; ?> </div>
                            <div class="tasks-box"><?php echo $item['due_date']; ?> </div>
                            <div class="tasks-box">
                                <a href="./view-task?task=<?=$item['task_id']?>">View</a>
                            </div>
                        <!-- </div> -->
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="assign-tasks col-4 col-m-4">
                <form method="post" action="assign-task">

                </form>
            </div>
        </div>
    </main>
<?php else: ?>
    <main>
        <p>Access denied!</p>
    </main>
<?php endif; ?>