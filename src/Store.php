<?php declare(strict_types=1);

/**
 * @namespace
 */
namespace Redux;


/**
 * @package
 */
use Redux\Contracts\Interfaces\Store as StoreContract;
use Redux\Features\Store\{
    HasDispatcher,
    HasSubscriber
};



/**
 * Store creator
 * @class
 */
final class Store implements StoreContract {
    /**
     * Traits - Store Features
     */
    use HasDispatcher, HasSubscriber;


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
    private $reducer;
    
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
     * Init Action
     * @prop
     * @const
     * @private
     * @type string
     */
    private const INIT = "@INIT";


    /**
     * Constructor
     * @param callable $reducer
     * @param array $middlewares
     */
    public function __construct(callable $reudcer, array $middlewares = []) {
        $this->state = null;
        $this->reducer = $reudcer;
        $this->middlewares = $middlewares;
        $this->subscribers = [];

        # Init State
        $this->dispatch(["type" => self::INIT]);
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