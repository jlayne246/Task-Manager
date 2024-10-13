<?php
    class AdminDashboard extends Controller {
        public function index() {
            // if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            //     $this->update();
            //     // print($this->update());
            // }

            $userModel = new UserModel();
            $taskModel = new TaskModel();
            $userRoles = new UserRoleModel();

            $users = $userModel->getAllUsers();
            $tasks = $taskModel->getAllTasks();
            $roles = $userRoles->returnRolesArray();

            $data['users'] = $users;
            $data['tasks'] = $tasks;
            $data['roles'] = $roles;
            $data['stats'] = [$taskModel->countTasks(), $taskModel->countTasksByStatus("In Progress"), $taskModel->countTasksByStatus("Completed")];

            $this->handleRequest("admin", isset($data) ? $data : []);
        }

        public function create() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $userModel = new UserModel();
                $userRoles = new UserRoleModel();
                $roles = $userRoles->returnRolesArray();

                $username = $_POST['username'];
                $email = $_POST['email'];
                $role = $_POST['role'];

                // $roleid = array_search($role, $roles);
                $userModel->createUser($email, $username);
                $userRoles->assignRole($email, $role);

                header('Location: ./admin');
            }
        }

        public function update() {
            // print($_SERVER['REQUEST_METHOD']);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // print ("Put Request");
                $userModel = new UserModel();

                parse_str(file_get_contents("php://input"),$post_vars); // Because $_PUT is not a native variable in PHP
                $user = $post_vars['user'];
                $role = $post_vars['role'];

                // print ($user . $role);

                $userModel->updateUser($user, $role);

                // $this->index();
                header('Location: ./admin');
            }

            // return $role;
        }

        public function delete() {
            if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
                header("HTTP/1.0 400 Bad Request");
                return;
            }

            $id = $_GET["id"];
            $userModel = new UserModel();

            $userModel->deleteUser($id);
            header('Location: ./admin');
        }

        // public function displayUsers() {
        //     $userModel = new UserModel();

        //     $users = $userModel->getAllUsers();

        //     return $users;
        // }
    }
?>