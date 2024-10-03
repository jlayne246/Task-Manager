<?php
    function render($view, $data = []) {
        extract($data);
        require 'partials/header.php';
        require "partials/{$view}.php";
        require 'partials/footer.php';
    }
?>