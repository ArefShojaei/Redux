<?php declare(strict_types=1);

/**
 * @namespace
 */
namespace Redux\Features\Redux;



/**
 * Has Store feature
 * @tarit
 */
trait HasMiddleware {
    /**
     * Apply Middlewares
     * @method applyMiddlewares
     * @public
     * @static
     * @param array $middlewares
     * @return array
     */
    public static function applyMiddlewares(...$middlewares): array {
        return $middlewares;
    }

    /**
     * Create Middleware
     * @method applyMiddlewares
     * @public
     * @static
     * @param callable $action
     * @return callable
     */
    public static function createMiddleware(callable $action): callable {
        return $action;
    }
}