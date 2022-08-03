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
        echo '<br>Login Page - controller';

        $this->view->set_filename('login');
        $this->view->render(['page_title' => 'Login Page']);
    }
}
