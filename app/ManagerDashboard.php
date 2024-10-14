<?php
    class ManagerDashboard extends Controller {
        public function index() {
            $taskModel = new TaskModel();
            $commentModel = new CommentModel();
            $userModel = new UserModel();

            $data['statuses'] = $taskModel->getStatuses();
            $data["tasks"] = $taskModel->getTasksByManager($_SESSION["user"]);
            $data["comments"] = $commentModel->getComments($_SESSION["user"]);
            $data['employees'] = $userModel->getAllEmployees();
            $data['filter'] = "";

            $this->handleRequest("manager_dashboard", isset($data) ? $data : []);
        }

        public function filter() {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $taskModel = new TaskModel();

                $filter = $_POST['status-filter'];
                $manager = $_POST['manager'];

                if($filter == '') {
                    $commentModel = new CommentModel();
                    $userModel = new UserModel();

                    $data['statuses'] = $taskModel->getStatuses();
                    $data["tasks"] = $taskModel->getTasksByManager($_SESSION["user"]);
                    $data["comments"] = $commentModel->getComments($_SESSION["user"]);
                    $data['employees'] = $userModel->getAllEmployees();
                    $data['filter'] = "";

                    $this->handleRequest("manager_dashboard", isset($data) ? $data : []);
                } else {
                    $data["tasks"] = $taskModel->getTaskByProgress($filter, $manager);

                    $commentModel = new CommentModel();
                    $userModel = new UserModel();

                    $data['statuses'] = $taskModel->getStatuses();
                    $data["comments"] = $commentModel->getComments($_SESSION["user"]);
                    $data['employees'] = $userModel->getAllEmployees();
                    $data['filter'] = $filter;

                    $this->handleRequest("manager_dashboard", isset($data) ? $data : []);
                }
                
            }
        }
    }
?>