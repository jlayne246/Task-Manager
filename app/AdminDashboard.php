<?php
    class AdminDashboard extends Controller {
        public function index() {
            $this->handleRequest("admin", isset($data) ? $data : []);
        }
    }
?>