<?php
    // require_once 'UserModel.php';
    class LoginController extends Controller {
        public function index() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $user = new UserModel();

                // Check to see if the user exists
                if ($user->loginUser($email, $password) != false) {
                    header('Location: ./');
                    exit();
                } else {
                    $data['error'] = "Login failed. Try again.";
                }
            }

            $this->handleRequest("login", isset($data) ? $data : []);
        }
    }
?>