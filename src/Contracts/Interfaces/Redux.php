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
     * @return Sotre
     */
    public static function createStore(callable $reducer, array $middlewares = []): Store;
}