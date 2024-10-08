<?php

if ($_SESSION['role'] === 'admin'): ?>
    <main class="content">
        <div class="container">
            <div class="stats"></div>
            <div class="sub-container">
                <div class="tasks col-7 col-m-7">
                    <h1>Tasks</h1>
                    <div class="tasks-con">
                        <!-- <div class="user-header"> -->
                        <div class="tasks-box tasks-header"> Title </div>
                        <div class="tasks-box tasks-header"> Description </div>
                        <div class="tasks-box tasks-header">Status</div>
                        <div class="tasks-box tasks-header">Assigned To</div>
                        <div class="tasks-box tasks-header">Created By</div>
                        <div class="tasks-box tasks-header">Due Date</div>
                        <!-- </div> -->
                        <?php foreach ($data['tasks'] as $item): ?>
                            <!-- <div class="user-row"> -->
                                <div class="tasks-box"><?php echo $item['title']; ?> </div>
                                <div class="tasks-box"><?php echo $item['description']; ?> </div>
                                <div class="tasks-box"><?php echo $item['status']; ?> </div>
                                <div class="tasks-box"><?php echo $item['assigned_to']; ?> </div>
                                <div class="tasks-box"><?php echo $item['created_by']; ?> </div>
                                <div class="tasks-box"><?php echo $item['due_date']; ?> </div>
                            <!-- </div> -->
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="users col-5 col-m-5">
                    <h1>Users</h1>
                    <div class="createUser"></div>
                    <div class="users-con">
                        <!-- <div class="user-header"> -->
                            <div class="user-box user-header"> ID# </div>
                            <div class="user-box user-header"> Username </div>
                            <div class="user-box user-header"> Role </div>
                            <div class="user-box user-header"></div>
                            <div class="user-box user-header"></div>
                        <!-- </div> -->
                        <?php foreach ($data['users'] as $item): ?>
                            <!-- <div class="user-row"> -->
                                <div class="user-box"><?php echo $item['user_id']; ?> </div>
                                <div class="user-box"><?php echo $item['username']; ?> </div>
                                <div class="user-box">
                                    <div class="view-mode">
                                        <?php
                                            switch ($item['role_id']) {
                                                case 1:
                                                    echo "Admin";
                                                    break;

                                                case 2:
                                                    echo "Manager";
                                                    break;

                                                case 3:
                                                    echo "Employee";
                                                    break;

                                                default:
                                                    echo "N/A";
                                                    break;
                                            }
                                        ?>
                                    </div>
                                    <div class="edit-mode">
                                        <form method="POST" action="./editrole" style="display: inline;">
                                            <input type="hidden" name="user" value="<?=$item['user_id']?>"/>
                                            <select name="role" id="role">
                                                <?php foreach ($data['roles'] as $role): ?>
                                                    <option value="<?php echo $role; ?>" <?php if ($role == $data['roles'][$item['role_id']]) echo 'selected'; ?>>
                                                        <?php echo $role;?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <!-- </form> -->
                                    </div>
                                <div class="user-box">
                                    <a href="javascript:void(0);" class="view-mode" onclick="toggleEditMode()">Edit</a>
                                    <div class="edit-mode"><button type="submit">Save</button></div>
                                </div>
                                <div class="user-box">
                                    <a href="./delete?=" <?=$item['user_id']?> class="view-mode">Delete</a>
                                    <div class="edit-mode">
                                        <button type="button" onclick="toggleEditMode()">Close</button>
                                    </div>
                                </div>
                                </form>
                            <!-- </div> -->
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php else: ?>
    <main>
        <p>Access denied!</p>
    </main>
<?php endif; ?>