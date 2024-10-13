<?php
    class ManagerDashboard extends Controller {
        public function index() {
            $taskModel = new TaskModel();
            $commentModel = new CommentModel();

            $data['statuses'] = $taskModel->getStatuses();
            $data["tasks"] = $taskModel->getTasksByManager($_SESSION["user"]);
            $data["comments"] = $commentModel->getComments($_SESSION["user"]);

            $this->handleRequest("manager", isset($data) ? $data : []);
        }
    }
?>