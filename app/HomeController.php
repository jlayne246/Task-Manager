<?php
    // require_once 'framework/Controller.php';
    class HomeController extends Controller {
        public function index(){
            $this->handleRequest("home", isset($data) ? $data : []);
        }
    }
?>