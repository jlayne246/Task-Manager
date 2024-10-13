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

                $validator = new Validator();
                $data['error'] = [];

                // if ($validator->passwordStrength($password)) {
                //     $user = new UserModel();
                //     $position = new UserRoleModel();

                //     if ($user->registerUser($email, $username, $password)) {
                //         $position->assignRole($email, "employee");
                //         header('Location: ./login');
                //         exit();
                //         // print("User added");
                //     } else {
                //         $data["error"] = "Registration Failed. Please try again.";
                //     }
                // } else {
                //     $data["error"] = "Password not strong enough.";
                // }

                $validate = $validator->validateUser($email, $password);
                // print_r($validate);

                if ($validate['value']) {
                    $user = new UserModel();
                    $position = new UserRoleModel();
                    if ($user->registerUser($email, $username, $password)) {
                        $position->assignRole($email, "employee");
                        header('Location: ./login');
                        exit();
                        // print("User added");
                    } else {
                        // $_SESSION["error"] = "Registration Failed. Please try again.";
                        $data["error"] = "Registration Failed. Please try again.";
                        $this->handleRequest("register", isset($data) ? $data : []);
                        exit();
                    }
                } else {
                    // $_SESSION["error"] = $validate['errors'];
                    $data["error"] = $validate['errors'];
                    $this->handleRequest("register", isset($data) ? $data : []);
                    $data['error'] = [];
                    exit();
                }
            }

            $this->handleRequest("register", isset($data) ? $data : []);
        }
    }
    
?>