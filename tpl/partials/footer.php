    <footer>
        <p>&copy; <?= date('Y') ?></p>
        <?php print("Auth: " . SessionManager::get('role')); ?>
        <?php print("Auth: " . session_status()); ?>
    </footer>
</body>
</html>