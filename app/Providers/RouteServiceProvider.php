<?php

namespace App\Providers;

use Src\Routing\Router;
use Src\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
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

    }

    /**
     * 加载路由
     */
    protected function loadRoute()
    {
        require '../routes/api.php';
    }
}