<?php
    require_once 'View.php';

    class Controller {
        protected $view;

        public function __construct() {
            $this->view = new View();
        }

        protected function handleRequest($view, $data) {
            $this->view->render($view, $data); // Passes the request and data along to the View's render function
        }

        // /*This function abstracts the rendering of pages and leaves it to the controller of the page itsef to process*/
        // protected function render($view, $data = []) {
        //     extract($data);
        //     require 'tpl/partials/header.php';
        //     require "tpl/partials/{$view}.php";
        //     require 'tpl/partials/footer.php';
        // }
    }
?>