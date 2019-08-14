<?php

namespace Src\Routing;

use Countable;
use IteratorAggregate;
use Traversable;
use ArrayIterator;

class RouteCollection implements Countable, IteratorAggregate
{

    protected $allRoutes = [];

    protected $routes = [];

    public function add(Route $route)
    {
        $domainAndUri = $route->uri();
        $method = $route->methods();

        $this->routes[$method][$domainAndUri] = $route;

        $this->allRoutes[$method . $domainAndUri] = $route;
    }

    public function getRoutes()
    {
        return array_values($this->allRoutes);
    }

    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new ArrayIterator($this->getRoutes());
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->getRoutes());
    }
}