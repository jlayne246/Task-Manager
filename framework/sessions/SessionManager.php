<?php
    class SessionManager {
        public static function start() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }

        public static function set($key, $value) {
            $_SESSION[$key] = $value;
        }

        public static function get($key) {
            return $_SESSION[$key] ?? null;
        }

        public static function setUser($userid, $role, $auth) {
            $_SESSION['user'] = $userid;
            $_SESSION['role'] = $role;
            $_SESSION['authstatus'] = $auth;
            print($userid . $role . $auth);
        }

        public static function destroy() {
            session_destroy();
        }
    }
?>