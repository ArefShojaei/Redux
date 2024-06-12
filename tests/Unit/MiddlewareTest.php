<?php


/**
 * @package
 */
use PHPUnit\Framework\TestCase;
use Redux\Redux;



/**
 * Middleware Test
 */
final class MiddlewareTest extends TestCase {
    /**
     * @test
     */
    public function createMiddleware() {
        $middleware = Redux::createMiddleware(fn($store, $action, $next) => "-- Middleware --");

        $this->assertIsCallable($middleware);
    }
}