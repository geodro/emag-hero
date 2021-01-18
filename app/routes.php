<?php

use Core\Http\Route;

Route::add('', [\App\Controller\HomeController::class, 'index']);
Route::add('start', [\App\Controller\HomeController::class, 'start']);
Route::add('battle', [\App\Controller\HomeController::class, 'battle']);