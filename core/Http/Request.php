<?php

namespace Core\Http;

class Request
{
    private static ?Request $instance = null;

    public static function instance(): Request
    {
        if (self::$instance == null) {
            self::$instance = new Request();
        }

        return self::$instance;
    }

    public function uri(): string
    {
        $uri_parts = explode('?', $_SERVER['REQUEST_URI'] ?? '/', 2);

        return basename($uri_parts[0]);
    }

    public function get(string $var, $default = null)
    {
        return $_GET[$var] ?? $default;
    }
}