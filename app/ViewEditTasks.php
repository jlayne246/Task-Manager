<?php
    class ViewEditTasks extends Controller {
        public function index() {
            $taskModel = new TaskModel();
            $commentModel = new CommentModel();
            $task_id = $_GET["task"];

            $data['statuses'] = $taskModel->getStatuses();
            $data["tasks"] = $taskModel->getTaskByID($task_id);
            $data["comments"] = $commentModel->getComments($_SESSION["user"]);
            
            $this->handleRequest("task", isset($data) ? $data : []);
        }
    }
?>