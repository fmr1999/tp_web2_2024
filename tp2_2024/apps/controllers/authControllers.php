<?php 

require_once './apps/models/authModels.php';
require_once './apps/views/authViews.php';
require_once './apps/helpers/auth.helper.php';


class authController{


    private $model;
    private $view;

    
    function __construct() {
        $this->view = new authView();
        $this->model = new authModel();
    }


    function showLogin() {
        $this->view->showLogin();
    }


    function auth() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if (empty($username) || empty($password)){
            $this->view->showLogin("Falta completar campos");
            return;
        }

        $user = $this->model->getByUsername($username);


        if ($user && password_verify($password, $user->password)) {
    
            AuthHelper::login($user);

            header('Location: ' . BASE_URL);

        } else {
            $this->view->showLogin('Usuario y/o contraseña inválido');
        }
    }


    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);    
    }


}