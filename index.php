<?php
require_once './vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./templates/base/');
$twig = new \Twig\Environment($loader, [
    'cache' => './cache',
]);

$template = $twig->load('index.html');

echo $template->render(['Header' => 'Login form', 'Text' => 'my text']);
