<?php

/**
 * @namespace
 */
namespace Redux\Contracts\Interfaces;


/**
 * @package
 */
use Redux\Contracts\Interfaces\Store;



/**
 * Middleware interface 
 * @interface
 */
interface Middleware {
    /**
     * Apply Middleware
     * @method apply
     * @public
     * @param Store $context
     * @param array $action
     * @return void
     */
    public function apply(Store $store, array $action): void;

    /**
     * Check to stop proccess before dispatching Action
     * @method isPaused
     * @public
     * @return void
     */
    public function isPaused(): void;
}