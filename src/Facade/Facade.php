<?php

namespace src\Facade;


use src\Container\Container;

abstract class Facade
{
    /**
     * 获取实例
     * @return mixed|null|object
     */
    public static function getFacadeRoot()
    {
        $name = static::getFacadeAccessor();

        $container = new Container();

        $obj = $container->make($name);

        return $obj;
    }

    /**
     * 动态静态调用该方法
     * @param $method
     * @param $arguments
     * @return mixed
     * @throws \HttpRequestMethodException
     */
    public static function __callStatic($method, $arguments)
    {
        $instance = static::getFacadeRoot();

        if (!$instance) {
            throw new \HttpRequestMethodException('请求异常，未找到该门脸');
        }

        return $instance->$method(...$arguments);
    }
}