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

            echo 'Page not work!';
            //throw new Error('Page not work');
        }
        require('./model/login.php');
        $login_model = new LoginModel();
        $user_data = $_POST;
        if ($user_data) {
            if ($login_model->checkLogin($user_data)) {
                $this->auth($user_data);

            } else {
                echo json_encode($login_model);
            }
            exit();
        }
    }

    public function auth($user_data)
    {
        if (session_id() == "") {
            session_start();
        }
        $session_timeout = 600;
        $_SESSION['login'] = $user_data['login'];
        $_SESSION['expires_by'] = time() + $session_timeout;
        $_SESSION['expires_timeout'] = $session_timeout;
        $rememberme = isset($_POST['rememberme']) ? true : false;
        if ($rememberme) {
            setcookie("login", $_POST["login"], time() + 3600 * 24 * 7);
            setcookie("pass", $_POST["pass"], time() + 3600 * 24 * 7);
        }
        echo json_encode('success');
    }
    public function logout()
    {
        session_start();
        $_SESSION = [];
        Header('Location: ./../');
    }
}
