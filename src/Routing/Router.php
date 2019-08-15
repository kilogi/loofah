<?php

namespace Src\Routing;


use Src\Container\Container;

class Router
{
    /**
     * IOC 容器实例
     * @var \Src\Container\Container
     */
    protected $container;

    /**
     * 路由集合的实例
     * @var \Src\Routing\RouteCollection
     */
    protected $routes;

    /**
     * 支持的路由
     * @var array
     */
    public static $verbs = ['GET', 'HEAD', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'];

    /**
     * 创建一个新的路由实例
     * Router constructor.
     * @param Container|null $container
     */
    public function __construct(Container $container = null)
    {
        $this->routes = new RouteCollection;
        $this->container = $container ?: new Container;
    }

    public function match()
    {

    }

    public function get($uri, $action = null)
    {
        return $this->addRoute(['GET'], $uri, $action);
    }

    public function post($uri, $action = null)
    {
        return $this->addRoute(['POST'], $uri, $action);
    }


    protected function addRoute($methods, $uri, $action)
    {
        return $this->routes->add($this->createRoute($methods, $uri, $action));
    }


    protected function createRoute($methods, $uri, $action)
    {
        $route = $this->newRoute(
            $methods, $uri, $action
        );

        return $route;
    }

    protected function newRoute($methods, $uri, $action)
    {
        return (new Route($methods, $uri, $action))
            ->setRouter($this)
            ->setContainer($this->container);
    }
}