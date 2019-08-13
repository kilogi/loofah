<?php

namespace Src\Facade;


class Route extends Facade
{
    /**
     * 获取组件的注册名称
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'router';
    }
}