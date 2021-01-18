<?php

namespace App;

use Core\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    public function routesPath(): string
    {
        return realpath(__DIR__ . '/routes.php');
    }
}