<?php

namespace Src\Container;


class BoundMethod
{
    public static function call($container, $callback, array $parameters = [], $defaultMethod = null)
    {
        //使用call_user_func_array执行方法
        //原方法做了详细的判断，如判断方法是否属于该类，以及如果不是类，则用容器实例化之后再执行，等等

        return call_user_func_array($callback,[]);
    }
}