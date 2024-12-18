<?php declare(strict_types=1);

namespace Redux\Features\Redux;


trait HasMiddleware {
    public static function applyMiddlewares(...$middlewares): array {
        return $middlewares;
    }

    public static function createMiddleware(callable $action): callable {
        return $action;
    }
}