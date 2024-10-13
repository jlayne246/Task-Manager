<main class="content">
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
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter a password" required>
        <input type="submit" value="Login">
    </form>
</main>