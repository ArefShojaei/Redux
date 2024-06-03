<?php

/**
 * @namespace
 */
namespace Redux\Contracts\Interfaces;


/**
 * Dispatcher interface for Store 
 * @interface
 */
interface Dispatcher {
    /**
     * Dispatch reducer by Action
     * @method dispatch
     * @param array $action
     * @public
     * @return void
     */
    public function dispatch(array $action): void;
}