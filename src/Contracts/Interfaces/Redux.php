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
     * @param callable $reducer
     * @param array $middlewares
     * @param mixed $initState
     * @return Sotre
     */
    public static function createStore(callable $reducer, mixed $initState, array $middlewares = []): Store;
}