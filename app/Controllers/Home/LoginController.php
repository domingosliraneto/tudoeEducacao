<?php

namespace App\Controllers\Home;


use App\Controllers\Auth\Login;
use App\Controllers\Controller;
use Lib\Session\CSRF;
use Lib\Core\Route\Redirect;
use Lib\Session\Session;

class LoginController extends Controller
{
    public function index()
    {
        $this->view('Home/login', ['token' => CSRF::generate()]);
    }

    public function autentica()
    {
        if (isset($_POST) && !empty($_POST)) {
            if (CSRF::exists($_POST['token_csrf'])) {
                $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : null;
                $password = isset($_POST['password']) ? filter_var($_POST['password'], FILTER_SANITIZE_STRING) : null;

                if ($email != '' || $password != '') {

                    $login = new Login;
                    $exec = $login->autenticate($email, $password);

                    if ($exec) {
                        Redirect::to('/tudoeeducacao/public/home');
                    } else {
                        echo 'Error';
                    }

                } else {
                    Redirect::to('/tudoeeducacao/public/login');
                }
            } else {
                Redirect::to('/tudoeeducacao/public/login');
            }
        } else {
            Redirect::to('/tudoeeducacao/public/login');
        }
    }
}