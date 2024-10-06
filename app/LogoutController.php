<?php
    // require_once 'framework/Controller.php';
    class LogoutController extends Controller {
        public function index(){
            session_unset();
            SessionManager::destroy();
            header('Location: ./');
        }
    }
?>