<?php

namespace Lib\Session;


class CSRF
{
    public static function generate()
    {
        return Session::create('csrf_token', md5(uniqid()));
    }

    public static function exists($token)
    {
        if (Session::exists('csrf_token') && $token === Session::find('csrf_token')) {
            Session::destroy('csrf_token');
            return true;
        }

        return false;
    }
}