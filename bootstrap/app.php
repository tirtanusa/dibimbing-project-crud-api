<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        api:__DIR__.'/../routes/api.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->renderable(function (NotFoundHttpException $e, Request $request){
            if($request->is('api/*')){
                return response()->json([
                    'success' => false,
                    'message' => 'Resource tidak ditemukan',
                ], 404);
            }
        });

         $exceptions->renderable(function (AuthenticationException $e, Request $request){
            if($request->is('api/*')){
                return response()->json([
                    'success' => false,
                    'message' => 'Silahkan login terlebih dahulu....',
                ], 401);
            }
        });
    })->create();
