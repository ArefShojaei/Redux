<?php

/**
 * @namespace
 */
namespace Redux\Contracts\Interfaces;

/**
 * @package
 */
use Redux\Contracts\Interfaces\Dispatcher;



/**
 * Store Interface
 * @interface
 */
interface Store extends Dispatcher, Subscriber {
    /**
     * Get state
     * @method getState
     * @public
     * @return mixed
     */
    public function getState(): mixed;
}