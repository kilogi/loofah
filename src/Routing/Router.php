<?php

namespace Src\Routing;


class Router
{
    public function match()
    {

    }

    public function get($uri, $action = null)
    {
        echo $uri,$action;die;
    }

    public function post($uri, $action = null)
    {

    }

    protected function addRoute($methods, $uri, $action)
    {

    }

    protected function createRoute($methods, $uri, $action)
    {

    }
}