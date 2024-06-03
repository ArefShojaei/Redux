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
     * Subscribe & UnSubscribe Store by subscriber
     * @method subscribe
     * @public
     * @param callable $subscriber
     * @return void
     */
    public function subscribe(callable $subscriber): callable;
}