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

            $this->handleRequest("manager", isset($data) ? $data : []);
        }
    }
?>