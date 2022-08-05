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

    public function index()
    {
        $this->view->set_filename('login');
        $template_data = array(
            'page_title' => 'Login Page'
        );
        $this->view->render($template_data);
    }

    public function sendData()
    {
        if (@$_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {

            echo'Page not work!';
            //throw new Error('Page not work');
        }
        require('./model/login.php');
        $login_model = new LoginModel();
        $user_data = $_POST;
        if ($user_data) {
            if ($login_model->checkLogin($user_data)) {
                echo json_encode('success');
            } else {
                echo json_encode('error!');
            }
            exit();
        }
    }
}
