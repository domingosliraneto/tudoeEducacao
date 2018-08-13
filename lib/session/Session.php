<?php

namespace Lib\Session;

class Session
{
    public static function create($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public static function exists($name)
    {
        return isset($_SESSION[$name]);
    }

    public static function find($name)
    {
        return $_SESSION[$name];
    }

    public static function destroy($name)
    {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }
}