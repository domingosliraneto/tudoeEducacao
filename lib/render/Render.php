<?php

namespace Lib\Render;


class Render
{
    public static function render($template, $data = array())
    {
        $path = "../app/Views/Includes/partials/".$template.".inc.php";

        if (file_exists($path)) {
            extract($data);
            require_once $path;
        }
    }

    public static function renderRoute($name)
    {
        $path = "../app/".$name.".php";
        if (file_exists($path)) {
            require_once $path;
        }
    }
}