<?php 
    class AuthGuard {
        public static function check() {
            return isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;
        }

        public static function redirectIfNotAuthenticated() {
            if (!self::check()) {
                header("Location: index.php");
                exit();
            }
        }
    }
?>