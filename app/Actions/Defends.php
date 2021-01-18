<?php

namespace App\Actions;

use App\Entities\Fight;

interface Defends
{
    function defend(int $strength): ?Fight;
}