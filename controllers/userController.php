<?php
class UserController
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new userManager();
    }


    public function displayLoginForm()
    {
        require 'views/login.php';
    }

    public function displayRegisterForm()
    {
        require 'views/register.php';
    }


    public function logUser()
    {
        $errorsForm = [];

        if (empty($_POST['username'])) {
            $errorsForm[] = 'saisissez un nom d\'utilisateur';
        }
        if (empty($_POST['password'])) {
            $errorsForm[] = 'saisissez votre mot de passe';
        }

        if (count($errorsForm) == 0) {
            $test = $this->userManager->checkUser($_POST['username'], $_POST['password']);
            if (is_null($test['user'])) {
                $errorsForm[] = $test['error'];
                require 'views/login.php';
            } else {

                $_SESSION['username'] = $_POST['username'];
                session_start();
                header('Location: index.php?controller=team&action=home');
            }
        } else {
            require 'views/login.php';
        }
    }

    public function registerUser()
    {
        $errorsForm = [];


        if (empty($_POST['username'])) {
            $errorsForm[] = 'saisissez un nom d\'utilisateur';
        }
        if (empty($_POST['password'])) {
            $errorsForm[] = 'saisissez un mot de passe';
        }
        if (count($errorsForm) == 0) {
            $this->userManager->addUser($_POST['username'],$_POST['password']);
                require 'views/login.php';
        } else {
            require 'views/register.php';
        }
    }
}
