<?php

/**
 * Index Controller
 */
class Index extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo '<br>Index Page - controller';

        $this->view->render('index');
    }
}