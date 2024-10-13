<?php
    class TaskManager extends Controller {
        public function index() {
            $userModel = new UserModel();
            $taskModel = new TaskModel();

            $data['statuses'] = $taskModel->getStatuses();
            $data['employees'] = $userModel->getAllEmployees();

            $this->handleRequest("create_task", isset($data) ? $data : []);
        }

        public function create() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $employee = $_POST['employee'];
                $date = $_POST['date'];
                $manager = $_POST['manager_id'];

                $taskModel = new TaskModel();
                $taskModel->createTask($title, $description, $employee, $manager, $date);

                header('Location: ./manager');
            }
        }
    }
?>