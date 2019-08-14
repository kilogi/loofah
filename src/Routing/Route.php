<?php

namespace Src\Routing;

use Src\Container\Container;

class Route
{
    public $uri;

    public $methods;

    public $action;

    protected $router;

    protected $container;

    public function __construct($methods, $uri, $action)
    {
        $this->uri = $uri;
        $this->methods = $methods;
        $this->action = $action;
    }

    public function setRouter(Router $router)
    {
        $this->router = $router;

        return $this;
    }


    public function setContainer(Container $container)
    {
        $this->container = $container;

        return $this;
    }

    public function methods()
    {
        return $this->methods;
    }

    public function uri()
    {
        return $this->uri;
    }

}