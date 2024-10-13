<main class="content">
    <!-- <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?> -->

    <div id="errors" style="color: red;">
        <?php
            if (isset($data['error'])) {
                foreach ($data['error'] as $error) {
                    echo $error . " <br> ";
                }

                $data['errors'] = [];
            } 
        ?>
    </div>

    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Enter your email address" required>
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Enter a username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter a password" required>
        <input type="submit" value="Register">
    </form>
</main>