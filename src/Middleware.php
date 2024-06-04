<?php

/**
 * @namespace
 */
namespace Redux;


/**
 * @package
 */
use Redux\Contracts\Interfaces\{
    Store,
    Middleware as MiddlewareContract
};



/**
 * Middleware as Guard
 * @class
 */
final class Middleware implements MiddlewareContract {
    /**
     * List of Middlewares
     * @prop
     * @private
     * @type array
     */
    private array $middlewares;

    /**
     * Middleware count
     * @prop
     * @private
     * @type int
     */
    private int $count;

    /**
     * Middleware Action
     * @prop
     * @private
     * @type int
     */
    private array $action;


    /**
     * Constructor
     * @param array $middlewares
     */
    public function __construct(array $middlewares) {
        $this->middlewares = $middlewares;
        $this->count = 0;
        $this->action = [];
    }

    /**
     * Apply Middleware
     * @method apply
     * @public
     * @param Store $context
     * @param array $action
     * @return void
     */
    public function apply(Store $store, array $action): void {
        # Set Action
        $this->action = $action;

        # Run all Middlewares
        foreach ($this->middlewares as $middleware) {
            $middleware($store, $this->action, $this->next());
        }

        # Check to stop process
        $this->isPaused();
    }

    /**
     * Check to stop proccess before dispatching Action
     * @method isPaused
     * @public
     * @return void
     */
    private function isPaused(): void {
        if($this->count < count($this->middlewares)) exit;
    }

    /**
     * Send Action to next Middlewares
     * @method next
     * @private
     * @return callable
     */
    private function next(): callable {
        return function(array $action) {
            $this->count++;
            $this->action = $action;
        };
    }
}
