<?php

namespace Src\Facade;


abstract class Facade
{
    //app核心类
    protected static $app;
    //解析的实例
    protected static $resolvedInstance;

    /**
     * 获取实例
     * @return mixed|null|object
     */
    public static function getFacadeRoot()
    {
        return static::resolveFacadeInstance(static::getFacadeAccessor());
    }

    /**
     * 解析门脸实例
     * @param $name
     * @return mixed
     */
    protected static function resolveFacadeInstance($name)
    {
        if (is_object($name)) {
            return $name;
        }

        if (isset(static::$resolvedInstance[$name])) {
            return static::$resolvedInstance[$name];
        }

        return static::$resolvedInstance[$name] = static::$app[$name];
    }

    /**
     * 设置门脸App核心类
     * @param $app
     */
    public static function setFacadeApplication($app)
    {
        static::$app = $app;
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