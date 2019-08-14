<?php

namespace Src\Foundation\Http;

use App\Http\Controller\TestController;

class Kernel
{

//    public function __construct(Application $app, Router $router)
//    {
//        $this->app = $app;
//        $this->router = $router;
//    }

    /**
     * 执行获取到的Http请求
     * @param $request
     * @return array
     */
    public function handle($request, $app)
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
//        $this->app->instance('request', $request);

        $ser = $request->server->get('REQUEST_URI');
        echo $ser;
        die;
    }
}