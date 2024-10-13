<main class="content">
<div class="errors" style="color: red;">
        <?php
            if (isset($data['error'])) {
                foreach ($data['error'] as $error) {
                    echo $error . " <br> ";
                }

                $data['errors'] = [];
            } 
        ?>
    </div>

    <div class="sub-container">
        <div class="col-3 col-m-3"></div>
        <div class="col-6 col-m-6">
            <h1>Login</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Enter your email address" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Enter a password" required>
                </div>
                <div class="form-btns">
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>
        <div class="col-3 col-m-3"></div>
    </div>
</main>