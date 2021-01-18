<?php

namespace Core;

use Core\Http\Request;
use Core\Http\Response;

class Container
{
    public static function resolve(callable|array $callback)
    {
        if ($callback instanceof \Closure) {
            $method = new \ReflectionFunction($callback);

            $result = $method->invokeArgs(static::requiresRequest($method) ? [
                Request::instance()
            ] : []);
        } else {
            list($class, $method) = $callback;

            $method = new \ReflectionMethod($class, $method);

            $result = $method->invokeArgs(new $class, static::requiresRequest($method) ? [
                Request::instance()
            ] : []);
        }

        if ($result instanceof Response) {
            $result->send();
        }
    }

    public static function requiresRequest(\ReflectionFunctionAbstract $method): bool
    {
        $params = $method->getParameters();

        if (count($params) == 0) {
            return false;
        }

        $param = $params[0];

        if ($param->getType()->getName() == Request::class) {
            return true;
        }

        return false;
    }
}