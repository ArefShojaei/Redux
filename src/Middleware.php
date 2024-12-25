<?php declare(strict_types=1);

namespace Redux;


use Redux\Contracts\Interfaces\{
    Store,
    Middleware as MiddlewareContract
};


final class Middleware implements MiddlewareContract {
    private array $middlewares;

    private int $count;

    private array $action;


    public function __construct(array $middlewares) {
        $this->middlewares = $middlewares;
        $this->count = 0;
        $this->action = [];
    }

    public function apply(Store $store, array $action): void {
        # Set Action
        $this->action = $action;

        # Call all Middlewares
        foreach ($this->middlewares as $middleware) {
            $middleware($store, $this->action, $this->next());
        }

        # Check to stop process
        $this->isPaused();
    }

    /**
     * Check to stop proccess before dispatching the Action
     */
    private function isPaused(): void {
        if($this->count < count($this->middlewares)) exit;
    }

    /**
     * Send Action to next Middlewares
     */
    private function next(): callable {
        return function(array $action) {
            $this->count++;
            $this->action = $action;
        };
    }
}
