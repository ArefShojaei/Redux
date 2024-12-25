<?php declare(strict_types=1);

namespace Redux\Features\Store;


use Redux\Middleware;


trait HasDispatcher {
    public function dispatch(array $action): void {
        # Apply Middlewares
        if(count($this->middlewares)) {
            $middleware = new Middleware($this->middlewares);
            $middleware->apply($this, $action);
        }

        $reducer = $this->reducer;
        
        $this->state = $reducer($this->state, $action);

        # Run all Subscribers
        foreach ($this->subscribers as $subscriber) {
            $subscriber($this);
        }
    }
}