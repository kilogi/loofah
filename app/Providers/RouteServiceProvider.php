<?php

namespace App\Providers;

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

        $this->loadRoute();
    }

    /**
     * 加载路由
     */
    protected function loadRoute()
    {
        require '../../routes/api.php';
    }
}