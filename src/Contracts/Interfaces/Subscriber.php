<?php

/**
 * @namespace
 */
namespace Redux\Contracts\Interfaces;


/**
 * Subscriber interface for Store 
 * @interface
 */
interface Subscriber {
    /**
     * Subscribe & UnSubscribe Store by Listener
     * @method subscribe
     * @public
     * @param callable $listener
     * @return void
     */
    public function subscribe(callable $listener): void;
}