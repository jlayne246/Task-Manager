<?php
    class EmployeeDashboard extends Controller {
        public function index() {
            $this->handleRequest("employee", isset($data) ? $data : []);
        }
    }
?>