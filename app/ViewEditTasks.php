<?php
    class ViewEditTasks extends Controller {
        public function index() {
            $taskModel = new TaskModel();
            $commentModel = new CommentModel();
            $task_id = $_GET["task"];

            $data['statuses'] = $taskModel->getStatuses();
            $data["tasks"] = $taskModel->getTaskByID($task_id);
            $data["comments"] = $commentModel->getCommentsByTask($task_id);
            
            $this->handleRequest("task", isset($data) ? $data : []);
        }
    }
?>