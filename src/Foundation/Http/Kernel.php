<?php

namespace Src\Foundation\Http;


class Kernel
{
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
        // TODO
    }
}