<?php

/**
 * @namespace
 */
namespace Redux;


/**
 * @package
 */
use Redux\Contracts\Interfaces\Store as StoreContract;



/**
 * Store state
 * @class
 */
class Store implements StoreContract {
    /**
     * State
     * @prop
     * @private
     * @type mixed
     */
    private mixed $state;

    /**
     * Reducer
     * @prop
     * @private
     * @type callable
     */
    private $reudcer;
    
    /**
     * Middlewares
     * @prop
     * @private
     * @type array
     */
    private array $middlewares;


    /**
     * Constructor
     * @param callable $reducer
     * @param array $middlewares
     */
    public function __construct(callable $reudcer, mixed $initState, array $middlewares)
    {
        $this->state = $initState;
        $this->reudcer = $reudcer;
        $this->middlewares = $middlewares;
    }
}