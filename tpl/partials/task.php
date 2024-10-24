<?php
$item = $data['tasks'][0];
?>
<main class="content">
    <div class="container">
        <h1>View Task</h1>
        <div class="sub-container">
            <div class="box">
                <div class="col-3 col-m-3"></div>
                <div class="view-task-mode col-12 col-m-12">
                    <div class="task-box"><span style="font-weight: bold;">Title:</span> <br> <span class="fields"><?=$item['title']?></span></div>
                    <div class="task-box"><span style="font-weight: bold;">Description:</span> <br> <span class="fields"><?=$item['description']?></span></div>
                    <div class="task-box"><span style="font-weight: bold;">Status:</span> <br> <span class="fields"><?=$item['status']?></span></div>
                    <div class="task-box"><span style="font-weight: bold;">Assigned to:</span> <br> <span class="fields"><?=$item['assigned_to']?></span></div>
                    <div class="task-box"><span style="font-weight: bold;">Created by:</span> <br> <span class="fields"><?=$item['created_by']?></span></div>
                    <div class="task-box"><span style="font-weight: bold;">Comments:</span> <br> <span class="fields">
                    <?php
                        if (array_key_exists($item['task_id'], $data['comments'])) {
                            foreach ($data['comments'][$item['task_id']] as $comments) {
                                echo "> \t[" . $comments['user_id'] . "]: " . $comments['comment'] . "<br>";
                            }
                        } else {
                            echo "\t N/A";
                        }
                    ?>
                    </span> </div>
                    <div class="task-box"><span style="font-weight: bold;">Due Date:</span> <br> <span class="fields"><?=$item['due_date']?></span></div>
                    <div id="edit-btn">
                        <?php if($_SESSION['role'] === "manager"): ?>
                            <input type="button" value="Edit" onclick="toggleTaskEdit();" />
                        <?php endif; ?>
                        <input type="button" value="Back" onclick="history.back();" />
                    </div>
                </div>
                <div class="edit-task-mode col-12 col-m-12">
                    <form method="POST" action="./edit-task">
                        <div class="form-group">
                            <label for="title">Title: </label>
                            <input type="text" name="title" id="title" value="<?=$item['title'];?>" />
                        </div>
                        <div class="form-group">
                            <label for="description">Description: </label>
                            <textarea name="description" id="description"><?=$item['description'];?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status: </label>
                            <select name="status" id="status">
                                <?php foreach ($data['statuses'] as $status): ?>
                                    <option value="<?php echo $status; ?>" <?php if ($status == $item['status']) echo 'selected'; ?>>
                                        <?php echo $status;?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="assigned">Assigned to: </label>
                            <!-- <input type="text" name="assigned" id="assigned" value="<?=$item['assigned_to'];?>" /> -->

                            <select name="assigned" id="assigned">
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
                            <label for="created">Created by: </label>
                            <input type="text" name="created" id="created" value="<?=$item['created_by'];?>" readonly="readonly" />
                        </div>
                        <div class="form-group">Comments: <br> <?php
                        if (array_key_exists($item['task_id'], $data['comments'])) {
                            foreach ($data['comments'][$item['task_id']] as $comments) {
                                echo "> \t[" . $comments['user_id'] . "]: " . $comments['comment'] . "<br>";
                            }
                        } else {
                            echo "\t N/A";
                        }
                    ?></div>
                        <div class="form-group">
                            <label for="date">Date: </label>
                            <input type="date" name="date" id="date" value="<?=$item['due_date'];?>" />
                        </div>
                        <div class="form-btns">
                            <input type="hidden" name="task" value="<?=$item['task_id'];?>" />
                            <input type="submit" value="Submit" />
                            <input type="button" value="Cancel" onclick="toggleTaskEdit()" />
                        </div>
                    </form>
                </div>
                <div class="col-3 col-m-3"></div>
            </div>

            <?php if ($_SESSION['role'] === 'employee'): ?>
                <div class="show-mobile" style="text-align: center;">
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
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
