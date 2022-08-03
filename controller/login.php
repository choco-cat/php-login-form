<?php

/**
 * Index Controller
 */
class Login extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $this->view->set_filename('login');
        $this->view->render(['page_title' => 'Login Page']);
    }
}
