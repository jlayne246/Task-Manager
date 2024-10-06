<?php
    // require_once "UserModel.php";
    // require_once "validator/CredValidator.php";
    class RegisterController extends Controller
    {
        public function index() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];

                $validator = new CredValidator();

                if ($validator->passwordStrength($password)) {
                    $user = new UserModel();
                    $position = new UserRoleModel();

                    if ($user->registerUser($email, $username, $password)) {
                        $position->assignRole($email, "employee");
                        header('Location: ./login');
                        exit();
                        // print("User added");
                    } else {
                        $data["error"] = "Registration Failed. Please try again.";
                    }
                } else {
                    $data["error"] = "Password not strong enough.";
                }
            }

            $this->handleRequest("register", isset($data) ? $data : []);
        }
    }
    
?>