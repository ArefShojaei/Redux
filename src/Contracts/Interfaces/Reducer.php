<?php

/**
 * @namespace
 */
namespace Redux\Contracts\Interfaces;


/**
 * Reducer interface 
 * @interface
 */
interface Reducer {
    /**
     * Get Reducer as function
     * @method getReducer
     * @public
     * @return callable
     */
    public function getReducer(): callable;

    /**
     * Combine Reducers
     * @method combineReudcers
     * @public
     * @static
     * @param array $reducers
     * @return callable
     */
    public static function combineReducers(array $reducers): callable;
}