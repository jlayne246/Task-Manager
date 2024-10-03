<main>
    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Enter your email address" required>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter a password" required>
        <input type="submit" value="Login">
    </form>
</main>