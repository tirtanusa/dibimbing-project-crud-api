<?php

namespace App\Http\Controllers;

use Laravel\Mcp\Server\Attributes\Name;
use OpenApi\Attributes as OA;

#[
    OA\Info(
        title: "Laravel API Documentation",
        version: "1.0.0",
        description: "API documentation for Laravel application"
    ),
    OA\Server(
        url: "http://localhost:8000/api",
        description: "Local API Server"
    ),
    OA\SecurityScheme(
        securityScheme: 'bearerAuth',
        type: 'http',
        name: 'Bearer Authentication',
        in: 'header',
        scheme: 'bearer'
    )
]

abstract class Controller
{
    //
}
