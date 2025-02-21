<?php

use App\Http\Middleware\BasicAuthMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // registering the middleware alias :
        $middleware->alias([
            'is_logged' => BasicAuthMiddleware::class
        ]);
        // pour toutes les pages web
        //$middleware->web(append: \App\Http\Middleware\BasicAuthMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
