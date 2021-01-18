<?php

namespace Core\Http;

class HttpException extends \Exception
{
    public static function handler($exception): void
    {
        Response::error(
            $exception->getMessage(),
            ($exception instanceof HttpException) ? $exception->getCode() : 500
        )->send();
    }
}