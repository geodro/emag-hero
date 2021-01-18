<?php

namespace Core;

class View
{
    public static function render(string $view, array $args = []): string
    {
        if (!file_exists(__DIR__ . '/../resources/views/' . $view . '.php')) {
            throw new \Exception('View not found');
        }

        ob_start();
        require_once(__DIR__ . '/../resources/views/layout/app.php');
        return ob_get_clean();
    }

    public static function partial(string $view, array $args = []): string
    {
        extract($args);
        ob_start();
        require(__DIR__ . '/../resources/views/' . $view . '.php');
        return ob_get_clean();
    }

    public static function error(string $message): string
    {
        ob_start();
        require_once(__DIR__ . '/../resources/views/layout/error.php');
        return ob_get_clean();
    }
}