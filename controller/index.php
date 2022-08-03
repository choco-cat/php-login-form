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
        $this->view->set_filename('index');
        $this->view->render(['page_title' => 'Index Page']);
    }
}
