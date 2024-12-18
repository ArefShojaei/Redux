<?php declare(strict_types=1);

namespace Redux;


use Redux\Contracts\Interfaces\Store as StoreContract;
use Redux\Features\Store\{
    HasDispatcher,
    HasSubscriber
};



final class Store implements StoreContract {
    use HasDispatcher, HasSubscriber;


    private mixed $state;


    private $reducer;
    

    private array $middlewares;


    private array $subscribers;

    /**
     * Init Action
     */
    private const INIT = "@INIT";



    public function __construct(callable $reudcer, array $middlewares = []) {
        $this->state = null;
        $this->reducer = $reudcer;
        $this->middlewares = $middlewares;
        $this->subscribers = [];

        # Init State
        $this->dispatch(["type" => self::INIT]);
    }

    public function getState(): mixed {
        return $this->state;
    }
}