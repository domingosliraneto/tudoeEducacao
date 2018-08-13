<?php
/**
 * Created by PhpStorm.
 * User: luciano
 * Date: 29/07/16
 * Time: 23:01
 */

namespace Lib\Core\Route;


class Redirect
{
    public static function to($location = null)
    {
        if ($location) {
            header("Location: {$location}");
            exit();
        }
    }
}