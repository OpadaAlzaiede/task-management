<?php


namespace core\middlewares;


class Middleware
{

    const MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class
    ];

    public static function resolve($key) {

        if(!$key) return;

        $middleware = array_key_exists($key, static::MAP) ? static::MAP[$key] : false;

        if(!$middleware) throw new \Exception("No matching middleware found for key '{$key}.") ;

        (new $middleware)->handle();
    }

}
