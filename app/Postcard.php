<?php

namespace App;

class Postcard
{
    protected static function resolveFacade($name){
        return app()[$name];
    }
    public static function __callStatic(string $method, array $arguments)
    {
        return (self::resolveFacade('Postcard'))
            ->$method(...$arguments);
    }
}
