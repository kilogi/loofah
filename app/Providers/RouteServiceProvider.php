<?php

namespace App\Providers;

use Src\Routing\Router;

class RouteServiceProvider
{
    protected $app;

    /**
     * 初始化
     * RouteServiceProvider constructor.
     * @param $app
     */
    public function __construct($app)
    {
        $this->app = $app;

        $app->instance('router', new Router());

        $this->loadRoute();
    }

    /**
     * 加载路由
     */
    protected function loadRoute()
    {
        require '../routes/api.php';
    }
}