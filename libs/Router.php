<?php

class Router
{
    function __construct()
    {
        $url = $_GET['url'] ?? 'index';
        $url = rtrim($url, '/');
        $urlParts = explode('/', $url);
        $baseUrl = $urlParts[0];
        $file = BASE_PATH . 'controller/' . $baseUrl . '.php';
        $params = $urlParts[1] ?? null;
        if (file_exists($file)) {
            require $file;
        } else {
            new Error('ERROR!');
            return false;
        }

        switch ($baseUrl) {
            case 'login':
                $controller = new Login();
                $controller->login();
                break;
            case 'registration':
                $controller = new Registration();
                if ($params === 'send') {
                    $controller->sendData();
                } else {
                    $controller->registration();
                }
                break;
            case 'index':
            default:
                $controller = new Index();
                $controller->index();
                break;
        }
    }
}
