<?php

use App\Http\Middleware\admin\AdminAuthenticate;
use App\Http\Middleware\admin\CheckPermission;
use App\Http\Middleware\admin\CheckRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'permission' => CheckPermission::class,
            'role' => CheckRole::class,
            'admin.auth' => AdminAuthenticate::class,
        ]);
        $middleware->validateCsrfTokens([
            '/ssl/success',
            '/ssl/fail',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
