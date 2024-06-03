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
use Redux\Contracts\Interfaces\Action as ActionContract;
use Redux\Store;
use Redux\Action;



/**
 * Redux Factory
 * @class
 */
class Redux implements ReduxContract {
    /**
     * Create Store
     * @method createStore
     * @public
     * @static
     * @param callable $reducer
     * @param array $middlewares
     * @return StoreContract
     */
    public static function createStore(callable $reducer, mixed $initState, array $middlewares = []): StoreContract {
        return new Store($reducer, $initState, $middlewares);
    }

    /**
     * Create Action
     * @method createAction
     * @public
     * @static
     * @param string $type Action type
     * @return ActionContract
     */
    public static function createAction(string $type): ActionContract {
        return new Action($type);
    }
}