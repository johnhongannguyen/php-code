<?php

namespace Core\Middleware;

use Exception;

class Middleware
{
    public const MAP = [
        'guest'=> Guest::class,
        'auth'=> Auth::class
    ];

    /**
     * @throws Exception
     */
    public static function resolve($key){
        if(!$key) return;
        $middleware = static::MAP[$key] ?? false;
        if(!$middleware){
            throw new Exception("No matching middlewares found for the key {$key}");
        }
        (new $middleware)->handle();
    }

}