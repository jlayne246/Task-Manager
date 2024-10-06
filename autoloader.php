<?php
    function my_autoloader($class) {
        $directories = array('app', 'framework/validator', 'framework', 'framework/auth', 'framework/sessions');
        foreach ($directories as $dir) {
            $path = $dir . '/' . str_replace('\\', '/', $class) . '.php';
            if (file_exists($path)) {
                require $path;
                return;
            }
        }
    }
    
    spl_autoload_register('my_autoloader');
?>