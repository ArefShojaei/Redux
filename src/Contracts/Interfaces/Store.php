<?php

/**
 * @namespace
 */
namespace Redux\Contracts\Interfaces;


/**
 * Store Interface
 * @interface
 */
interface Store {
    /**
     * Get state
     * @method getState
     * @public
     * @return mixed
     */
    public function getState(): mixed;
}