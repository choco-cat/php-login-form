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
            case 'login':
                $controller = new Login();
                $controller->login();
                break;
            case 'registration':
                $controller = new Registration();
                $controller->registration();
                break;
            case 'index':
            default:
                $controller = new Index();
                $controller->index();
                break;
        }
    }
}
