<?php

/**
 * Main View Loader
 */
class Model
{
    public $twig;
    public $template;

    function __construct() {
        $JsonDB = new JsonDB("./data/");
        $JsonDB->createTable("users");
    }
}
