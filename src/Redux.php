<?php

/**
 * @namespace
 */
namespace Redux;


/**
 * @package
 */
use Redux\Contracts\Interfaces\Redux as ReduxContract;
use Redux\Contracts\Interfaces\Store as StoreContract;
use Redux\Store;



/**
 * Redux Factory
 * @class
 */
class Redux implements ReduxContract {
    /**
     * Create Store
     * @method createStore
     * @param callable $reducer
     * @param array $middlewares
     * @return Sotre
     */
    public static function createStore(callable $reducer, array $middlewares = []): StoreContract {
        return new Store($reducer, $middlewares);
    }
}