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
}