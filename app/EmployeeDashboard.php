<?php
    class EmployeeDashboard extends Controller {
        public function index() {
            $taskModel = new TaskModel();
            $commentModel = new CommentModel();

            $data['statuses'] = $taskModel->getStatuses();
            $data["tasks"] = $taskModel->getTasksByEmployee($_SESSION["user"]);
            $data["comments"] = $commentModel->getComments($_SESSION["user"]);

            $this->handleRequest("employee", isset($data) ? $data : []);
        }

        public function update() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $taskModel = new TaskModel();

                $userid = $_POST["user"];
                $taskid = $_POST["task"];
                $status = $_POST["status"];

                $taskModel->updateTask($userid, $taskid, $status);
                header("Location: ./employee");
            }
        }

        public function create() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $commentModel = new CommentModel();

                $userid = $_POST["user"];
                $taskid = $_POST["task"];
                $comment = $_POST["comment"];

                $commentModel->createComment($userid, $taskid, $comment);
                header("Location: ./employee");
            }
        }
    }
?>