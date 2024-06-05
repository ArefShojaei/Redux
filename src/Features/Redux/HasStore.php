<?php declare(strict_types=1);

/**
 * @namespace
 */
namespace Redux\Features\Redux;


/**
 * @package
 */
use Redux\Store;
use Redux\Contracts\Interfaces\Store as StoreContract;



/**
 * Has Store feature
 * @tarit
 */
trait HasStore {
    /**
     * Create Store
     * @method createStore
     * @public
     * @static
     * @param callable $reducer
     * @param array $middlewares
     * @return StoreContract
     */
    public static function createStore(callable $reducer, array $middlewares = []): StoreContract {
        return new Store($reducer, $middlewares);
    }
}