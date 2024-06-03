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
 * Redux Interface
 * @interface
 */
interface Redux {
    /**
     * Create Store
     * @method createStore
     * @public
     * @static
     * @param callable $reducer
     * @param array $middlewares
     * @param mixed $initState
     * @return Sotre
     */
    public static function createStore(callable $reducer, array $middlewares = []): Store;
}