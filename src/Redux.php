<?php

/**
 * @namespace
 */
namespace Redux;


/**
 * @package
 */
use Redux\Contracts\Interfaces\{
    Redux as ReduxContract,
    Store as StoreContract,
    Action as ActionContract
};
use Redux\{
    Store,
    Action,
    Reducer
};



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
    public static function createStore(callable $reducer, array $middlewares = []): StoreContract {
        return new Store($reducer, $middlewares);
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

    /**
     * Create Reducer
     * @method createReducer
     * @public
     * @static
     * @param mixed $initState
     * @param array $reducers
     * @return callable
     */
    public static function createReducer(mixed $initState, array $reducers): callable {
        return (new Reducer($initState, $reducers))->getReducer();
    }

    /**
     * Combine Reducers
     * @method combineReducers
     * @public
     * @static
     * @param array $reducers
     * @return callable
     */
    public static function combineReducers(array $reducers): callable {
        return Reducer::combineReducers($reducers);
    }

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