<?php
    class ManagerDashboard extends Controller {
        public function index() {
            $this->handleRequest("manager", isset($data) ? $data : []);
        }
    }
?>