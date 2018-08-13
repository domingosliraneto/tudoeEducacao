<?php

namespace App\Controllers;


class Controller
{
    public function __call($name, $arguments)
    {
        echo "Método $name não existente";
    }

    public function view($view, $data = array())
    {
        extract($data);
        require_once __DIR__.'/../Views/'.$view.'.php';
    }
}