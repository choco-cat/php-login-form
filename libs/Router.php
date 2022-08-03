<?php

class Router
{
    function __construct()
    {
        $url = $_GET['url'] ?? 'index';
        $url = rtrim($url, '/');
        $file = BASE_PATH . 'controller/' . $url . '.php';

        if (file_exists($file)) {
            require $file;
        } else {
            echo 'Error';
            new Error('ERROR!');
            return false;
        }

        switch ($url) {
            case 'index':
            default:
                $controller = new Index();
                $controller->index();
                return false;
        }
    }
}
