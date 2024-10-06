<?php
    // require_once 'UserModel.php';
    class LoginController extends Controller {
        public function index() {
            SessionManager::start();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $user = new UserModel();
                $position = new UserRoleModel();

                // Check to see if the user exists
                if ($user->loginUser($email, $password) != false) {
                    $id = $position->retrieveUserID($email);
                    // print($id);
                    $role = $position->retrieveUserRole($id);
                    // print($id . $role);
                    SessionManager::setUser($id, $role, true);
                    // SessionManager::set('role', $role);
                    setcookie("logged_out", "", time() - 3600, "/");

                    header("Location: ./{$role}");
                    exit();
                } else {
                    SessionManager::destroy();
                    $data['error'] = "Login failed. Try again.";
                }
            }

            $this->handleRequest("login", isset($data) ? $data : []);
        }
    }
?>