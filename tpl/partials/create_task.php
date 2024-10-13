<?php if ($_SESSION['role'] === 'manager'): ?>
    <main class="content">
        <div class="container">
            <p>Welcome to the task manager page.</p>
            <div class="sub-container">
                <div class="col-3 col-m-3"></div>
                <div class="col-6 col-m-6">
                    <form method="POST" action="./create-task">
                        <input type="hidden" name="manager_id" value="<?= $_SESSION["user"]?>" />
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
                                <select name="employee" id="status">
                                    <?php foreach ($data['employees'] as $employee): ?>
                                        <optgroup>
                                            <option value="<?php echo $employee["user_id"]; ?>">
                                                <?php echo $employee["username"];?>
                                            </option>
                                        </optgroup>
                                    <?php endforeach; ?>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" name="date" id="date" size="20"/>
                        </div>
                        <input type="submit" value="Create Task" />
                    </form>
                </div>
                <div class="col-3 col-m-3"></div>
            </div>
        </div>
    </main>
<?php else: ?>
    <main>
        <p>Access denied!</p>
    </main>
<?php endif; ?>