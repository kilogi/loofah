<?php

//自动加载
require '../vendor/autoload.php';

//框架初始化
$app = require_once '../bootstrap/app.php';

//获取实例化的kernel Http 核心类
$kernel = $app->make('kernel');

//处理请求
$response = $kernel->handle(
    $request = \src\Http\Request::capture()
);

//响应
$response->send();