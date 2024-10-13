<?php
    class ViewEditTasks extends Controller {
        public function index() {
            $userModel = new UserModel();
            $taskModel = new TaskModel();
            $commentModel = new CommentModel();
            $task_id = $_GET["task"];

            $data['statuses'] = $taskModel->getStatuses();
            $data["tasks"] = $taskModel->getTaskByID($task_id);
            $data["comments"] = $commentModel->getCommentsByTask($task_id);
            $data['employees'] = $userModel->getAllEmployees();
            
            $this->handleRequest("task", isset($data) ? $data : []);
        }

        public function edit() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $task_id = $_POST['task'];
                $title = $_POST['title'];
                $desc = $_POST['description'];
                $status = $_POST['status'];
                $assigned = $_POST['assigned'];
                $created = $_POST['created'];
                $date = $_POST['date'];

                $taskModel = new TaskModel();

                $taskModel->editTask($title, $desc, $status, $assigned, $created, $date, $task_id);

                header("Location: ./view-task?task={$task_id}");
            }
        }
    }
?>