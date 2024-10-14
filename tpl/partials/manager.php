<?php if ($_SESSION['role'] === 'manager'): ?>
    <main class="content">
        <div class="sub-container">
            <div class="tasks col-8 col-m-8">
                <h1>Tasks</h1>
                <div class="filter" style="text-align:right; margin-bottom:15px;">
                    <form method="post" action="./filter">
                        <input type="hidden" name="manager" value="<?= $_SESSION['user'] ?>"/>
                        <label for="status-filter">Filter By:</label>
                        <select name="status-filter" id="status">
                            <option value="">No Filter</option>
                            <?php foreach ($data['statuses'] as $status): ?>
                                <option value="<?php echo $status; ?>" <?php if ($status == $data['filter']) echo 'selected'; ?>>
                                    <?php echo $status;?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" value="Filter" />
                    </form>
                </div>
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
                <h1>Assign Task</h1>
                <form method="post" action="create-task">
                    <input type="hidden" name="manager_id" value="<?=$_SESSION["user"]?>"/>
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" size="20"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" style="height: 75px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Employee">Employee:</label>
                        <select name="employee" id="employee">
                            <?php foreach ($data['employees'] as $employee): ?>
                                <!-- <optgroup> -->
                                    <option value="<?php echo $employee['user_id']; ?>" <?php if ($employee['user_id'] == $item['assigned_to']) echo 'selected'; ?>>
                                        <?php echo $employee['user_id'] . " - " . $employee['username'];?>
                                    </option>
                                <!-- </optgroup> -->
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" name="date" id="date" size="20"/>
                    </div>
                    <div class="form-btns">
                        <input type="submit" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php else: ?>
    <main>
        <p>Access denied!</p>
    </main>
<?php endif; ?>