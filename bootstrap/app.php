<?php

use App\Http\Middleware\admin;
use App\Http\Middleware\ShareDataMiddleware;
use App\Http\Middleware\superadmin;
use App\Http\Middleware\user;
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
        $middleware->alias([
            'user'=>user::class,
            'admin'=>admin::class,
            'superadmin'=>superadmin::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
