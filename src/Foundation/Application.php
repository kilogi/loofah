<?php

namespace src\Foundation;

use App\Providers\RouteServiceProvider;
use src\Container\Container;

class Application extends Container
{
    /**
     * 初始化
     * Application constructor.
     */
    public function __construct()
    {
        //注册基本的绑定和基本的服务提供者
        $this->registerBaseBindings();
        $this->registerBaseServiceProviders();
    }

    /**
     * 基础绑定
     */
    protected function registerBaseBindings()
    {
        $this->instance('app', $this);
    }

    /**
     * 基础服务提供者
     */
    protected function registerBaseServiceProviders()
    {
        $this->registerService('RoutingServiceProvider',new RouteServiceProvider($this));
    }
}