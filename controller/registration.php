<?php

/**
 * Index Controller
 */
class Registration extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function registration()
    {
        $this->view->set_filename('register');
        $this->view->render(['page_title' => 'Registration Page']);
    }
}
