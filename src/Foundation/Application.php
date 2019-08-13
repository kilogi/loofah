<?php

namespace Src\Foundation;

use App\Providers\RouteServiceProvider;
use Src\Container\Container;
use Src\Foundation\Bootstrap\RegisterFacades;

class Application extends Container
{

    /**
     * 判断是否已经启动过一些引导类
     * @var bool
     */
    protected $hasBeenBootstrapped = false;

    /**
     * 初始化
     * Application constructor.
     */
    public function __construct()
    {
        //注册基本的绑定和基本的服务提供者
        $this->registerBaseBindings();
        $this->bootstrapWith([
            RegisterFacades::class
        ]);
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
        $this->registerService('RoutingServiceProvider', new RouteServiceProvider($this));
    }

    /**
     * 启动一些 bootstrap 类
     * @param array $bootstrappers
     */
    public function bootstrapWith(array $bootstrappers)
    {
        $this->hasBeenBootstrapped = true;

        foreach ($bootstrappers as $bootstrapper) {
           $boot = new $bootstrapper;
           $boot->bootstrap($this);
        }

    }
}