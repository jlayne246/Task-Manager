<?php 

if ($_SESSION['role'] === 'employee'): ?>
    <main class="content">
    <div class="container">
            <div class="sub-container">
                <div class="col-1 col-m-1"></div>
                <div class="col-10 col-m-10">
                    <h1>Tasks</h1>
                    <div class="emp-tasks-con">
                        <!-- <div class="user-header"> -->
                        <div class="tasks-box tasks-header"> Title </div>
                        <div class="tasks-box tasks-header"> Description </div>
                        <div class="tasks-box tasks-header">Status</div>
                        <div class="tasks-box tasks-header">Assigned To</div>
                        <div class="tasks-box tasks-header">Created By</div>
                        <div class="tasks-box tasks-header">Due Date</div>
                        <div class="tasks-box tasks-header">Update?</div>
                        <div class="tasks-box tasks-header">Comments</div>
                        <div class="tasks-box tasks-header">Add Comment?</div>
                        <!-- </div> -->
                        <?php foreach ($data['tasks'] as $item): ?>
                            <!-- <div class="user-row"> -->
                                <div class="tasks-box"><?php echo $item['title']; ?> </div>
                                <div class="tasks-box"><?php echo $item['description']; ?> </div>
                                <div class="view-edit-mode" data-task-id="<?php echo $item['task_id']; ?>">
                                    <div class="tasks-box"><?php echo $item['status']; ?> </div>
                                </div>
                                <div class="edit-mode" data-task-id="<?php echo $item['task_id']; ?>">
                                    <form method="post" action="./update-progress">
                                        <input type="hidden" name="task" value="<?=$item['task_id']?>"/>
                                        <input type="hidden" name="user" value="<?=$_SESSION["user"]?>"/>
                                        <select name="status" id="status">
                                            <?php foreach ($data['statuses'] as $status): ?>
                                                <option value="<?php echo $status; ?>" <?php if ($status == $item['status']) echo 'selected'; ?>>
                                                    <?php echo $status;?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                </div>
                                <div class="tasks-box"><?php echo $item['assigned_to']; ?> </div>
                                <div class="tasks-box"><?php echo $item['created_by']; ?> </div>
                                <div class="tasks-box"><?php echo $item['due_date']; ?> </div>
                                <div class="tasks-box">
                                    <div class="view-edit-mode" data-task-id="<?php echo $item['task_id']; ?>">
                                        <a href="javascript:void(0);" onclick="toggleEditMode_Emp(<?php echo $item['task_id']; ?>)">Update</a>
                                    </div>
                                    <div class="edit-mode" data-task-id="<?php echo $item['task_id']; ?>">
                                            <input type="submit" value="Update" />
                                            <input type="button" onclick="toggleEditMode_Emp(<?php echo $item['task_id']; ?>)" value="Cancel" />
                                        </form>
                                    </div>
                                </div>
                                <div class="view-create-mode" data-task-id="<?php echo $item['task_id']; ?>">
                                    <div class="tasks-box">
                                        <?php
                                            if (array_key_exists($item['task_id'], $data['comments'])) {
                                                foreach ($data['comments'][$item['task_id']] as $comments) {
                                                    
                                                    echo "> " . $comments['comment'] . "<br>";
                                                }
                                            } else {
                                                echo "N/A";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="create-mode" data-task-id="<?php echo $item['task_id']; ?>">
                                    <form method="post" action="./create-comment">
                                        <input type="hidden" name="task" value="<?=$item['task_id']?>"/>
                                        <input type="hidden" name="user" value="<?=$_SESSION["user"]?>"/>
                                        <textarea name="comment"></textarea>
                                </div>
                                <div class="view-create-mode" data-task-id="<?php echo $item['task_id']; ?>">
                                    <div class="tasks-box"><a href="javascript:void(0);" onclick="toggleCreateMode_Emp(<?php echo $item['task_id']; ?>)">Add Comment</a> </div>
                                </div>
                                <div class="create-mode" data-task-id="<?php echo $item['task_id']; ?>">
                                        <input type="submit" value="Comment" />
                                        <input type="button" onclick="toggleCreateMode_Emp(<?php echo $item['task_id']; ?>)" value="Cancel" />
                                    </form>
                                </div>
                            <!-- </div> -->
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-1 col-m-1">
                </div>
            </div>
        </div>
    </main>
<?php else: ?>
    <main>
        <p>Access denied!</p>
    </main>
<?php endif; ?>