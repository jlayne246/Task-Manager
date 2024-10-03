<?php
    class View {
        /*This function abstracts the rendering of pages and leaves it to the controller of the page itsef to process*/
        public function render($view, $data = []) {
            extract($data);
            require 'tpl/partials/header.php';
            require "tpl/partials/{$view}.php";
            require 'tpl/partials/footer.php';
        }
    }
?>