<?php declare(strict_types=1);

/**
 * @namespace
 */
namespace Redux\Features\Redux;


/**
 * @package
 */
use Redux\Reducer;



/**
 * Has Reducer feature
 * @tarit
 */
trait HasReducer {
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
}