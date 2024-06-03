<?php

/**
 * @namespace
 */
namespace Redux;


/**
 * @package
 */
use Redux\Contracts\Interfaces\Store as StoreContract;
use Redux\Features\HasDispatcher;



/**
 * Store state
 * @class
 */
class Store implements StoreContract {
    /**
     * Traits - Store Features
     */
    use HasDispatcher;


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
    private mixed $reducer;
    
    /**
     * Middlewares
     * @prop
     * @private
     * @type array
     */
    private array $middlewares;

    /**
     * Subscribers
     * @prop
     * @private
     * @type array
     */
    private array $subscribers;


    /**
     * Constructor
     * @param callable $reducer
     * @param array $middlewares
     */
    public function __construct(callable $reudcer, mixed $initState, array $middlewares)
    {
        $this->state = $initState;
        $this->reducer = $reudcer;
        $this->middlewares = $middlewares;
        $this->subscribers = [];
    }


    /**
     * Get state
     * @method getState
     * @public
     * @return mixed
     */
    public function getState(): mixed {
        return $this->state;
    }
}