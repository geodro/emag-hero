<?php

namespace Core;

class Session
{
    public static function start(): bool
    {
        if (PHP_SAPI === 'cli') {
            $_SESSION = array();
            return true;
        } else {
            return session_start();
        }
    }

    public static function put(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function delete(string $key): void
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
}