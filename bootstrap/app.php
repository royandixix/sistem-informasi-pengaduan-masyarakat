<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Pastikan middleware ini ada
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Auth\Middleware\Authenticate;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        /*
         * Route Middleware harus dalam format: 'alias' => ClassName::class
         */
        $middleware->alias([
            'auth' => Authenticate::class,
            'admin' => AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // custom exception handling bisa ditambahkan
    })
    ->create();
