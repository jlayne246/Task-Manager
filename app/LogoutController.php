<?php
    // require_once 'framework/Controller.php';
    class LogoutController extends Controller {
        public function index(){
            session_unset();
            SessionManager::destroy();

            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();

                setcookie(session_name(),"", time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
            }

            setcookie("logged_out", "true", 0, "/");

            header('Location: ./');
            exit;
        }
    }
?>