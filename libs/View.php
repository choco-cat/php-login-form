<?php

/**
 * Main View Loader
 */
class View
{
    public $loader;
    public $twig;
    public $template;

    function __construct() {
        $loader = new \Twig\Loader\FilesystemLoader(VIEW_PATH);
        $this->twig = new \Twig\Environment($loader, [
            'cache' => './cache',
        ]);
    }

    public function render($template, $args = []) {
        print $this->twig->render($template . '.html', $args);
    }
}
