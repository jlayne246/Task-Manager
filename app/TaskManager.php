<?php
    class TaskManager extends Controller {
        public function index() {
            $this->handleRequest("tasks", isset($data) ? $data : []);
        }
    }
?>