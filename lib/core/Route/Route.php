<?php

namespace Lib\Core\Route;

/**
 * Class Route
 * @package Lib\Core\Route
 * @author Luciano Tavernard
 */
class Route
{
    private $controller;
    private $method;
    private $params;
    private $prefix;
    private $router;

    /**
     * Route constructor.
     */
    public function __construct()
    {
        $this->prefix = "App\\Controllers\\";
    }

    /**
     * @param $route
     * @param $controller
     */
    public function controller($route, $controller)
    {
        $url = explode('/', $route);
        $parseUrl = explode('/', $this->url());
        unset($url[0], $parseUrl[0], $url[1], $parseUrl[1]);

        if ($route == substr($this->url(), 0, strlen($route)) && $this->router == null) {
            $this->controller = $this->prefix.''.$controller;
            $this->router = $route;

            $this->method = (isset($url[2]) && $url[2] != '') ? $url[2] : 'index';
            unset($url[2], $parseUrl[2]);

            $this->params = !empty($parseUrl) ? array_values($parseUrl) : array();

            $this->controller = new $this->controller;

            if (method_exists($this->controller, $this->method)) {
                call_user_func_array(array($this->controller, $this->method), $this->params);
            } else {
                $method = $this->method;
                $this->controller->$method();
            }
        }
    }

    /**
     * @return mixed
     */
    private function url()
    {
        return str_replace('/tudoeeducacao/public', '', $_SERVER['REQUEST_URI']);
    }
}