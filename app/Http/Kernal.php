<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [

        ],

        'api' => [
//            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    protected $middleware =[
        \App\Http\Middleware\AdminMiddleware::class,
        \App\Http\Middleware\VendorMiddleware::class,
        \App\Http\Middleware\UserMiddleware::class,
    ];
    protected $routeMiddleware = [
//        'admin' => \App\Http\Middleware\AdminMiddleware::class,
//        'vendor' => \App\Http\Middleware\VendorMiddleware::class,
//        'user' => \App\Http\Middleware\UserMiddleware::class,
    ];
}
