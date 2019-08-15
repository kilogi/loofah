<?php

namespace Src\Foundation\Http;

use Src\Foundation\Application;
use Src\Routing\Router;

class Kernel
{

    protected $app;

    protected $router;

    protected $bootstrappers = [
        \Src\Foundation\Bootstrap\RegisterFacades::class,
        \Src\Foundation\Bootstrap\BootProviders::class,
    ];

    public function __construct(Application $app, Router $router)
    {
        $this->app = $app;
        $this->router = $router;
    }

    /**
     * 执行获取到的Http请求
     * @param $request
     * @return array
     */
    public function handle($request)
    {

        $response = $this->sendRequestThroughRouter($request);

        return $response;
    }

    /**
     * 发送请求到路由
     * @param $request
     * @return array
     */
    protected function sendRequestThroughRouter($request)
    {
        //向容器中绑定request的实例
        $this->app->instance('request', $request);


//        Facade::clearResolvedInstance('request');

        //正式启动应用
        $this->bootstrap();
        dd($this->app);
        die;

        $ser = $request->server->get('REQUEST_URI');
        echo $ser;
        die;
    }

    /**
     * 为Http请求启动application
     */
    public function bootstrap()
    {
        if (!$this->app->hasBeenBootstrapped()) {
            $this->app->bootstrapWith($this->bootstrappers());
        }
    }

    /**
     * 获取需要启动的启动类
     * @return array
     */
    protected function bootstrappers()
    {
        return $this->bootstrappers;
    }
}