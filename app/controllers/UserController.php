<?php

class UserController extends Controller
{


    public function index()
    {

    }

    public function auth()
    {
        $login = $this->model('User')->auth($_POST['login'], $_POST['password']);
        if ($login != 'success') {
            $data['error'] = $login;
            $this->view('layouts/header');
            $this->view('user/login', $data);
        }
    }

    public function login()
    {
        $this->view('layouts/header');
        if (!is_null($_SESSION['login'])) {
            $this->redirect('/');
        }
        $this->view('user/login');
    }

    public function logout()
    {
        $this->model('User')->logout();
    }


}