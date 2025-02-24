<?php

use App\Http\Middleware\EziAdminMiddleware;
use App\Http\Middleware\EziAgentMiddleware;
use App\Http\Middleware\EziTenantMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        $middleware->alias([
            'admins' => EziAdminMiddleware::class,
            'tenants' => EziTenantMiddleware::class,
            'agents' => EziAgentMiddleware::class,
            'landlords' => EziAgentMiddleware::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
