<?php
define('BASE_PATH', dirname(realpath(__FILE__)) . '/');
const VIEW_PATH = BASE_PATH . 'view/';

require_once './vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(VIEW_PATH);
$twig = new \Twig\Environment($loader, [
    'cache' => './cache',
]);

require BASE_PATH . 'libs/View.php';
require BASE_PATH . 'libs/JsonDB.php';
require BASE_PATH . 'libs/Model.php';
require BASE_PATH . 'libs/Controller.php';
require BASE_PATH . 'libs/Router.php';

new Router();
