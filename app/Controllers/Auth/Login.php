<?php

namespace App\Controllers\Auth;

use App\Models\Auth\User;
use Lib\Session\Session;
use PDOException;

/**
 * Class Login
 * @package App\Controllers\Auth
 */
class Login
{
    private $prefix;
    private $user;
    private $error;

    /**
     * Login constructor.
     */
    public function __construct()
    {
        $this->user = new User;
        $this->prefix = 'tudoeeducacao_';
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    private function verify($email, $password)
    {
        try {

            $user = $this->user->findBy('email', $email);

            if ($user) {
                if (password_verify($password, $user->password)) {
                    Session::create($this->prefix.'user_id', $user->id);
                    Session::create($this->prefix.'username', $user->username);
                    return true;
                }
            } else {
                $this->error[] = "Usuário {$user->username}";
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }

        return false;
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public function autenticate($email, $password)
    {
        if ($this->verify($email, $password)) {
            Session::create($this->prefix.'logged', true);

            return true;
        } else {
            $this->error = 'Email e/ou senha inválidos';
            return false;
        }

    }

    /**
     * @return bool
     */
    public function logged()
    {
        return Session::exists($this->prefix.'logged');
    }
    
    /**
     * @return bool
     */
    public function logout()
    {
        Session::destroy($this->prefix.'user_id');
        Session::destroy($this->prefix.'username');
        Session::destroy($this->prefix.'logged');

        return !$this->logged();
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }
}