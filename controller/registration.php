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
        require ('./model/ModelAuthorization.php');
        $registration_model = new ModelAuthorization();
        $registration_model->addUserData($_POST);
        $this->view->set_filename('registration');
        $this->view->render(['page_title' => 'Registration Page']);
    }
}
